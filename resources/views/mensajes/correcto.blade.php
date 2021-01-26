
<script>
$('.alert alert-block alert-success alert-dismissible').each(function (index, element) {
    const $element = $(element),
        timeout = $element.data('auto-dismiss') || 3000;
    setTimeout(function () {
        $element.alert('close');
    }, timeout);
});
</script>
{{-- @if(session ("mensaje"))
	<div class="alert alert-success alert-dismissible" data-auto-dismiss="3000">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<h4><i class="icon fa fa-check"></i> Bien Hecho </h4>
		<ul>
				<li>{{session("mensaje")}}</li>
		</ul>
	</div>
@endif --}}
@if(session ("mensaje"))
    <div class="alert alert-block alert-success alert-dismissible" data-auto-dismiss="1000">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <i class="ace-icon fa fa-check green"></i>
        {{session("mensaje")}}
    </div>
@endif
