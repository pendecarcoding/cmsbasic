
<div class="container-fluid">
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- basic table -->
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <a href="{{url('datapaket')}}"style="float:right;color:white;" class="btn btn-danger"><i class="fa fa-times"></i></a>
      <!-- Modal -->

      <h4 class="card-title">Form Tambah Daftar Paket</h4>
      <h6 class="card-subtitle"><i>form ini digunakan untuk menambah Daftar Paket</i></h6>
      <hr>
      <br>
      <form action="{{url('addpaket')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}

        <label>Foto</label>
        <br>

        <div class="row" id="coba"></div>

        <br>
        <br>
        <div class="form-group">
        <label>Nama Paket</label>
        <input type="text" name="namapaket" class="form-control" required="">
        <br>
        <label>Daftar Menu</label>
        <select class="form-control select2" name="menu[]" multiple="multiple"
                style="width: 100%;color:white;">
          @foreach ($menu as $index => $d)
          <option value="{{$d->menumakanan}}">{{$d->menumakanan}}</option>
          @endforeach
        </select>
        <br>
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required="">

        <br>
        <button style="float:right;" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
</div>
