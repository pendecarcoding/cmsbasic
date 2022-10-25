<?php
      namespace App\Http\Controllers;
      use Illuminate\Http\Request;
      use App\InstansiModel;
      use App\Penempatans;
      use App\Bidang;
      use DataTables;
      use Session;
      use Intervention\Image\ImageManagerStatic as Image;
      class BidangCo extends Controller
      {
        public function __construct()
      {

      }

      public function index(){
          $data = Bidang::where('kode_unitkerja',Session::get('kode_unitkerja'))->get();
          return view('theme.bidang.index',compact('data'));
      }
      public function save(Request $r){
        $data =[
         'bidang'=>$r->bidang,
         'kode_unitkerja'=>Session::get('kode_unitkerja'),
        ];
        $act = Bidang::insert($data);
        if($act){
          return back()->with('success','Data Berhasil disimpan');
        }

      }
      public function update(Request $r){
        $data =[
          'bidang'=>$r->bidang,
          'kode_unitkerja'=>Session::get('kode_unitkerja'),
        ];
        $act = Bidang::where('id_bidang',$r->id)->update($data);
        if($act){
         return back()->with('success','Data berhasil diupdate');
       }else{
         return back()->with('success','Tidak ada data berubah');

       }

      }
      public function hapus($id){
       $act = Bidang::where('id_bidang',base64_decode($id))->delete();
        if($act){
        return back()->with('success','Data berhasil dihapus');
        }

      }

      public function addpenempatan(Request $r){
        $data =[
          'no'=>$r->no,
          'id_bidang'=>$r->id_bidang,
          'id_alur'=>$r->id_alur,
        ];
        $act = Penempatans::insert($data);
        if($act){
          return back()->with('success','Data berhasil disimpan');
        }
      }

      public function updatepenempatan(Request $r){
        $data =[
          'no'=>$r->no,
          'id_bidang'=>$r->id_bidang,
          'id_alur'=>$r->id_alur,
        ];
        $act = Penempatans::where('id',$r->id_penempatan)->update($data);
        if($act){
          return back()->with('success','Data berhasil diupdate');
        }
      }

      public function hapuspenempatan($id){
        $c = Penempatans::where('id',base64_decode($id))->count();
        if($c > 0){
          $act = Penempatans::where('id',base64_decode($id))->delete();
          if($act){
            return back()->with('success','Data berhasil dihapus');
          }
        }
      }



      public function penempatan(){
        $url = "https://absensi.bengkaliskab.go.id/API/RASENGAN/datapegawai";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
           "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = '{"kode_unitkerja": '.Session::get('kode_unitkerja').'}';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($resp, true);
        $pegawai = (object)$json;
        $data = Bidang::where('kode_unitkerja',Session::get('kode_unitkerja'))->get();
        return view('theme.bidang.penempatan',compact('data','pegawai'));
      }
    }
