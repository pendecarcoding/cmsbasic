<?php
use App\Cmenu;
use App\AplikasiModel;
$level       = Session::get('level');
$li          = new Cmenu();
$listmenu    = $li->getside($level);
$menu        = AplikasiModel::where('id_app','1')->first();
//$listmenuall = $li->getsideall($level);
 ?>
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{url('dashboard')}}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Aplikasi</span></li>
                @foreach($listmenu as $i=>$v)
                <?php
                  $item = $v->dropdown;
                  switch ($item) {
                    case 'N':
                      ?>

                      <li class="sidebar-item {{ Request::is($v->is_active)? "selected":"" }}"> <a class="sidebar-link sidebar-link {{ Request::is('daftarajuan/lihat/*')? "active":"" }}" href="{{url($v->url)}}"
                              aria-expanded="false"><i data-feather="{{$v->icon}}" class="feather-icon"></i><span
                                  class="hide-menu">{{$v->name}}
                      </span></a>
                      </li>
                      <?php
                    break;
                    case 'Y':
                      ?>
                      <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                              aria-expanded="false"><i data-feather="{{$v->icon}}" class="feather-icon"></i><span
                                  class="hide-menu">{{$v->name}}</span></a>
                          <ul aria-expanded="false" class="collapse  first-level base-level-line">
                              <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span
                                          class="hide-menu"> Basic Table
                                      </span></a>
                              </li>
                              <li class="sidebar-item"><a href="table-dark-basic.html" class="sidebar-link"><span
                                          class="hide-menu"> Dark Basic Table
                                      </span></a>
                              </li>
                              <li class="sidebar-item"><a href="table-sizing.html" class="sidebar-link"><span
                                          class="hide-menu">
                                          Sizing Table
                                      </span></a>
                              </li>
                              <li class="sidebar-item"><a href="table-layout-coloured.html" class="sidebar-link"><span
                                          class="hide-menu">
                                          Coloured
                                          Table Layout
                                      </span></a>
                              </li>
                              <li class="sidebar-item"><a href="table-datatable-basic.html" class="sidebar-link"><span
                                          class="hide-menu">
                                          Basic
                                          Datatables
                                          Layout
                                      </span></a>
                              </li>
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
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
