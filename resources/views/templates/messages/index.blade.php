@if(Session::has('message'))
	<div class="alert alert-success container-fluid">
		<div class="row">
            <div class="container">
                <p class="col-xs-12"><i class="fa fa-check" aria-hidden="true"></i>{!!Session::get('message')!!}<i class="fa fa-times" aria-hidden="true"></i></p>
            </div>
        </div>
	</div>
@endif
@if(Session::has('error'))
	<div class="alert alert-danger container-fluid">
		<div class="row">
            <div class="container">
                <p class="col-xs-12"><i class="fa fa-info" aria-hidden="true"></i>{!!Session::get('error')!!}<i class="fa fa-times" aria-hidden="true"></i></p>
            </div>
        </div>
	</div>
@endif
@if ($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger container-fluid">
			<div class="row">
                <div class="container">
                    <p class="col-xs-12"><i class="fa fa-info" aria-hidden="true"></i>{!! $error !!}<i class="fa fa-times" aria-hidden="true"></i></p>
                </div>
            </div>
		</div>
	@endforeach
@endif

<script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").slideUp(500);
        }, 3000);
    });
</script>