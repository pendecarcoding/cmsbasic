@extends('theme.Layouts.design')
@section('content')
<?php
use App\Cmenu;
$class = new Cmenu();
$bulan = (isset($_GET['bulan'])) ? $_GET['bulan'] : date('m');
$tahun = (isset($_GET['tahun'])) ? $_GET['tahun'] : date('Y');
 ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Data Pegawai</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>


<div class="row">
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <a class="float-right btn btn-primary text-white">Tambah Data</a>
        <h4 class="card-title">Data Pegawai</h4>
      </div>
    <div class="card-body">


      <h6 class="card-subtitle"></h6>

      <br>
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
            <th>No</th>
            <th></th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Agama</th>
            <th>Pangkat</th>
            <th>Gol</th>
            <th>Alamat</th>
            <th width="10%"></th>
        </thead>
        <tbody>
          
        </tbody>
        </table>
      </div>
    </div>
  </div>


  </div>
</div>
</div>



</main>
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
