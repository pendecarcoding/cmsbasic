@extends('theme.Layouts.design')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><i class="fa fa-users"></i> Data Siswa <a class="btn btn-primary"style="color:white;float:right;"><i class="fa fa-print"></i> Cetak Data</a></h4>
      <h6 class="card-subtitle">Data ini digunakan untuk menajemen data guru</h6>


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
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Email</th>
          <th>No HP</th>
          <th>Alamat</th>
          <th>action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data as $i=>$v)
            <tr @if($v->blokir=='Y') style="background-color:#ff001814;" @endif>
              <td style="width:5%">{{$i+1}}</td>
              <td style="width:10%"><img style="width:50px;height:50px;" class="img-profile rounded-circle"
                src="@if(file_exists(public_path().'/siswa/'.$v->image)){{asset('siswa/'.$v->image)}} @else {{asset('siswa/avatar.png')}}  @endif"></td>
              <td style="width:10%">{{$v->nama_siswa}}</td>
              <td style="width:10%">{{$v->jenis_kelamin}}</td>
              <td style="width:10%">{{$v->email}}</td>
              <td style="width:20%">{{$v->no_hp}}</td>
              <td style="width:20%">{{$v->alamat}}</td>

              <td style="width:50%">
                <div class="row" style="padding:20px;">
                  @if($v->blokir=='N')
                  <!--<a class="btn btn-secondary btn-sm" onclick="return confirm('Apakah Anda yakin akan memblokir akun Guru ini?')" href="{{url('siswa/blokir/'.base64_encode($v->id_siswa))}}"><i style="color:white;" class="fa fa-ban"></i> </a>&nbsp;
                  @else
                    <!--<a class="btn btn-secondary btn-sm" onclick="return confirm('Apakah Anda yakin akan membuka memblokir akun Guru ini?')" href="{{url('siswa/buka/'.base64_encode($v->id_siswa))}}"><i style="color:white;" class="fa fa-unlock"></i> </a>&nbsp;-->
                  @endif
                  <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#m{{$v->id_siswa}}"><i style="color:white;" class="fa fa-eye"></i> </a>&nbsp;
                  <a  data-toggle="tooltip" data-placement="top" title="Aksi Untuk Hapus Siswa" onclick="return confirm('Apakah anda ingin menghapus data ini ?, data yang sudah dihapus tidak dapat dikembalikan lagi')" href="{{url('siswa/hapus/'.base64_encode($v->id_siswa))}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                </div>


              </td>
            </tr>
            <div class="modal fade" id="m{{$v->id_siswa}}" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">{{$v->nama_siswa}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                  </div>

                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-3">
                            <img style="width:100%;height:200px;" class="img-profile rounded-circle" src="@if(file_exists(public_path().'/siswa/'.$v->image)){{asset('siswa/'.$v->image)}} @else {{asset('siswa/avatar.png')}}  @endif">
                        </div>
                        <div class="col-md-9">
                          <label>Nama Siswa</label>
                          <input type="hidden" class="form-control" name="id" value="{{$v->id_user}}" required placeholder="nama">
                          <input type="text" disabled value="{{$v->nama_siswa}}" class="form-control" name="nama" required placeholder="nama">
                          <label>No Hp</label>
                          <input type="text" disabled class="form-control" value="{{$v->no_hp}}" name="username" required placeholder="username">
                          <label>Email</label>
                          <input type="text" disabled class="form-control" value="{{$v->email}}" name="username" required placeholder="username">
                          <label>Jenis Kelamin</label>
                          <input type="text" disabled class="form-control" value="{{$v->jenis_kelamin}}" name="pass" required placeholder="password">
                          <label>Alamat</label>
                          <input type="text" disabled class="form-control" value="{{$v->alamat}}" name="pass" required placeholder="password">

                        </div>
                      </div>


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
