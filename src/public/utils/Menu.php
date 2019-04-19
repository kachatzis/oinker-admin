<?php



class Menu {

  public $links;

  public function __construct() {
    $links = [];
  }

  public function add_link() {
    $links = [];
  }

  public function show_menu(){

    include( 'Config.php'); ?>

    <!-- Left Sidebar  -->
    <div class="left-sidebar">

      <div id="nav-logo" style="z-index: 100; cursor: pointer" onclick="window.location='/';" class="nav-logo"></div>

        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">

                  <br>
                  <li> <a class="has-arrow  " href="" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                      <ul aria-expanded="false" class="collapse">
                        <li><a href="/" aria-expanded="true"><i class="fa fa-tachometer"></i><span class="hide-menu">  Main Page</span></a></li>
                       
                      </ul>
                  </li>


                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->

      <div class="nav-bottom-split"></div>
      <a href="/about"><div class="nav-author-logo"></div></a>
    </div>
    <!-- End Left Sidebar  -->
    <?php
  }

}

 ?>
