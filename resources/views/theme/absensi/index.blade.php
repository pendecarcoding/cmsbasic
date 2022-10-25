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
      <h1><i class="fa fa-calendar"></i> Data Absensi</h1>
      <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
      <a data-toggle="modal" data-target="#cuti" style="float:right;color:white"class="btn btn-danger"><i class="fa fa-file"></i> Izin Cuti</a>

      <div id="cuti" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Izin CUTI</h4>
              <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('ajukanizin')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
            <div class="modal-body">
              <input type="hidden" name="jenis" value="C">
              <input type="hidden" name="kat" value="A">
              <label>No SURAT</label>
              <input type="text" class="form-control" name="nosurat" value="">
              <label>Pegawai</label>
              <select class="form-control select2" name="pg[]" id="exampleSelect2" multiple=""
                      style="width: 100%;color:white;">
                @foreach ($pg as $index => $d)
                <option value="{{$d['no']}}" >{{$d['gd'].$d['nama'].$d['gb']}}</option>
                @endforeach
              </select>
              <label>Tanggal</label>
               <div class="row" style="margin-left:2px;">
                 <input type="date" class="form-control" name="awal" style="width:40%">
                  S/D
                 <input type="date" class="form-control" name="akhir" style="width:40%">
               </div>
              <label>File SPT (Format PDF Max Size : 200kb)</label>
              <input type="file" class="form-control" name="file" value="">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>
        </form>

        </div>
      </div>

      <a data-toggle="modal" data-target="#sakit" style="float:right;color:white;margin-right:2px;"class="btn btn-warning"><i class="fa fa-file"></i> Izin Sakit</a>
      <div id="sakit" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Izin Sakit</h4>
              <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('ajukanizin')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
            <div class="modal-body">
              <input type="hidden" name="jenis" value="S">
              <input type="hidden" name="kat" value="A">
              <label>No Surat</label>
              <input type="text" class="form-control" name="nosurat" value="">
              <label>Pegawai</label>
              <select class="form-control select2" name="pg[]" id="exampleSelect2" multiple=""
                      style="width: 100%;color:white;">
                @foreach ($pg as $index => $d)
                <option value="{{$d['no']}}" >{{$d['gd'].$d['nama'].$d['gb']}}</option>
                @endforeach
              </select>
              <label>Tanggal</label>
               <div class="row" style="margin-left:2px;">
                 <input type="date" class="form-control" name="awal" style="width:40%">
                  S/D
                 <input type="date" class="form-control" name="akhir" style="width:40%">
               </div>
              <label>File Surat Sakit (Format PDF Max Size : 200kb)</label>
              <input type="file" class="form-control" name="file" value="">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>
        </form>

        </div>
      </div>
      <a data-toggle="modal" data-target="#dinas" style="float:right;color:white;margin-right:2px;"class="btn btn-info"><i class="fa fa-file"></i> Izin Dinas</a>


      <div id="dinas" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Izin Dinas</h4>
              <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('ajukanizin')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
            <div class="modal-body">
              <input type="hidden" name="jenis" value="D">
              <input type="hidden" name="kat" value="A">
              <label>No SPT</label>
              <input type="text" class="form-control" name="nosurat" value="">
              <label>Pegawai</label>
              <select class="form-control select2" name="pg[]" id="exampleSelect2" multiple=""
                      style="width: 100%;color:white;">
                @foreach ($pg as $index => $d)
                <option value="{{$d['no']}}" >{{$d['gd'].$d['nama'].$d['gb']}}</option>
                @endforeach
              </select>
              <label>Tanggal</label>
               <div class="row" style="margin-left:2px;">
                 <input type="date" class="form-control" name="awal" style="width:40%">
                  S/D
                 <input type="date" class="form-control" name="akhir" style="width:40%">
               </div>
              <label>File SPT (Format PDF Max Size : 200kb)</label>
              <input type="file" class="form-control" name="file" value="">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>
        </form>

        </div>
      </div>
      <select class="form-control" style="width:20%;float:right;margin-right:2px;" name="jenis">
        <option>--Jenis Absensi--</option>
        <option value="M">Masuk</option>
        <option value="K">Keluar</option>
      </select>
    <h4 class="card-title"><i class="fa fa-calendar"></i> Data Absensi</h4>


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
            <th>Waktu Absen</th>
            <th>Latitude / Longitude</th>
            <th>IP</th>
            <th>Status</th>
            <th>Keterangan</th>
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
          <td>@if($absensi != null){{$absensi->tglabsen}}@endif</td>
          <td>@if($absensi != null)Latitude :{{$absensi->latitude}}<br> Longitude :{{$absensi->longitude}}@endif</td>
          <td></td>
          <td>@if($absensi != null){{$absensi->status}}@endif</td>
          <td>@if($absensi != null){{$absensi->keterangan}}@endif</td>
          <?php
            $file = ($absensi != null) ? $absensi->file : '';
           ?>
          <td width="15%">
            <a style="color:white;" class="btn btn-primary btn-sm"><i class="fa fa-qrcode"></i></a>
            <a ref="{{url('suratizin/'.Session::get('kode_unitkerja').'/'.$file)}}"
  target="popup"
  onclick="window.open('{{url('suratizin/'.Session::get('kode_unitkerja').'/'.$file)}}','popup','width=900,height=800'); return false;" style="color:white;" class="btn btn-primary btn-sm"><i class="fa fa-file"></i></a>
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
