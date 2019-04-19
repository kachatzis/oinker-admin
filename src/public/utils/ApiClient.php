<?php


  require 'restclient.php';

  class ApiClient {

    public $base_url;
    public $debug;
    public $response_code;
    public $force_debug;
    public $response;
    public $method;


    public function __construct(){

      require 'utils/Config.php';
      $this->base_url = $config['api_base_url'];
      $this->debug = false; 
      $this->force_debug = false;  
      $this->response_code = 0;
      $this->response = array();
      $this->method = 'GET';
    }

    public function get_response_code() {
      return $this->response_code;
    }

    public function get_response(){
      return $this->response;
    }


    public function get( $uri , $argument , $header ) {

        $this->method = 'GET';
        $this->call( $uri , $argument , array() , $header );

    }


    public function call($uri, $argument, $body, $header){

      if(strlen($argument)>0){
        $argument = "?".$argument;
      }

      $api = new RestClient([
        'base_url' => $this->base_url,
        //'format' => 'json',
      ]);

      $result = $api->execute( $uri . $argument , $this->method , json_encode($body, true) , $header );

      $this->response_code = $result->info->http_code;
      $this->response = json_decode($result->response);

    }







  /*

  public function delete($uri, $id) {


    $body = [
      'body' => 0,
    ];

    $api = new RestClient([
        'base_url' => $this->base_url,  // Base Url
    ]);

    $result = $api->execute( $uri.$id, 'DELETE' , json_encode($body, true) , [  // Request
          'X-HTTP-Method-Override' => 'DELETE',
          'Content-Type' => 'application/json',
          "X-DreamFactory-API-Key"=>$this->api_key
          ]  );

    $this->id = -1;
    $this->response_code = $result->info->http_code;
    $this->response_json = $result->decode_response();
    if($this->response_code == 200 && !$this->force_debug){   // If success
    } elseif ($this->debug || $this->force_debug) {
      var_dump ($result);
    }

  }



    public function delete_filter($uri, $filter) {

    $body = [
      'body' => 0,
    ];

    $api = new RestClient([
        'base_url' => $this->base_url,  // Base Url
    ]);

    $result = $api->execute( $uri.'?'.$filter, 'DELETE' , json_encode($body, true) , [  // Request
          'X-HTTP-Method-Override' => 'DELETE',
          'Content-Type' => 'application/json',
          "X-DreamFactory-API-Key"=>$this->api_key
          ]  );

    $this->id = -1;
    $this->response_code = $result->info->http_code;
    $this->response_json = $result->decode_response();
    if($this->response_code == 200 && !$this->force_debug){   // If success
    } elseif ($this->debug || $this->force_debug) {
      var_dump ($result);
    }

  }


  public function patch($uri, $body) {


    $api = new RestClient([
        'base_url' => $this->base_url,  // Base Url
    ]);

    $result = $api->execute( $uri, 'PATCH' , json_encode($body, true) , [
          'X-HTTP-Method-Override' => 'PATCH',
          'Content-Type' => 'application/json',
          'X-DreamFactory-API-Key'=>$this->api_key
          ] );

    $this->response_code = $result->info->http_code;
    $this->response_json = $result->decode_response();
    if($this->response_code == 200 && !$this->force_debug){   // If success

    } elseif ($this->debug || $this->force_debug) {
      $this->response_json = $result->decode_response();
      var_dump($this->resource);

    }

  }


  public function post_proc($uri, $body) {

    $api = new RestClient([
        'base_url' => str_replace('_table', '_proc', $this->base_url)  // Base Url
    ]);

    $result = $api->execute( $uri.'?', 'POST' , json_encode($body, true) , [  // Request
          'X-HTTP-Method-Override' => 'POST',
          'Content-Type' => 'application/json',
          "X-DreamFactory-API-Key"=>$this->api_key
          ]  );

    $this->id = -1;
    $this->response_code = $result->info->http_code;
    $this->response_json = $result->decode_response();
    if(($this->response_code == 200 || $this->response_code == 201) && !$this->force_debug){   // If success

      $this->resource = $this->response_json->resource;
      $id_name=$this->id_name;
      if(isset($this->resource->$id_name)) $this->id = $this->resource->$id_name;
      $this->result = $this->response_json;

    } elseif ($this->debug || $this->force_debug) {
      var_dump($this->id);
      var_dump($this->response_json);
    }

  }
  */

}

 ?>
