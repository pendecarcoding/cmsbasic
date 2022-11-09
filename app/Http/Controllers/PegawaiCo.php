<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\PegawaiRequest;
use App\Http\Interfaces\PegawaiInterfaces;
class PegawaiCo extends Controller
{

  private $pg;
  public function __construct(PegawaiInterfaces $pg)
{
  $this->primary = "id_pegawai";
  $this->main    = "theme.pegawai";
  $this->index   = $this->main.".index";
  $this->DI      = $pg;

}

 public function index(){
   $data = $this->DI->all();
   return view($this->index,compact('data'));
 }

 public function create(Request $r){
  try {
    if($r->has('file')){
    $data = $r->all();
    $this->DI->create($data);
    }
  } catch (\Throwable $th) {
    return back()->with('danger',$th->getmessage());
  }
   
 }

 public function update(Request $r){
   
 }
 public function delete($id=null){
   
 }



     }
