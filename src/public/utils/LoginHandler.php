<?php


  require_once 'utils/ApiClient.php';
  require_once 'utils/Cookie.php';

  class LoginHandler {

    public $code;


    public function __construct() {
      require 'utils/Config.php';
      $this->config = $config;
      $this->code = '';
      $this->api_uri= '/oauth/access_token';
    }

    public function handle(){
      $this->get_params();
      $this->check_login();
    }


    public function get_params(){
        if( isset($_GET['code']) ){
          $this->code = $_GET['code'];
        } else {
          redirect_to_login();
        }
    }


    public function check_login(){
        $api = new ApiClient();

        $model = array(
          'code' => $this->code,
          'scope' => $this->config['oauth_scope'],
          'client_id' => $this->config['client_id'],
          'client_secret' => $this->config['client_secret'],
          'scope' => $this->config['oauth_scope']
        );

        $header = array(
          'Content-Type' => 'application/json'
        );

        $api->get( $this->api_uri , http_build_query($model), array() , $header );

        if($api->get_response_code()==200){
          $_SESSION['access_token'] = $api->get_response()->access_token;
          $this->redirect_to_home();
        } else {
          var_dump($api->get_response_code());
        }
    }

    public function create_session(){
      $_SESSION['manager_id'] = $this->id;
    }


    public function redirect_to_login(){
      redirect('/authorize');
    }


    public function redirect_to_home(){
      redirect('/');
    }


  }

 ?>
