<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\InstansiModel;
use DataTables;
use App\Pegawaimodel;
use Session;
use App\RouteModel;
use App\Cmenu;
class PegawaiCo extends Controller
{
  public function __construct()
{
  $this->primary = "id_pegawai";
  $this->main    = "theme.pegawai";
  $this->index   = $this->main.".index";

}

 public function index(){
   $class = new Cmenu();
   $ki       = substr(Session::get('kode_unitkerja'),0,8);
   $data     = $class->getpegawaiinstansi($ki);
   return view($this->index,compact('data'));
 }

 public function add(Request $r){
   $data=[
     'nip'=>$r->nip,
     'nama_pegawai'=>$r->nama,
     'tempat_lahir'=>$r->tempatlahir,
     'tgl_lahir'=>$r->tgllahir,
     'jk'=>$r->jk,
     'masa_kerja_tahun'=>$r->tahun,
     'masa_kerja_bulan'=>$r->bulan
   ];
   $act = Pegawaimodel::insert($data);
   return back();
 }

 public function update(Request $r){
   $data=[
     'nip'=>$r->nip,
     'nama_pegawai'=>$r->nama,
     'tempat_lahir'=>$r->tempatlahir,
     'tgl_lahir'=>$r->tgllahir,
     'jk'=>$r->jk,
     'masa_kerja_tahun'=>$r->tahun,
     'masa_kerja_bulan'=>$r->bulan
   ];
   $act = Pegawaimodel::where($this->primary,$r->id)->update($data);
   return back();
 }
 public function hapus($id=null){
   $act = Pegawaimodel::where($this->primary,base64_decode($id))->delete();
   return back();
 }



     }
