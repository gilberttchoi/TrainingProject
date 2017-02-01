<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
	protected $statusCode = 200;


    /**
     * Gets the value of statusCode.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of statusCode.
     *
     * @param mixed $statusCode the status code
     *
     * @return self
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }
    
    public function respond($data , $headers = [])		
    {	
    	return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message)
    {
    	return $this->respond([
    		'error' => [
    			'message' => $message,
    			'status_code' => $this->getStatusCode()
    			]
    		]);
    }

    public function respondNotFound($message = 'Not Found !')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }
    
    public function respondCreated($message)
    {     
        return $this->setStatusCode(201)->respond([
            'message' => $message,
            'status_code' => $this->statusCode
            ]);   
    }

    public function respondInvalidRequest($message)
    {
        return $this->setStatusCode(422)->respondWithError($message);
    }
}
