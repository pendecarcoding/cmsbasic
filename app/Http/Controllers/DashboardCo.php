<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\InstansiModel;
use DataTables;
use App\Sp2hpModel;
use Session;
use App\Siswamodel;
use App\Gurumodel;
use App\Cmenu;
class DashboardCo extends Controller
{
  public function __construct()
{
  $this->main  = "theme.dashboard";
  $this->index = $this->main.".dashboard";


}
 public function index(){
   return view($this->index);
 }

 public function testlogika(){
   return view('theme.testlogika.index');
 }



     }
