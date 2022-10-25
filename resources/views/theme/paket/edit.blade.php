<?php
use App\PaketModel;
use App\Cmenu;
$m = PaketModel::where('id_paket',base64_decode($_GET['id']))->first();
$class = new Cmenu;
?>

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

      <h4 class="card-title">Form Update Daftar Paket</h4>
      <h6 class="card-subtitle"><i>form ini digunakan untuk mengedit Daftar Paket</i></h6>
      <hr>
      <br>
      <form action="{{url('updatepaket')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
        <input type="hidden" name="id" value="{{$m->id_paket}}">
        <label>Foto</label>
        <br>
        <?php
         $i = 100;
         $images = explode(',',$m->gambar);
        ?>


        <div class="row" id="coba">
          @foreach($images as $image)
          <?php
            $no = $i++;
           ?>
          <div class="col-md-4 col-sm-4 spartan_item_wrapper" data-spartanindexrow="{{$no}}" style="margin-bottom : 20px; "><div style="position: relative;"><div class="spartan_item_loader" data-spartanindexloader="{{$no}}" style=" position: absolute; width: 100%; height: 200px; background: rgba(255,255,255, 0.7); z-index: 22; text-align: center; align-items: center; margin: auto; justify-content: center; flex-direction: column; display : none; font-size : 1.7em; color: #CECECE"><i class="fas fa-sync fa-spin"></i></div><label class="file_upload" style="width: 100%; height: 200px; border: 2px dashed #ddd; border-radius: 3px; cursor: pointer; text-align: center; overflow: hidden; padding: 5px; margin-top: 5px; margin-bottom : 5px; position : relative; display: flex; align-items: center; margin: auto; justify-content: center; flex-direction: column;"><a href="javascript:void({{$no}})" data-spartanindexremove="{{$no}}" style="right: 3px; top: 3px; background: rgb(237, 60, 32); border-radius: 3px; width: 30px; height: 30px; line-height: 30px; text-align: center; text-decoration: none; color: rgb(255, 255, 255); position: absolute !important;" class="spartan_remove_row"><i class="fas fa-times"></i></a><img style="width: 100%; margin: 0px auto; vertical-align: middle; display: none;" data-spartanindexi="{{$no}}" src="https://catering.stackapps.id/noimage.png" class="spartan_image_placeholder"> <p data-spartanlbldropfile="{{$no}}" style="color : #5FAAE1; display: none; width : auto; ">Drop Here</p><img style="width: 100%; vertical-align: middle;" class="img_" data-spartanindeximage="{{$no}}" src="data:image/jpg;base64,<?php echo base64_encode($class->curl_get_file_contents('https://catering.stackapps.id/theme/paket/'.$image)) ?>">
            <input class="form-control spartan_image_input" accept="image/*" data-spartanindexinput="{{$no}}" style="display : none" name="fileUpload[]" type="file"></label> </div></div>
          @endforeach

        </div>

        <br>
        <br>
        <div class="form-group">
        <label>Nama Paket</label>
        <input type="text" name="namapaket" value="{{$m->namapaket}}" class="form-control" required="">
        <br>

        <label>Daftar Menu</label>
        <select class="form-control select2" name="menu[]" multiple="multiple"
                style="width: 100%;color:white;">
          @foreach ($menu as $index => $d)
          <option value="{{$d->menumakanan}}" @if(in_array($d->menumakanan,explode(',',$m->daftarmenu))){{"Selected"}}@endif>{{$d->menumakanan}}</option>
          @endforeach
        </select>
        <br>
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{$m->harga}}" required="">

        <br>
        <button style="float:right;" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
</div>
