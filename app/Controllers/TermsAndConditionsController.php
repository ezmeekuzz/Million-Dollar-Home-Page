<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TermsAndConditionsController extends BaseController
{
    public function index()
    {
        return view('pages/termsandconditions');
    }
}
