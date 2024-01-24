<?php

namespace App\Controllers;
use App\Models\ImageCoordinatesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Files\File;

class EditController extends BaseController
{
    public function index($id): string
    {
        $data = [
            'image_coordinate_id' => $id
        ];
        return view('pages/edit', $data);
    }
    public function updateData()
    {
        try {
            $data = $this->request->getPost();
    
            $imageCoordinate = new ImageCoordinatesModel();
    
            $imageCoordinate->update(
                $data['image_coordinate_id'],
                [
                    'selectedPixelsCoordinates' => $data['selectedPixelsCoordinates'],
                    'groupCoordinates' => $data['groupCoordinates'],
                    'numberOfPixelBoxes' => $data['numberOfPixelBoxes'],
                ]
            );
            return $this->respondSuccess();
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

    public function getData()
    {
        $imageCoordinate = new ImageCoordinatesModel();
        $data = $imageCoordinate->where('status !=', 'Rejected')->findAll();
    
        return $this->response->setJSON($data);
    }
}
