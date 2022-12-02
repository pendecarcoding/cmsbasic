@extends('theme.Layouts.design')
@section('content')
<?php
use App\level;
$level = level::all();
 ?>
<main class="app-content">
<div class="row">
<div class="col-12">
  <div class="card">
   
         <div class="card-header">
           <a data-toggle="modal" data-target="#tambah" style="color:white;float:right;"
            class="btn waves-effect waves-light btn-primary">Add Data</a>
<h5>Menu</h5>
<span>this for management Menu</span>
<div class="card-header-right">
<ul class="list-unstyled card-option">
<li><i class="feather icon-maximize full-card"></i></li>
<li><i class="feather icon-minus minimize-card"></i>
</li>
<li><i class="feather icon-trash-2 close-card"></i></li>
</ul>
</div>
</div>
    <div class="card-body">
     
      <!-- Modal -->
      <div id="tambah" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form action="{{url('settingroute/add')}}" method="post">{{csrf_field()}}
            <div class="modal-body">
              <label>Type</label>
              <input type="text" class="form-control" name="type" required>
              <label>Link</label>
              <input type="text" class="form-control" name="link" required>
              <label>Controller</label>
              <input type="text" class="form-control" name="controller" required>
              <label>Method</label>
              <input type="text" class="form-control" name="method" required>
              <label>Active</label>
              <select class="form-control" name="active" required>
                <option value="">--Pilih Aksi--</option>
                <option value="Y">Aktif</option>
                <option value="N">Non Aktif</option>
              </select>
              <label>Role Session</label>
              
              <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="akses[]">
                      @foreach($level as $index =>$v)
                      <option value="{{$v->level}}">{{$v->level}}</option>
                      @endforeach
                </select>
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
          <th>Type</th>
          <th>Link</th>
          <th>Controller</th>
          <th>Method</th>
          <th>SESSION</th>
          <th>Status</th>
          <th>action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data as $i=>$v)
            <tr>
              <td>{{$i+1}}</td>
              <td>{{$v->type}}</td>
              <td>{{$v->link}}</td>
              <td>{{$v->controller}}</td>
              <td>{{$v->method}}</td>
              <td>{{$v->session}}</td>
              <td>{{$v->active}}</td>
              <td>
                <span data-toggle="tooltip" data-placement="top" title="Aksi Untuk Edit">
                                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#m{{$v->id_route}}"><i style="color:white;" class="fa fa-pencil"></i> </a>&nbsp;
                                    </span>
                                      <a  data-toggle="tooltip" data-placement="top" title="Aksi Untuk Hapus" onclick="return confirm('Hapus?')" href="{{url('settingroute/hapus/'.base64_encode($v->id_route))}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>

              </td>
            </tr>
            <div class="modal fade" id="m{{$v->id_route}}" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                  </div>
                  <form action="{{url('settingroute/update')}}" method="post">{{csrf_field()}}
                  <div class="modal-body">
                    <label>Type</label>
                    <input type="hidden" value="{{$v->id_route}}" class="form-control" name="id" required>
                    <input type="text" value="{{$v->type}}" class="form-control" name="type" required>
                    <label>Link</label>
                    <input type="text" value="{{$v->link}}" class="form-control" name="link" required>
                    <label>Controller</label>
                    <input type="text" value="{{$v->controller}}" class="form-control" name="controller" required>
                    <label>Method</label>
                    <input type="text" value="{{$v->method}}" class="form-control" name="method" required>
                    <label>Active</label>
                    <select id="select2insidemodal" class="form-control" name="active" required>
                      <option value="">--Pilih Aksi--</option>
                      <option value="Y" @if($v->active=='Y') selected @endif>Aktif</option>
                      <option value="N" @if($v->active=='N') selected @endif>Non Aktif</option>
                    </select>
                    <label>Role Session</label>
                    <?php
                      $mn      = explode(',',$v->session);
                     ?>
                    <select class="form-control select2" name="akses[]" id="exampleSelect2" multiple=""
                            style="width: 100%;color:white;">
                            @foreach($level as $index =>$v)
                            <option value="{{$v->level}}" @if(in_array($v->level,$mn)){{"Selected"}}@endif>{{$v->level}}</option>
                            @endforeach
                      </select>
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
<script>

$(document).ready(function() {
  $("#select2insidemodal").select2({
    dropdownParent: $("#tambah")
  });
});

</script>
