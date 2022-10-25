<?php
use App\Cmenu;
$class = new Cmenu();
?>
@extends('theme.Layouts.design')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><i class="fa fa-file"></i> List Pemesanan
      <h6 class="card-subtitle">Data ini berupa list dari Pemesanan</h6>


    <br>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Pesanan</th>
            <th>Pemesan</th>
            <th>Acara</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Porsi</th>
            <th>Status</th>
            <th style="width:20%">Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach($data as $index => $v)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$v->kodepesan}}</td>
              <td>{{$class->getuser($v->id_user)->nama}}</td>
              <td>{{$v->acara}}</td>
              <td>{{$v->nohp}}</td>
              <td>
                {{$v->lokasi}}
              </td>
              <td>
                {{$v->porsi}}
              </td>
              <td>
                @if($v->status=='Y')

                @endif
                {{$v->status}}
              </td>
              <td>
               <a onclick="return confirm('Anda yakin akan menerima Pesanan ini?, Jika menerima maka user yang bersangkutan akan menerima status Pesanan Diterima Mohon Hubungi Konsumen untuk Lebih lanjut masalah Pemesanan ini')" href="{{url('terimapesan/'.base64_encode($v->id_pemesanan))}}" style="color:white;"class="btn btn-primary btn-sm">Terima</a>
               <a data-toggle="modal" data-target="#m{{$v->id_pemesanan}}" style="color:white;"class="btn btn-warning btn-sm">Lihat</a>
              </td>
            </tr>
            <div id="m{{$v->id_pemesanan}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Rincian Pemesanan</h4>

                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      Kode Pemesanan : {{$v->kodepesan}}
                      <br>
                      Porsi  : {{$v->porsi}}
                      <br>
                      Harga satuan  : {{$class->checkpaket($v->id_paket)->harga}}
                      <br>
                       Total Harga  : Rp{{number_format(($class->checkpaket($v->id_paket)->harga)*$v->porsi)}}
                       <br>

                        Catatan  : {!! $v->catatan !!}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
