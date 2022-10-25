<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DataTables;
use Session;
use App\PaketModel;
use App\Pemesananmodel;
use App\JamModel;
use App\Cmenu;
use App\Loginmodel;
use App\Slider;
use App\MenuModel;
use App\AbsenModel;
use App\RouteModel;
use App\KordinatModel;
use DateTime;
use DatePeriod;
use DateInterval;
use Intervention\Image\ImageManagerStatic as Image;
class AndroCo extends Controller
{

public function apiandro($key=null,$url=null,Request $r){

  if($key=='RASENGAN'){
    switch ($url) {
      case 'daftarhadir':
      $class = new Cmenu();
      $ki       = substr($r->kode_unitkerja,0,8);
      $data     = $class->getpegawaiinstansi($ki);
      print json_encode($data);
      break;
      case 'listroute':
      $result = array();
      $level  = Session::get('level');
      $data = RouteModel::where('active','Y')
               ->get();
               foreach ($data as $key => $route) {
                 $mn = explode(',',$route->session);

                 //$mn = array("admin", "Joe", "Glenn", "Cleveland");

                   if(in_array($level,$mn)){
                     $dt=[
                       'link'=>$route->link,
                       'controller'=>$route->controller,
                       'method'=>$route->method
                     ];
                      array_push($result,$dt);
                   }



               }
              return json_encode($result);
      break;
      case 'listizin':
      $result = array();
      $data   = AbsenModel::where('id_pegawai',$r->id)->where('status',$r->status)->orderby('id_absen','DESC')->groupby('no_surat')->get();
      if($data->count() > 0){

        $result=[
          'msg'=>'OK',
          'data'=>$data,
        ];
         return json_encode($result);
      }else{
        $result=[
          'msg'=>'FAIL',
          'data'=>null,
        ];
         return json_encode($result);
      }
      break;
      case 'getinfoabsen':
      $jenis = ($r->jenis=='1 Hari') ? 'A':$r->jenis;
      $result= array();
      $check = AbsenModel::where('id_pegawai',$r->id)
      ->where('jenis',$jenis)
                ->where('kode_unitkerja',$r->kode_unitkerja)
                ->wheredate('tglabsen',$r->tgl)
               ->first();

      if($check){
        $result=[
          'status'=>$check->status,
          'latitude'=>$check->latitude,
          'longitude'=>$check->longitude,
          'waktuabsen'=>$check->time,
        ];
        print json_encode($result);
      }else{
        $result=[
          'status'=>'',
          'latitude'=>'',
          'longitude'=>'',
          'waktuabsen'=>'',
        ];
        print json_encode($result);
      }
        // code...
        break;
      case 'datapegawai':
        $class = new Cmenu();
        $data  = $class->getpegawaiinstansi($r->kode_unitkerja);
        if($data != null){
          return $data;
        }
       break;
      case 'getjam':
        $class = new Cmenu();
        $result = array();
        $hari      = $class->gethari(date('Y-m-d'));

        $kordinat  = KordinatModel::where('kode_unitkerja',$r->id)->first();
        $jammasuk  = JamModel::where('hari',$hari)
                     ->where('kode_unitkerja',$r->id)
                     ->where('jenis','Jam Masuk')
                     ->first();
        $jampulang = JamModel::where('kode_unitkerja',$r->id)->where('hari',$hari)
                     ->where('jenis','Jam Pulang')
                     ->first();
        $masuk     = ($jammasuk != null) ? $jammasuk->jam.' - '.$jammasuk->batas:'LIBUR';
        $pulang    = ($jampulang != null) ? $jampulang->jam.' - '.$jampulang->batas:'LIBUR';
        $result=[
          'latitudekantor'=>$kordinat->latitude,
          'longitudekantor'=>$kordinat->longitude,
          'jam_masuk'=>$masuk,
          'jam_keluar'=>$pulang,
        ];
        print json_encode($result);
        break;

        case 'uploadizin':
        $class      = new Cmenu();
        $unitkerja  = $class->getprofilpgapi($r->id);
        $target_dir = 'suratizin/'.$unitkerja['kode_unitkerja'];
        $dari      = new DateTime($r->awal);
        $tgl2      = date('Y-m-d', strtotime('+1 days', strtotime($r->akhir)));
        $sampai    = new DateTime($tgl2);
        $interval  = DateInterval::createFromDateString('1 day');
        $periode   = new DatePeriod($dari,$interval,$sampai);
        $latitude  = ($r->has('latitude')) ? $r->latitude:'0';
        $longitude = ($r->has('longitude')) ? $r->longitude:'0';
        $sukses    = 0;
        $gagal     = 0;
        $r->validate([
            'file' => 'required|mimes:pdf|max:600',
        ]);

        $fileName  = time().'.'.$r->file->extension();
        $result    = array();
          foreach ($periode as $dt ) {
            $data=[
              'id_absen'=>uniqid(),
              'id_pegawai'=>$r->id,
              'status'=>$r->status,
              'keterangan'=>$r->keterangan,
              'jenis'=>$r->jenis,
              'kode_unitkerja'=>$unitkerja['kode_unitkerja'],
              'no_surat'=>$r->nosurat,
              'latitude'=>$latitude,
              'longitude'=>$longitude,
              'swafoto'=>'izin.png',
              'tglabsen'=>$dt->format('Y-m-d'),
              'file'=>$fileName,
              'masaizin'=>$r->awal.' s/d '.$r->akhir,
            ];
            $act  = AbsenModel::insert($data);
            if($act){
              $sukses+=1;
            }else{
              $gagal+=1;
            }

          }
          if($sukses > 0){
              $r->file->move(public_path($target_dir), $fileName);
              $result =[
                'message'=>'Upload Berhasil',
                'success'=>true
              ];
              print json_encode($result);

          }else{
            $result =[
              'message'=>'fail',
              'success'=>false
            ];
            print json_encode($result);

          }


        break;


      default:
        // code...
        break;

  }

}else{
    $result =[
      'massage'=>'TOKEN INVALID'
    ];
    print json_encode($result);
  }
}




     }
