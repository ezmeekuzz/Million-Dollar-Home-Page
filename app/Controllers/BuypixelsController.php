<?php

namespace App\Controllers;

use App\Models\ImageCoordinatesModel;
use CodeIgniter\Controller;
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
    
            if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                $newName = $uploadedFile->getRandomName();
                $uploadedFile->move(FCPATH . 'uploads', $newName);
    
                $config = [
                    'image_library' => 'gd2',
                    'source_image'  => FCPATH . 'uploads/' . $newName,
                    'create_thumb'  => TRUE,
                    'maintain_ratio' => TRUE,
                    'width'         => 150,
                    'height'        => 150,
                ];
    
                $imageLib = \Config\Services::image();
    
                $imageLib->withFile(FCPATH . 'uploads/' . $newName);
    
                try {
                    $imageLib->initialize($config);
    
                    if (!is_dir(FCPATH . 'uploads/thumbnails')) {
                        mkdir(FCPATH . 'uploads/thumbnails', 0777, true);
                    }
    
                    $thumbnailPath = 'uploads/thumbnails/' . $newName;
    
                    $originalWidth = $imageLib->getWidth();
                    $originalHeight = $imageLib->getHeight();

                    $newWidth = $originalWidth * 0.1;
                    $newHeight = $originalHeight * 0.1;
                    
                    $imageLib->resize($newWidth, $newHeight);
                    $imageLib->save(FCPATH . $thumbnailPath);
    
                    $publicUploadPath = FCPATH . 'uploads';
    
                    if (!is_dir($publicUploadPath)) {
                        mkdir($publicUploadPath, 0777, true);
                    }
    
                    $imagePath = 'uploads/' . $newName;
    
                    $imageCoordinate = new ImageCoordinatesModel();
    
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
                        'imageLocation' => $imagePath,
                        'thumbnailLocation' => $thumbnailPath,
                        'dateUploaded' => date('Y-m-d'),
                        'status' => 'Pending'
                    ]);
    
                    return $this->respondSuccess();
                } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            } else {
                echo 'File not uploaded.';
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in insert method: ' . $e->getMessage());
            return $this->respondError($e->getMessage());
        }
    }    
    
    public function getData()
    {
        $imageCoordinate = new ImageCoordinatesModel();
        $data = $imageCoordinate->where('status !=', 'Rejected')->findAll();

        return $this->response->setJSON($data);
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
