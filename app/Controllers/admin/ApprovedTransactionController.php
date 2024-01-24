<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ImageCoordinatesModel;

class ApprovedTransactionController extends BaseController
{
    protected $bName = 'App\Models\ImageCoordinatesModel';

    public function index()
    {
        
        if (!session()->has('user_id')) {
            return redirect()->to('/admin/login');
        }

        $data = [
            'title' => 'Approved Transactions |  PhotoWithGarbGreh',
            'description' => '',
            'session' => \Config\Services::session(),
            'activelink' => 'approvedtransactions'
        ];
        return view('pages/admin/approvedtransactions', $data);
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
        $iCModel->where('status', 'Approved');
    
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
}
