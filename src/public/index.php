<?php

  //error_reporting(E_ALL); ini_set('display_errors', '1');

  include 'utils/Redirect.php';
  include 'utils/Config.php';
  if($config['site_maintenance_mode']){
    require __DIR__ . $config['maintenance_url'];
    exit();
  }

  session_start();

  require 'utils/AltoRouter.php';

  // Initialize Router
  $router = new AltoRouter();

  // Select Timezone
  date_default_timezone_set($config['timezone']);

  // Create Paths

  $router->map( 'GET', '/', function() {  require __DIR__ . '/views/Home.php'; }, 'Home_GET');

  $router->map( 'GET', '/login', function() {  require __DIR__ . '/views/Login.php'; }, 'Login_GET');

  $router->map( 'GET', '/authorize', function() {  require __DIR__ . '/views/Authorize.php'; }, 'Authorize_GET');

  $router->map( 'GET', '/users', function() {  require __DIR__ . '/views/Users.php'; }, 'Users_GET');
  $router->map( 'GET', '/users/[a:_id]?', function($_id) {  require __DIR__ . '/views/Users_Id.php'; }, 'Users_Id_GET');

  $router->map( 'GET', '/emails', function() {  require __DIR__ . '/views/Emails.php'; }, 'Emails_GET');
  $router->map( 'GET', '/emails/[a:_id]?', function($_id) {  require __DIR__ . '/views/Emails_Id.php'; }, 'Emails_Id_GET');

  $router->map( 'GET', '/email_campaigns', function() {  require __DIR__ . '/views/EmailCampaigns.php'; }, 'EmailCampaigns_GET');
  $router->map( 'GET', '/email_campaigns/[a:_id]?', function($_id) {  require __DIR__ . '/views/EmailCampaigns_Id.php'; }, 'EmailCampaigns_Id_GET');

  $router->map( 'GET', '/email_services', function() {  require __DIR__ . '/views/EmailServices.php'; }, 'EmailServices_GET');
  $router->map( 'GET', '/email_services/[a:_id]?', function($_id) {  require __DIR__ . '/views/EmailServices_Id.php'; }, 'EmailServices_Id_GET');

  $router->map( 'GET', '/bulk_emails', function() {  require __DIR__ . '/views/BulkEmails.php'; }, 'BulkEmails_GET');
  $router->map( 'GET', '/bulk_emails/[a:_id]?', function($_id) {  require __DIR__ . '/views/BulkEmails_Id.php'; }, 'BulkEmails_Id_GET');

  
  // Match Routes and Load file
  $match = $router->match();
  if( $match && is_callable( $match['target'] ) ) {
	   call_user_func_array( $match['target'], $match['params'] );
  } else {
     require __DIR__ . '/views/error-404.php';
  }


?>
