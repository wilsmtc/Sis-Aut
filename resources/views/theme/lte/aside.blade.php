{{-- {{dd($menusComposer)}} --}}
<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
  <script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
  </script>

  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-success">
        <i class="ace-icon fa fa-signal"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-pencil"></i>
      </button>

      <button class="btn btn-warning">
        <i class="ace-icon fa fa-users"></i>
      </button>

      <button class="btn btn-danger">
        <i class="ace-icon fa fa-cogs"></i>
      </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
      <span class="btn btn-success"></span>

      <span class="btn btn-info"></span>

      <span class="btn btn-warning"></span>

      <span class="btn btn-danger"></span>
    </div>
  </div><!-- /.sidebar-shortcuts -->

  <ul class="nav nav-list">
    <li style="text-align: center">  
      <a href="{{route('inicio')}}">   
        <span class="menu-text blue"> MENU PRINCIPAL</span>
      </a>
    </li>
    @foreach ($menusComposer as $key => $item)
        @if ($item["menu_id"] != 0)<!-- solo va entrar cuando es hijo -->
            @break
        @endif
        @include("theme.$theme.menu-item", ["item" => $item])<!-- me redirecciona a la vista menu.item -->
    @endforeach
    {{-- <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-list"></i>
        <span class="menu-text"> Roles </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="{{route('rol')}}">
            <i class="menu-icon fa fa-caret-right"></i>
            Ver Roles
          </a>

          <b class="arrow"></b>
        </li>
      </ul>
    </li> --}}

  </ul><!-- /.nav-list -->
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
