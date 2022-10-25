@extends('theme.Layouts.design')
@section('content')
<?php
use App\Level;
use App\Penempatan;
use App\Bidang;
use App\Aktor;
use App\AlurDispo;
use App\Cmenu;
$level = Level::all();
 ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i>Data Penempatan</h1>
      <p>Menu untuk mengatur Data Bidang</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
 @include('theme.Layouts.alert')
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Daftar Penempatan Pegawai
        </h4>
    </div>
    <div class="card-body" >
      <div class="row" style="padding:10px;">
    @foreach($data as $index => $v)
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-folder fa-3x"></i>
        <div class="info">
          <h6>{{$v->bidang}}</h6>
          <a href="{{url('penempatan_jabatan?lihatpegawai='.base64_encode($v->id_bidang))}}" class="btn btn-outline-secondary" style="color:black;margin-bottom:10px;"><b>Lihat Pegawai</b></a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
    </div>
    <?php
    if(isset($_GET['lihatpegawai'])){
    $dpenempatan = Penempatan::where('id_bidang',base64_decode($_GET['lihatpegawai']))->count();
    $bidang = Bidang::where('id_bidang',base64_decode($_GET['lihatpegawai']))->first();
     if($bidang != null){
     ?>
    <div class="card-header">
      <h4>Daftar Pegawai @if($bidang != null){{$bidang['bidang']}} @endif</h4>
      <a data-toggle='modal' href="#tambah" data-target="#tambah" style="color:white;"class="btn waves-effect waves-light btn-primary pull-right">Tambah ASN</a>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
        <tr>
          <th>#</th>
          <th>Pegawai</th>
          <th>Jabatan</th>
          <th>Bidang</th>
          <th>Aktor</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php

            if($dpenempatan > 0){
              $dpenempatan = Penempatan::where('id_bidang',base64_decode($_GET['lihatpegawai']))
                            ->get();
           ?>
          @foreach($dpenempatan as $index => $v)
          <?php
            $pg = Fungsi::get_pegawai_no($v->no);
           ?>
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$pg->gd.$pg->nama.$pg->gb}}</td>
            <td>{{$v->jabatan}}</td>
            <td>{{$v->bidang}}</td>
            <td>{{$v->aksi}}</td>
            <td>
               <a data-toggle='modal' href="#" data-target="#edit{{$v->id_penempatan}}">
                 <i class="fa fa-edit text-warning" aria-hidden=""></i> </a>   &nbsp;&nbsp;
                 <a onclick="return confirm('Yakin untuk menghapus?')" href="{{url('hapuspenempatan/'.base64_encode($v->id_penempatan))}}">
                   <i class="fa fa-trash text-danger" aria-hidden=""></i>
                 </a>
              </td>
          </tr>

          <div class="modal fade" id="edit{{$v->id_penempatan}}" role="dialog">
            <div class="modal-dialog modal-md">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Data Penempatan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">
                  <form class="" action="{{url('updatepenempatan')}}" method="post">{{csrf_field()}}
                  <div class="form-group">
                    <label>Nama Bidang</label>
                    <input type="hidden" name="id_bidang" value="{{$bidang->id_bidang}}">
                  <input type="hidden" name="id_penempatan" value="{{$v->id_penempatan}}">
                  <input type="text" disabled class="form-control" name="bidang" value="{{$bidang->bidang}}">
                </div>
                <div class="form-group">
                  <label>Pegawai</label>
                  <select name="no" class="form-control" required>
                    @foreach($pegawai as $index =>$vp)
                     <option @if($v->no==$vp['no']) selected @endif value="{{$vp['no']}}">{{$vp['gd'].$vp['nama'].$vp['gb']}}</option>
                     @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>AKTOR</label>
                 <select class="form-control" name="id_alur" required>
                    <?php
                      $aktor = AlurDispo::where('kode_unitkerja',Session::get('kode_unitkerja'))->get();
                    ?>
                    @foreach($aktor as $index => $vak)
                      <option @if($vak->id_alur == $v->id_alur) selected @endif value="{{$vak->id_alur}}">{{$vak->jabatan}}</option>

                    @endforeach

                 </select>
            </div>
                <ul class="list-group">
                    <button type="submit" class="btn btn-primary" type="submit">Simpan</button>
                </ul>
                 </form>
                </div>
              </div>
            </div>
                </div>
          @endforeach
          <?php
        }}}
           ?>

        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@if(isset($_GET['lihatpegawai']))
<?php
  $bidang = Bidang::where('id_bidang',base64_decode($_GET['lihatpegawai']))->count();
  if($bidang > 0){
    $bidang = Bidang::where('id_bidang',base64_decode($_GET['lihatpegawai']))->first();
 ?>
<div class="modal fade" id="tambah" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Penempatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>


      </div>
      <div class="modal-body">
        <form class="" action="{{url('addpenempatan')}}" method="post">{{csrf_field()}}
        <div class="form-group">
          <label>Nama Bidang</label>
        <input type="hidden" name="id_bidang" value="{{$bidang->id_bidang}}">
        <input type="text" disabled class="form-control" name="bidang" value="{{$bidang->bidang}}">
      </div>
      <div class="form-group">
        <label>Pegawai</label>
        <select name="no" class="form-control" required>
          @foreach($pegawai as $index =>$vp)
           <option value="{{$vp['no']}}">{{$vp['gd'].$vp['nama'].$vp['gb']}}</option>
           @endforeach
        </select>
    </div>
    <div class="form-group">
      <label>AKTOR</label>
       <select class="form-control" name="id_alur" required>
          <?php
            $aktor = AlurDispo::where('kode_unitkerja',Session::get('kode_unitkerja'))->get();
          ?>
          @foreach($aktor as $index => $vak)
            <option value="{{$vak->id_alur}}">{{$vak->jabatan}}</option>

          @endforeach

       </select>
  </div>
      <ul class="list-group">
          <button type="submit" class="btn btn-primary" type="submit">Simpan</button>
      </ul>
       </form>
      </div>
    </div>
  </div>
      </div>
      <?php
    }
       ?>
@endif
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
