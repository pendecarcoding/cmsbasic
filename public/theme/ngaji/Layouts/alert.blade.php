@if(\Session::has('success'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i>
    {{Session::get('success')}}
  </div>
  @endif
  @if(\Session::has('danger'))
  <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-warning"></i>
      {{Session::get('danger')}}
    </div>
    @endif
