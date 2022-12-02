<?php
use App\AplikasiModel;
$apps = AplikasiModel::where('id_app','1')->first();

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/adminty-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Dec 2022 13:43:18 GMT -->

<head>
  <title>Adminty - Premium Admin Template by Colorlib </title>


  <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="#">
  <meta name="keywords"
    content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="#">
  <link rel="icon" href="https://demo.dashboardpack.com/adminty-html/adminty/assets/images/favicon.ico"
    type="image/x-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

  <script src="https://kit.fontawesome.com/31b5631bd1.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="{{ asset('adminty/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('adminty/assets/icon/themify-icons/themify-icons.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('adminty/assets/icon/icofont/css/icofont.css') }}">

<link rel="stylesheet" href="{{ asset('adminty/bower_components/select2/dist/css/select2.min.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('adminty/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('adminty/bower_components/multiselect/css/multi-select.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('adminty/assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('adminty/assets/css/jquery.mCustomScrollbar.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('adminty/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('adminty/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('adminty/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('adminty/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('adminty/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css') }}">


</head>

<body>

  <div class="theme-loader">
    <div class="ball-scale">
      <div class='contain'>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      @include('theme.Layouts.header')
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          @include('theme.Layouts.sidebar')
          <div class="pcoded-content">
            <div class="pcoded-inner-content">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('theme.Layouts.fotter')