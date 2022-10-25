@extends('theme.Layouts.design')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i>Users</h1>
      <p>Untuk mengatur user Aplikasi</p>
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
      <a data-toggle="modal" data-target="#tambah" style="float:right;color:white;"class="btn waves-effect waves-light btn-primary">Tambah Data</a>

      <h4 class="card-title">Data Akun Pegawai</h4>
      <h6 class="card-subtitle">Data ini digunakan untuk mengelola akun Pegawai</h6>
    </div>
    <div class="card-body">

      <!-- Modal -->
      <div class="modal fade" id="tambah" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form action="{{url('users/add')}}" method="post">{{csrf_field()}}
            <div class="modal-body">
              <label>Nama</label>
              <input type="hidden" name="unitkerja" value="{{Session::get('kode_unitkerja')}}">
              <input type="text" class="form-control" name="nama" required placeholder="nama">
              <label>Username</label>
              <input type="text" class="form-control" name="username" required placeholder="username">

              <label>Bidang</label><br>
              <select style="width:100%" class="form-control select2" name="bidang" required>
                <option value="">--Pilih Bidang--</option>

                 @foreach($bidang as $index=>$v)
                   <option value="{{$v['id_bidang']}}">{{$v['bidang']}}</option>
                 @endforeach

              </select><br>
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
        <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Level</th>
          <th>Bidang</th>
          <th>action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data as $i=>$v)
            <tr>
              <td>{{$i+1}}</td>
              <td>{{$v->nama}}</td>
              <td>{{$v->username}}</td>
              <td>{{$v->level}}</td>
              <td >{{$v->bidang}}</td>

              <td>
                <span data-toggle="tooltip" data-placement="top" title="Aksi Untuk Edit">
                                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#m{{$v->id_user}}"><i style="color:white;" class="fa fa-edit"></i></a>&nbsp;
                                    </span>
                                      <a  data-toggle="tooltip" data-placement="top" title="Aksi Untuk Hapus" onclick="return confirm('Hapus?')" href="{{url('users/hapus/'.base64_encode($v->id_user))}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>

              </td>
            </tr>
            <div class="modal fade" id="m{{$v->id_user}}" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Update Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                  </div>
                  <form action="{{url('users/update')}}" method="post">{{csrf_field()}}
                    <div class="modal-body">
                      <label>Nama</label>
                      <input type="hidden" class="form-control" name="id" value="{{$v->id_user}}" required placeholder="nama">
                      <input type="text" value="{{$v->nama}}" class="form-control" name="nama" required placeholder="nama">
                      <label>Username</label>
                      <input type="text" class="form-control" value="{{$v->username}}" name="username" required placeholder="username">
                    
                      <label>Unit Kerja</label><br>
                      <select style="width:100%" class="form-control select2" name="unitkerja" required>
                        <option value="">--Pilih Unit Kerja--</option>

                         @foreach($listintansi as $index=>$u)
                           @if($u['nama_unitkerja'] !='')
                           <option value="{{$u['kode_unitkerja']}}" @if($u['kode_unitkerja']==$v->kode_unitkerja) selected @endif>{{$u['nama_unitkerja']}}</option>
                           @endif
                         @endforeach

                      </select><br>
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
