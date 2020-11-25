@extends("theme.$theme.layout")
@section('titulo')
    wil
@endsection
@section('contenido')
<div class="page-header">
    <h1>
        Formulario
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
             Crear Rol
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nombre </label>
                <div class="col-sm-5">
                    <input type="text" id="form-field-1" placeholder="Username" class="form-control" />
                </div>
            </div>
            <div class="space-1"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Text Field </label>
                <div class="col-sm-5">
                    <input type="text" id="form-field-1" placeholder="Username" class="form-control" />
                </div>
            </div>
            <div class="form-group has-warning">
                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with warning</label>

                <div class="col-xs-12 col-sm-5">
                    <span class="block input-icon input-icon-right">
                        <input type="text" id="inputWarning" class="width-100" />
                        <i class="ace-icon fa fa-leaf"></i>
                    </span>
                </div>
                <div class="help-block col-xs-12 col-sm-reset inline"> Warning tip help! </div>
            </div>

            <div class="form-group has-error">
                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label no-padding-right">Input with error</label>

                <div class="col-xs-12 col-sm-5">
                    <span class="block input-icon input-icon-right">
                        <input type="text" id="inputError" class="width-100" />
                        <i class="ace-icon fa fa-times-circle"></i>
                    </span>
                </div>
                <div class="help-block col-xs-12 col-sm-reset inline"> Error tip help! </div>
            </div>

            <div class="form-group has-success">
                <label for="inputSuccess" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with success</label>

                <div class="col-xs-12 col-sm-5">
                    <span class="block input-icon input-icon-right">
                        <input type="text" id="inputSuccess" class="width-100" />
                        <i class="ace-icon fa fa-check-circle"></i>
                    </span>
                </div>
                <div class="help-block col-xs-12 col-sm-reset inline"> Success tip help! </div>
            </div>

            <div class="form-group has-info">
                <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with info</label>

                <div class="col-xs-12 col-sm-5">
                    <span class="block input-icon input-icon-right">
                        <input type="text" id="inputInfo" class="width-100" />
                        <i class="ace-icon fa fa-info-circle"></i>
                    </span>
                </div>
                <div class="help-block col-xs-12 col-sm-reset inline"> Info tip help! </div>
            </div>
        </form>
    </div>
</div>
@endsection