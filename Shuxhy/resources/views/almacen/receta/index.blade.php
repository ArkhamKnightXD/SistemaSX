@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de recetas <a href="receta/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('almacen.receta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre de la receta</th>
					<th>Descripción</th>
					<th>Equipos utilizados</th>
					<th>Tiempo de preparacion</th>
					<th>Porcion</th>
					<th>CostoDeReposicion</th>
					<th>CostoIndirecto</th>
					<th>CostoManoDeObra</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>
               @foreach ($recetas as $rece)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $rece->Nombre}}</td>		<!-- que se mostraran estos deben  -->
							<!-- de coincidir con el orden de arriba  -->
					<td>{{ $rece->Descripcion}}</td>
					<td>{{ $rece->Equipo}}</td>
					<td>{{ $rece->TiempoPreparacion}}</td>
					<td>{{ $rece->Porcion}}</td>
					<td>{{ $rece->CostoDeReposicion}}</td>
					<td>{{ $rece->CostoIndirecto}}</td>
					<td>{{ $rece->CostoManoDeObra}}</td>
					<td>{{ $rece->Total}}</td>
					
					<td>
						<a href="{{URL::action('RecetaController@show',$rece->IdReceta)}}"><i class="fa fa-eye" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$rece->IdReceta}}" data-toggle="modal"><i class="fa fa-remove" style="font-size:20px; color:red"></i></a>

					</td>
				</tr>
				@include('almacen.receta.modal')
				@endforeach
			</table>
		</div>
		{{$recetas->render()}}
	</div>
</div>

@endsection