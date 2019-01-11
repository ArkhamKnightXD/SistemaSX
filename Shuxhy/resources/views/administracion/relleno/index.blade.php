@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Rellenos <a href="relleno/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('administracion.relleno.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Abreviatura</th>
					<th>Opciones</th>
				</thead>
               @foreach ($rellenos as $rell)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $rell->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $rell->Abreviatura}}</td>		<!-- de coincidir con el orden de arriba  -->
										
					<td>
						<a href="{{URL::action('RellenoController@edit',$rell->IdRelleno)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$rell->IdRelleno}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>
					</td>
				</tr>
				@include('administracion.relleno.modal')
				@endforeach
			</table>
		</div>
		{{$rellenos->render()}}
	</div>
</div>

@endsection