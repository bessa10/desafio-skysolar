<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model
{
    protected $token_api;
    protected $url_api;

    public function __construct()
    {
        $this->token_api    = $_SERVER['TOKEN_API'];
        $this->url_api      = $_SERVER['URL_API'];
    }
    
    public function sendHttpGet($endpoint = null, $params = null)
    {
        $curl = curl_init();

        $url = $this->url_api.$endpoint;

        if ($params != null) {

            $url = $url.'?'.$params;
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL             => $url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => '',
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => 'GET',
            CURLOPT_HTTPHEADER => array(
                "token: {$this->token_api}"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        //echo $response;
        
        return $response;
    }

    public function sendHttpPost($endpoint = null, $params = null, $data = null)
    {
        $curl = curl_init();

        $url = $this->url_api.$endpoint;

        if ($params != null) {

            $url = $url.'?'.$params;
        }

        $data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "token: {$this->token_api}",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        //echo $response;

        return $response;
    }

    public function sendHttpPut($endpoint = null, $params = null, $data = null) 
    {
        $curl = curl_init();

        $url = $this->url_api.$endpoint;

        if ($params != null) {

            $url = $url.'?'.$params;
        }

        $data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "token: {$this->token_api}",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        //echo $response;

        return $response;
    }

    public function sendHttpDelete($endpoint = null, $params = null) 
    {
        $curl = curl_init();

        $url = $this->url_api.$endpoint;

        if ($params != null) {

            $url = $url.'?'.$params;
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                "token: {$this->token_api}"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        //echo $response;

        return $response;
    }
}