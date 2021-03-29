@if ($item ["submenu"]== [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}" >
    <div class="dd-handle dd3-handle"></div>
    <div style="background: rgb(44, 106, 160)" class="dd3-content {{$item["url"]=="javascript:;" ? "font-weight-bold" : ""}}">
            <a class="white"><i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i> {{$item["nombre"] . " | Url -> " . $item["url"]}}</a>
            <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar este menú">&nbsp; &nbsp; &nbsp;<i class="text-danger fa fa-close white"></i></a>
            <a href="{{route('editar_menu', ['id' => $item["id"]])}}" class="pull-right tooltipsC" title="Editar este menú"><i class="text-danger fa fa-wrench white"></i></a>
        </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div style="background: rgb(44, 106, 160)" class="dd3-content {{$item["url"]=="javascript:;" ? "font-weight-bold" : ""}}">
        <a class="white"><i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i> {{ $item["nombre"] . " | Url -> " . $item["url"]}}</a>
        <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar este menú">&nbsp; &nbsp; &nbsp;<i class="text-danger fa fa-close white"></i></a>
        <a href="{{route('editar_menu', ['id' => $item["id"]])}}" class="pull-right tooltipsC" title="Editar este menú"><i class="text-danger fa fa-wrench white"></i></a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif