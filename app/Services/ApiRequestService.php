<?php

namespace App\Services;

use App\Exceptions\GenericException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Cookie\CookieJar;
use SimpleXMLElement;

class ApiRequestService
{
    /**
     * @vars
     */
    protected Client $client;
    protected $cookies;
    protected $response;
    protected $jar;
    /**
     * OTPService constructor.
     */
    public function __construct($url)
    {
        $this->client = new Client([
            'base_uri'      => $url,
            'timeout'       => 100,
            'http_errors'   => false,
            'verify'        => false
        ]);
        $this->jar = new CookieJar();
        //var_dump($cookieValue);
    }

    public function setCookies($cookies){
        $this->cookies = $cookies;
        $this->jar = new CookieJar(false, $this->cookies);
    }

    /**
     * Post Request
     *
     * @param string$method
     * @param array $body
     * @param array $headers
     * @return bool|object
     */
    public function postRequest($method, $body = [], $headers = [])
    {
        $data_for_log = [
            'url'       => request()->fullUrl(),
            'method'    => $method,
            'IP'        => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'null',
            'headers'   => $headers,
            'body'      => $body
        ];
        
        if(!isset($headers['Content-Type'])){
            $headers['Content-Type'] = 'application/json';
        }
        
        try {
            $listParamsToPush = [
                'headers' => $headers,
                'cookies' => $this->jar,
                'verify' => false,
            ];
            if(str_contains($headers['Content-Type'], 'x-www-form-urlencoded')){
                $listParamsToPush['form_params'] = $body;
            }else{
                $listParamsToPush['body'] = $body;
            }
            $response = $this->client->post($method, $listParamsToPush);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            Log::error('guzzle_connect_exception', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No nos hemos podido comunicar con ". $this->client->getConfig('base_uri'). $method .',message: '. $e->getMessage(), $e );
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('guzzle_connection_timeout', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No nos hemos podido comunicar con ". $this->client->getConfig('base_uri'). $method .',message: '. $e->getMessage(), $e );
        } catch (\Exception $e) {
            Log::error('guzzle_error', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No se pudo procesar la respuesta del servidor", $e );
        }
        $this->cookies = $this->jar->toArray();
        $this->response =  $response;
        if($response->getBody() == null){
            throw new GenericException("Request body vacío en ". $this->client->getConfig('base_uri') . $method );
        }
        if(!str_contains($headers['Content-Type'], 'x-www-form-urlencoded')){
            if($response->getBody()->getContents() == null){
                throw new GenericException("No hay contenido en la respuesta ". $this->client->getConfig('base_uri') . $method  );
            }
        }
        $this->cookies = $this->jar->toArray();

        try {
            if($headers['Content-Type'] == 'application/json'){
                $responseJson = json_decode($response->getBody());
            }
            if(str_contains($headers['Content-Type'], 'text/xml')){
                return (new SimpleXMLElement($response->getBody()));
            }
            $responseJson = $response->getBody();
        } catch (\Exception $e) {
            Log::error('Error genérico ejecutar $responseJson = json_decode($response->getBody());: ', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No se pudo procesar la respuesta obtenida", $e );
        }
        if(!$responseJson){
            Log::error("No se pudo convertir la respuesta en json ". $this->client->getConfig('base_uri') . $method .',response: '.$response->getBody());
            throw new GenericException("No se pudo procesar la respuesta obtenida del servidor");
        }
        return $responseJson;
    }

    /**
     * Get Request
     *
     * @param string$method
     * @param array $headers
     * @return bool|object
     */
    public function getRequest($method, $headers = [])
    {
        $data_for_log = [
            'url'       => request()->fullUrl(),
            'method'    => $method,
            'IP'        => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'null',
            'headers'   => $headers
        ];
        if(!isset($headers['Content-Type'])){
            $headers['Content-Type'] = 'application/json';
        }
        $response = null;
        try {
            $response = $this->client->get($method, [
                'headers' => $headers,
                'cookies' => $this->jar
            ]);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            Log::error('guzzle_connect_exception', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No nos hemos podido comunicar con ". $this->client->getConfig('base_uri'). $method .',message: '. $e->getMessage(), $e );
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('guzzle_connection_timeout', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No nos hemos podido comunicar con ". $this->client->getConfig('base_uri'). $method .',message: '. $e->getMessage(), $e );
        } catch (\Exception $e) {
            Log::error('guzzle_error', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No se pudo procesar la respuesta del servidor", $e );
        }
        $this->cookies = $this->jar->toArray();
        $this->response =  $response;
        if($response->getBody() == null){
            throw new GenericException("Response body vacío en ". $this->client->getConfig('base_uri') . $method );
        }
        try {
            $responseJson = json_decode($response->getBody());
        } catch (\Exception $e) {
            Log::error('Error genérico ejecutar $responseJson = json_decode($response->getBody());: ', $data_for_log + ['message' => $e->getMessage()]);
            throw new GenericException("No se pudo procesar la respuesta obtenida", $e );
        }
        if(!$responseJson){
            Log::error("No se pudo convertir la respuesta en json ". $this->client->getConfig('base_uri') . $method .',response: '.$response->getBody());
            throw new GenericException("No se pudo procesar la respuesta obtenida del servidor");
        }
        return $responseJson;
    }

    public function getCookies(){
        return $this->cookies;
    }
}