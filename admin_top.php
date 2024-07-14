<?php

session_start();
include('dbconnection.php');



   
if(isset($_SESSION['Admin_login']) && ($_SESSION['Admin_login']!=""))
{
    
     
}
else
{
   header('location:/E-Mart/admin_login.php');
}
   
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
	  <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&family=Raleway&family=Rubik&display=swap" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="admin_categories.php" > Categories Master</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="admin_product.php" > Product Master</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="admin_productbrand.php" > Product Brand</a>
                  </li>
				      <li class="menu-item-has-children dropdown">
                     <a href="admin_ordermaster.php" >Order Master</a>
                  </li>
                    <li class="menu-item-has-children dropdown">
                     <a href="admin_usermaster.php" >User Master</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="admin_contactus.php">Contact Us</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="admin_userlog.php">UserLogs</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.html"><img src="images/emart_logo.png"  style="width:35px;"alt="Logo"></a>
                  <a class="navbar-brand hidden" href="index.html"><img src="images/emart_logo.png"  style="width:35px;" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="admin_logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>