<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <title><?php echo $config['header_title']; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assets/css/helper.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->

<?php  include 'utils/Config.php'; ?>

    <!--
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    -->



    <!-- Main wrapper  -->
    <div id="main-wrapper" style="background-color:#efedfb;">
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">




                            <div id="progress">
                              <div id="progressbar"></div>
                            </div>
                            <div class="login-form">
                                <h4>oinker Admin</h4>
                                <p id="countdown" style="visibility: hidden;">0s</p>

                                <form action="<?php echo $config['oauth_authorize_url']; ?>" method="GET">

                                    <input id="scope" name="scope" type="hidden" value="<?php echo $config['oauth_scope']; ?>">
                                    <input id="client_id" name="client_id" type="hidden" value="<?php echo $config['client_id']; ?>">
                                    <input id="redirect_url" name="redirect_url" type="hidden" value="<?php echo $config['oauth_redirect_url']; ?>">

                                    <button id="submit" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">SIGN IN</button>

                                </form>

                               
                                <div class="register-link m-t-15 text-center">
                                    <p><a href=""><?php echo $config['footer_title']; ?></a></p>
                                </div>
                            </div>
                          </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wrapper -->
    



    <!-- All Jquery -->
    <script src="/assets/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="/assets/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/js/custom.min.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id="<?php echo getenv(ANALYTICS_ID); ?>></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', <?php echo getenv(ANALYTICS_ID); ?>);
</script>


</body>

</html>
