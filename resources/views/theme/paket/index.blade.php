@extends('theme.Layouts.design')
@section('content')

@if(isset($_GET['act']) and $_GET['act']=='add')
  @include('theme.paket.tambah')
  @elseif(isset($_GET['act']) and $_GET['act']=='edit')
    @include('theme.paket.edit')
@else
<div class="container-fluid">
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><i class="fa fa-database"></i> Data Paket
        <a  href="{{url('datapaket?act=add')}}" class="btn btn-primary"style="color:white;float:right"><i class="fa fa-plus"></i> Tambah Data</a></h4>
      <h6 class="card-subtitle">Data ini digunakan untuk menajemen data paket Catering</h6>


      <div class="modal fade" id="tambah" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">

            <form action="{{url('users/add')}}" method="post">{{csrf_field()}}
            <div class="modal-body">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" required placeholder="nama">
              <label>Username</label>
              <input type="text" class="form-control" name="username" required placeholder="username">
              <label>Level</label>
              <select class="form-control" name="level" required>
                <option value="">--Pilih Level--</option>
                <?php
                  $level = App\Level::where('level','!=','admin')->get();
                 ?>
                 @foreach($level as $index=>$v)
                   <option value="{{$v->level}}">{{$v->level}}</option>
                 @endforeach

              </select>
              <label>Password</label>
              <input type="password" class="form-control" name="pass" required placeholder="password">
             </div>
            <div class="modal-footer">
              <a style="color:white;" class="btn btn-default" data-dismiss="modal">Close</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th></th>
            <th>Nama Paket</th>
            <th >Menu</th>
            <th style="width:40%">Harga</th>
            <th style="width:40%">action</th>
          </tr>
          </thead>
          <tbody>
            @foreach($data as $index => $v)
            <tr>
              <td>{{$index+1}}</td>
              <td>
                <?php
                  $image = explode(',',$v->gambar);

                ?>
                <image src="{{asset('theme/paket/'.$image[0])}}" style="width:300px">
              </td>
              <td>{{$v->namapaket}}</td>
              <td>{{$v->daftarmenu}}</td>
              <td>Rp {{number_format($v->harga)}}</td>
              <td>
                <a href="{{url('datapaket?act=edit&id='.base64_encode($v->id_paket))}}"style="color:white;"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <a data-toggle="tooltip" data-placement="top" title="Aksi Untuk Hapus Data" onclick="return confirm('Anda yakin akan menghapus data ini?, data yang dihapus tidak dapat dikembalikan')" href="{{url('hapuspaket/'.base64_encode($v->id_paket))}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>

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
</div>
@endif
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
