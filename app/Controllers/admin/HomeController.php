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
        
        $filteredRecords = $iCModel
            ->like('name', $search)
            ->orLike('phone', $search)
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
        
        $transactions = $iCModel->find($id);
        
        if ($transactions) {
            
            $iCModel->delete($id);
    
            return $this->response->setJSON(['status' => 'success']);
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction not found']);
    } 
}
