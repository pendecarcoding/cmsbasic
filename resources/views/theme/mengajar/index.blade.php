@extends('theme.Layouts.design')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><i class="fa fa-tag"></i> Data Kategori Mengajar
        <a data-toggle="modal" data-target="#tambah" class="btn btn-primary"style="color:white;float:right;"><i class="fa fa-plus"></i> Tambah Data</a></h4>
      <h6 class="card-subtitle">Data ini berupa list Kategori Mengajar</h6>


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
            <th>Kategori Mengajar</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($data as $i=>$v)
              <tr>
                <td style="width:5%">{{$i+1}}</td>
                <td style="width:70%">{{$v->kategorimengajar}}</td>
                <td style="width:30%">
                <div class="row" style="padding:20px;">
                  <a style="color:white;"class="btn btn-info btn-sm" data-toggle="modal" data-target="#m{{$v->id_kategorimengajar}}"><i style="color:white;" class="fa fa-eye"></i> Lihat </a>&nbsp;
                  <a  data-toggle="tooltip" data-placement="top" title="Aksi Untuk Blokir" onclick="return confirm('Apakah anda yakin akan menghapus data ini, data yang dihapus tidak dapat dikembalikan?')" href="{{url('mengajar/hapus/'.base64_encode($v->id_kategorimengajar))}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </a>
                </div>


              </td>
            </tr>
            <div class="modal fade" id="m{{$v->id_kategorimengajar}}" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">

                  <form action="{{url('mengajar/update')}}" method="post">{{csrf_field()}}
                  <div class="modal-body">
                    <label>Kategorin Mengajar</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <input type="hidden" name="id" value="{{$v->id_kategorimengajar}}">
                    <input type="text" class="form-control" name="kategori" value="{{$v->kategorimengajar}}" required placeholder="Kategori Mengajar">

                   </div>
                  <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
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
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
