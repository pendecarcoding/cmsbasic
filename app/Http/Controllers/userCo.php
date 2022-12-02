<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\InstansiModel;
use DataTables;
use Session;
use App\menu;
use App\Cmenu;
use App\Level;
use App\Loginmodel;
use App\Bidang;
use App\aksesmenuModel;
class userCo extends Controller
{
  public function __construct()
{
  $this->primary = "id_user";
  $this->main    = "theme.users";
  $this->level   = Session::get('level');
  $this->userid  = Session::get('id_user');
  $this->msukses = 'Data Berhasil disimpan';
  $this->msupdate = 'Data Berhasil diupdate';
  $this->index   = $this->main.".index";

}



public function index(){
  $class = new Cmenu();
  $data  = Loginmodel::where('level','!=','admin')->get();

  return view($this->index,compact('data'));
}
public function save(Request $r){
  $bidang = ($r->has('bidang')) ? $r->bidang:null;
  $data=[
    'nama'=>$r->nama,
    'username'=>$r->username,
    'password'=>md5($r->pass),
    'level'=>$r->level
  ];
  $act = Loginmodel::insert($data);
  return back()->with('success',$this->msukses);
}
public function update(Request $r){
  $data=[
    'nama'=>$r->nama,
    'username'=>$r->username,
    'alamat'=>$r->alamat,
    'email'=>$r->email,
    'nohp'=>$r->nohp,
    'password'=>md5($r->pass),
    'level'=>$r->level
  ];
  $act = Loginmodel::where($this->primary,$r->id)->update($data);
  return back()->with('success',$this->msukses);
}
public function userblokir($id=null){
  $data=[
    'blokir'=>'Y'
  ];
  $act = Loginmodel::where($this->primary,base64_decode($id))->update($data);
  return back()->with('success','User Berhasil diblokir');
}

public function bukablokir($id=null){
  $data=[
    'blokir'=>'N'
  ];
  $act = Loginmodel::where($this->primary,base64_decode($id))->update($data);
  return back()->with('success','User Berhasil diaktifkan');
}

public function hapus($id=null){
  $act = Loginmodel::where($this->primary,base64_decode($id))->delete();
  return back()->with('success','Data Berhasil di hapus');
}
public function reset($id=null){
  $data=[
    'password'=>md5('12345')
  ];
  $act = Loginmodel::where($this->primary,base64_decode($id))->update($data);
  return back()->with('success','Password Berhasil di reset');
}




     }
