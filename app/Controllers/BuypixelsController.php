<?php

namespace App\Controllers;
use App\Models\ImageCoordinatesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Files\File;

class BuyPixelsController extends BaseController
{
    public function index(): string
    {
        return view('pages/buypixels');
    }
    public function insert()
    {
        try {
            $data = $this->request->getPost();
            $uploadedFile = $this->request->getFile('imageLocation');
    
            if ($uploadedFile !== null && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                $publicUploadPath = FCPATH . 'uploads';
    
                // Ensure the uploads directory exists
                if (!is_dir($publicUploadPath)) {
                    mkdir($publicUploadPath, 0777, true);
                }
    
                $uploadedFile->move($publicUploadPath);
    
                $imageCoordinate = new ImageCoordinatesModel();
                $imagePath = 'uploads/' . $uploadedFile->getName();
    
                $imageCoordinate->insert([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'country' => $data['country'],
                    'selectedPixelsCoordinates' => $data['selectedPixelsCoordinates'],
                    'groupCoordinates' => $data['groupCoordinates'],
                    'numberOfPixelBoxes' => $data['numberOfPixelBoxes'],
                    'totalamount' => $data['totalAmountInput'],
                    'imageLocation' => $imagePath, // Save the path relative to public directory
                    'dateUploaded' => date('Y-m-d'),
                    'status' => 'Pending'
                ]);
    
                return $this->respondSuccess();
            } else {
                return $this->respondError('Invalid file upload.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in insert method: ' . $e->getMessage());
            return $this->respondError($e->getMessage());
        }
    }    
    
    private function respondSuccess()
    {
        $this->response->setContentType('application/json');
        return json_encode(['status' => 'success']);
    }
    
    private function respondError($message)
    {
        $this->response->setContentType('application/json');
        return json_encode(['status' => 'error', 'message' => $message]);
    }    
}
