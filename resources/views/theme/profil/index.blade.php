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
    <div class="card-body">
      <button style="float:right;"class="btn btn-primary" data-toggle="modal" data-target="#updatepass"><i class="fa fa-lock"></i> Update Password</button>
      <!-- Modal -->
<div id="updatepass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <form action="{{url('updatepass')}}" method="post">{{csrf_field()}}
          <label>Password Lama</label>
          <input type="hidden" value="{{$data->id_user}}" name="id" class="form-control" required>
          <input type="password" class="form-control" name="passlama" placeholder="Password Lama" required>
          <label>Password Baru</label>
          <input type="password" class="form-control" name="passbaru" placeholder="Password Baru" required>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
      <h4 class="card-title">Data Profil</h4>
      <h6 class="card-subtitle">Setting Akun Profil</h6>
      <form action="{{url('settingprofil/update')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
        <div class="form-group">
        <label>Foto</label>
        <br>
        <image id="preview" src="{{asset('theme/users/'.$data->foto)}}" style="width:200px;height:200px;">
        <br>
        <br>
        <input type="hidden" name="logold" value="{{$data->foto}}">
        <input type="file"  name="file" id="file"  onchange="tampilkanPreview(this,'preview')">
        <script>
        function tampilkanPreview(gambar,idpreview){
          //membuat objek gambar
            var gb = gambar.files;
          //loop untuk merender gambar
              for (var i = 0; i < gb.length; i++){
                //bikin variabel
                  var gbPreview = gb[i];
                  var imageType = /image.*/;
                  var preview=document.getElementById(idpreview);
                  var reader = new FileReader();
                    if (gbPreview.type.match(imageType)) {
                    //jika tipe data sesuai
                      preview.file = gbPreview;
                      reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                      })(preview);
                      //membaca data URL gambar
                      reader.readAsDataURL(gbPreview);
                    }
                    else{
                    //jika tipe data tidak sesuai
                      alert("Type file tidak sesuai. Khusus image.");
                      document.getElementById("file").value = "";
                    }
              }
        }
        </script>
        <br>
        <label>Nama </label>
        <input type="hidden" value="{{$data->id_user}}" name="id" class="form-control" required>
        <input type="text" value="{{$data->nama}}" name="nama" class="form-control" required>

        <label>Username</label>
        <input type="text" value="{{$data->username}}" name="username" class="form-control" required>
        <label>Alamat</label>
        <input type="text" value="{{$data->alamat}}" name="alamat" class="form-control" required>
        <label>Email</label>
        <input type="text" value="{{$data->email}}" name="email" class="form-control" required>
        <label>No Hp</label>
        <input type="text" value="{{$data->nohp}}" name="nohp" class="form-control" required>

        <br>
        <button style="float:right;"class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
</main>
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
