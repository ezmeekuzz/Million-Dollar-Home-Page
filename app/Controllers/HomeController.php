<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ImageCoordinatesModel;

class HomeController extends BaseController
{
    public function index()
    {
        return view('pages/home');
    }
    public function getData()
    {
        $imageCoordinate = new ImageCoordinatesModel();
        $data = $imageCoordinate->where('status', 'Approved')->findAll();
    
        return $this->response->setJSON($data);
    }
    public function searchData()
    {
        $imageCoordinate = new ImageCoordinatesModel();
        $phoneNumber = $this->request->getPost('phoneNumber');
        $data = $imageCoordinate
                ->where('status', 'Approved')
                ->where('phone', $phoneNumber)
                ->first(); // Use first() instead of find()->first()
    
        if ($data) {
            // Data found, return success response
            return $this->response->setJSON($data);
        } else {
            // No data found, return error response
            return $this->response->setJSON(['status' => 'error', 'message' => 'No data found for the entered phone number.']);
        }
    }
}
