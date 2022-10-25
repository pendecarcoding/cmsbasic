@extends('theme.Layouts.design')
@section('content')
<?php
use App\Cmenu;
use App\KordinatModel;
use App\AbsenModel;
$class = new Cmenu();
$pg    = $class->getpegawaiinstansi(Session::get('kode_unitkerja'));
 ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-file"></i> Laporan Absensi</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Laporan Absensi</a></li>
    </ul>
  </div>
  <div class="alert alert-info">
           <i class="icon fa fa-info"></i>
           Selamat datang di Aplikasi SKP Online Kabupaten Bengkalis
         </div>

<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <select class="form-control" style="width:20%;float:right" name="jenis">
        <option>--Jenis Absensi--</option>
        <option value="M">Masuk</option>
        <option value="K">Keluar</option>
      </select>
    <h4 class="card-title"><i class="fa fa-file"></i> Laporan Absensi</h4>


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
            <th>Status</th>
            <th width="10%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $index => $v)
          <?php
           $absensi = AbsenModel::where('id_pegawai',$v['no'])->wheredate('tglabsen',date('Y-m-d'))->first();
           ?>
          <tr>
          <td>{{$index+1}}</td>
          <td><img style="height:50px;" src="{{$class->does_url_exists($v['no'])}}" class="img-circle elevation-2" alt="User Image"></td>
          <td><small>{{$v['nama']}}<br />NIP : {{$v['nip_baru']}}
          </small></td>
          <td><small>{{$v['nama_pimpinan'].$v['sub_unor']}}</small></td>

          <td>@if($absensi != null){{$absensi->status}}@endif</td>
          <td width="15%">
            <a style="color:white;" class="btn btn-primary btn-sm"><i class="fa fa-qrcode"></i></a>
            <a style="color:white;" class="btn btn-primary btn-sm"><i class="fa fa-file"></i></a>
            <a style="color:white;" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i></a>
          </td>
        </tr>
        @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>



</main>
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
