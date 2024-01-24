<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContactmeController extends BaseController
{
    public function index()
    {
        return view('pages/contactme');
    }
}
