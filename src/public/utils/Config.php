<?php

$config = [
      'api_base_url' =>  getenv(API_BASE_URI),
      'client_id' => getenv(CLIENT_ID),
      'client_secret' => getenv(CLIENT_SECRET),
      'oauth_scope' => getenv(OAUTH_SCOPE),
      'oauth_authorize_url' => getenv(OAUTH_AUTHORIZE_URL),
      'oauth_redirect_url' => getenv(OAUTH_REDIRECT_URL),
      'site_maintenance_mode' =>  getenv(MAINTENANCE_MODE),
      'maintenance_url' =>  '/views/under_maintenance/index.php',
      'timezone' =>  'Europe/Athens',
      'version' => 'v19.03.27',
      'header_title' => 'oinker Admin',
      'footer_title' => 'by PiSquared',
      'developer_info' => 'K. Chatzis <kachatzis@ece.auth.gr>',
      'access_token' => $_SESSION['access_token']
    ];

 ?>
