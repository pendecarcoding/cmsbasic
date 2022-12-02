<?php
use App\Cmenu;
use App\AplikasiModel;
use App\UserModel;
$level       = Session::get('level');
$iduser      = Session::get('id_user');
$li          = new Cmenu();
$listmenu    = $li->getside($level);

$menu        = AplikasiModel::where('id_app','1')->first();
$user        = UserModel::where('id_user',$iduser)->first();

 ?>
<nav class="pcoded-navbar">
  <div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigatio-lavel">Application Menu</div>
    <ul class="pcoded-item pcoded-left-item">
 <li class=" ">
          <a href="{{url('dashboard')}}">
            <span class="pcoded-micon"><i class="fa-sharp fa-solid fa-gauge"></i><b>A</b></span>
            <span class="pcoded-mtext">Dashboard</span>
          </a>
        </li>
      @foreach($listmenu as $i=>$v)
        <?php
                $item = $v->dropdown;
                switch ($item) {
                  case 'N':
                    ?>
        <li class=" ">
          <a href="{{url($v->url)}}">
            <span class="pcoded-micon"><i class="{{$v->icon}}"></i><b>A</b></span>
            <span class="pcoded-mtext">{{$v->name}}</span>
          </a>
        </li>


        <?php
                  break;
                  case 'Y':
                  $submenu     = $li->getsub($v->id_sub,$level);
                  ?>
        <li class="pcoded-hasmenu active pcoded-trigger">
          <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
            <span class="pcoded-mtext">Dashboard</span>
          </a>
          <ul class="pcoded-submenu">
            @foreach($submenu as $index => $vsub)
              <li class="">
                <a href="https://demo.dashboardpack.com/adminty-html/index.html">
                  <span class="pcoded-mtext">Default</span>
                </a>
              </li>
            @endforeach


          </ul>
        </li>
        <?php
                  break;

                  default:
                    // code...
                  break;
                }
               ?>

              @endforeach


    </ul>


  </div>
</nav>