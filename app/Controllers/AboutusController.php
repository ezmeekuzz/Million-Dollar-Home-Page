<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AboutusController extends BaseController
{
    public function index()
    {
        return view('pages/aboutus');
    }
}
