@extends('theme.Layouts.design')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><i class="fa fa-credit-card"></i> List Pembayaran
        <a data-toggle="modal" data-target="#tambah" class="btn btn-primary"style="color:white;float:right;"><i class="fa fa-print"></i> Cetak</a></h4>
      <h6 class="card-subtitle">Data ini berupa list dari pembayaran siswa</h6>


      <div class="modal fade" id="tambah" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">

            <form action="{{url('mengajar/add')}}" method="post">{{csrf_field()}}
            <div class="modal-body">
              <label>Kategorin Mengajar</label>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <input type="text" class="form-control" name="kategori" required placeholder="Kategori Mengajar">

             </div>
            <div class="modal-footer">

              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
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
            <th>Nama Siswa</th>
            <th>Nama Guru</th>
            <th>Kategori Layanan</th>
            <th>Kategori Mengajar</th>
            <th>Aksi</th>
          </tr>
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
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
