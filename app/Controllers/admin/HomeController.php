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
    
        // Add a where condition for status with the value "Pending"
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
        
        $transaction = $iCModel->find($id);
        
        if ($transaction) {
            $imageLocation = $transaction['imageLocation']; // Assuming the field name is 'imageLocation'
    
            // Delete the image file
            if (!empty($imageLocation)) {
                $imagePath = FCPATH . $imageLocation; // Adjust the path accordingly
    
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            $iCModel->delete($id);
    
            return $this->response->setJSON(['status' => 'success']);
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction not found']);
    } 
    public function approve($id)
    {
        $model = new ImageCoordinatesModel(); // Replace YourModel with the actual model you're using

        // Update status to 'Approved' (you might have a different field name)
        $model->update($id, ['status' => 'Approved']);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function reject($id)
    {
        $model = new ImageCoordinatesModel(); // Replace YourModel with the actual model you're using

        // Update status to 'Rejected' (you might have a different field name)
        $model->update($id, ['status' => 'Rejected']);

        return $this->response->setJSON(['status' => 'success']);
    }
}
