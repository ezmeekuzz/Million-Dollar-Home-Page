<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ImageCoordinatesModel;

class HomeController extends BaseController
{
    protected $bName = 'App\Models\ImageCoordinatesModel';

    public function index()
    {
        
        if (!session()->has('user_id')) {
            return redirect()->to('/admin/login');
        }

        $data = [
            'title' => 'Orders |  PhotoWithGarbGreh',
            'description' => '',
            'session' => \Config\Services::session(),
            'activelink' => 'home'
        ];
        return view('pages/admin/home', $data);
    }    
    public function getData()
    {
        $iCModel = new ImageCoordinatesModel();
    
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];
    
        $totalRecords = $iCModel->countAll();
    
        $iCModel->select('*');
    
        $iCModel->where('status', 'Pending');
    
        if (!empty($search)) {
            $iCModel->groupStart()
                ->like('name', $search)
                ->orLike('phone', $search)
                ->groupEnd();
        }
    
        $filteredRecords = $iCModel
            ->limit($length, $start)
            ->findAll();
    
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => count($filteredRecords),
            'data' => $filteredRecords,
        ];
    
        return $this->response->setJSON($data);
    }
    
    public function delete($id)
    {
        $iCModel = new ImageCoordinatesModel();
    
        // Find the transaction by ID
        $transaction = $iCModel->find($id);
    
        if ($transaction) {
            $imageLocation = $transaction['imageLocation'];
            $thumbnailLocation = $transaction['thumbnailLocation'];
    
            // Delete the image file
            if (!empty($imageLocation)) {
                $imagePath = FCPATH . $imageLocation;
    
                if (file_exists($imagePath)) {
                    if (!unlink($imagePath)) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete the image file']);
                    }
                }
            }
    
            // Delete the thumbnail file
            if (!empty($thumbnailLocation)) {
                $thumbnailPath = FCPATH . $thumbnailLocation;
    
                if (file_exists($thumbnailPath)) {
                    if (!unlink($thumbnailPath)) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete the thumbnail file']);
                    }
                }
            }
    
            // Delete the record from the database
            $deleted = $iCModel->delete($id);
    
            if ($deleted) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete the transaction from the database']);
            }
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction not found']);
    } 
    public function approve($id)
    {
        $model = new ImageCoordinatesModel();

        $model->update($id, ['status' => 'Approved']);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function reject($id)
    {
        $model = new ImageCoordinatesModel();

        $model->update($id, ['status' => 'Rejected']);

        return $this->response->setJSON(['status' => 'success']);
    }
}
