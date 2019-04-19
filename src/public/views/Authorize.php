<?php

  require 'utils/LoginHandler.php';

  if (isset($_GET['code'])){
    echo $_GET['code'];
  }

  $loginHadler = new LoginHandler();
  $loginHandler->code = $_GET['code'];
  $loginHadler->handle();
  

?>