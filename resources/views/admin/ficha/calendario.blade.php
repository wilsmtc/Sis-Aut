@extends("theme.$theme.layout")
@section('titulo')
Calendario
@endsection
@section("styles")
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/core/main.css")}}"> 
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/daygrid/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/list/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/timegrid/main.css")}}"> 
@endsection
@section("scripts")
  <script src="{{asset("assets/js/fullcalendar/core/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/daygrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/timegrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/list/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/interaction/main.js")}}" type="text/javascript"></script>
  <script>
    var url_="{{url('eventos')}}";
    var url_show="{{ url('eventos/show') }}";
  </script>
  <script src="{{asset("assets/pages/scripts/calendario/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    <div class="row" style="text-align: center" >
    <div class="col-lg-10">
        <div class="box" style="height: 640px; width:700px; margin-left: 125px; background-color: rgb(250, 250, 250)" >
        <h4 class="box-title"><b>Calendario de actividades</b></h4>
        <div class="box-header with-border box box-primary" id="calendar" style="width:50%; height: 50%">
        </div>
        </div>
    </div>
    </div>
@endsection

