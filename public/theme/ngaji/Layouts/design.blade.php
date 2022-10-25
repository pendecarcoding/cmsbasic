<?php
use App\AplikasiModel;
$apps = AplikasiModel::where('id_app','1')->first();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="{{asset('theme/aplikasi/'.$apps->logo)}}" sizes="16x20" href="{{asset('theme/aplikasi/'.$apps->logo)}}">
    <title>ADMIN {{$apps->app_name}}</title>
    <!-- Custom CSS -->
    <link href="{{asset('theme/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('theme/select2/dist/css/select2.min.css')}}">
    <link href="{{asset('theme/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('theme/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
.calendar-day {
  width: 100px;
  min-width: 100px;
  max-width: 100px;
  height: 80px;
}
.calendar-table {
  margin: 0 auto;
  width: 700px;
}
.selected {
  background-color: #eee;
}
.outside .date {
  color: #ccc;
}
.timetitle {
  white-space: nowrap;
  text-align: right;
}
.event {
  border-top: 1px solid #b2dba1;
  border-bottom: 1px solid #b2dba1;
  background-image: linear-gradient(to bottom, #dff0d8 0px, #c8e5bc 100%);
  background-repeat: repeat-x;
  color: #3c763d;
  border-width: 1px;
  font-size: .75em;
  padding: 0 .75em;
  line-height: 2em;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: 1px;
}
.event.begin {
  border-left: 1px solid #b2dba1;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.event.end {
  border-right: 1px solid #b2dba1;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.event.all-day {
  border-top: 1px solid #9acfea;
  border-bottom: 1px solid #9acfea;
  background-image: linear-gradient(to bottom, #d9edf7 0px, #b9def0 100%);
  background-repeat: repeat-x;
  color: #31708f;
  border-width: 1px;
}
.event.all-day.begin {
  border-left: 1px solid #9acfea;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.event.all-day.end {
  border-right: 1px solid #9acfea;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.event.clear {
  background: none;
  border: 1px solid transparent;
}
.table-tight > thead > tr > th,
.table-tight > tbody > tr > th,
.table-tight > tfoot > tr > th,
.table-tight > thead > tr > td,
.table-tight > tbody > tr > td,
.table-tight > tfoot > tr > td {
  padding-left: 0;
  padding-right: 0;
}
.table-tight-vert > thead > tr > th,
.table-tight-vert > tbody > tr > th,
.table-tight-vert > tfoot > tr > th,
.table-tight-vert > thead > tr > td,
.table-tight-vert > tbody > tr > td,
.table-tight-vert > tfoot > tr > td {
  padding-top: 0;
  padding-bottom: 0;
}
.sidebar-nav #sidebarnav .sidebar-item.selected>.sidebar-link {
    border-radius: 0 60px 60px 0;
    color: #fff!important;
    background: {{$apps->color}};
    box-shadow: 0 7px 12px 0 rgba(95,118,232,.21);
    opacity: 1;
}
.btn-primary {
    color: #fff;
    background-color: {{$apps->color}};
    border-color: {{$apps->color}};
}

.btn-primary:hover {
    color: #fff;
    background-color: {{$apps->color}};
    border-color: {{$apps->color}};
}
.btn-primary:not(:disabled):not(.disabled).active,.btn-primary:not(:disabled):not(.disabled):active,.show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: {{$apps->color}};
    border-color: {{$apps->color}};
}
</style>
</head>
<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
      <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
      </div>
  </div>
  <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
      <!-- Page wrapper  -->
              <!-- ============================================================== -->

@include('theme.Layouts.header')
@include('theme.Layouts.sidebar')
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  @if ($errors->any())
  @foreach($errors->all() as $eror)
  <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-warning"></i>
      {{$eror}}
    </div>
  @endforeach
@endif
  @if(\Session::has('success'))
  <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-check"></i>
      {{Session::get('success')}}
    </div>
    @endif
    @if(\Session::has('danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-warning"></i>
        {{Session::get('danger')}}
      </div>
      @endif
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

@yield('content')
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center text-muted">
    Design By Team IT diskominfotik Bengkalis
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
@include('theme.Layouts.fotter')
</body>
</html>
