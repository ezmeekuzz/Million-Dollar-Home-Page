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
}
