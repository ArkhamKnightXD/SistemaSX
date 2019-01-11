@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Suplidores <a href="suplidor/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('almacen.suplidor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>				
					<th>Compania</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Persona de Contacto</th>
					<th>Comentario</th>
					<th>Opciones</th>
				</thead>
               @foreach ($suplidores as $sup)
				<tr>
					   <!-- Aqui se establecen los datos  -->
					<td>{{ $sup->Compania}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $sup->Direccion}}</td>
					<td>{{ $sup->Telefono}}</td>
					<td>{{ $sup->NombreContacto}}</td>		<!-- de coincidir con el orden de arriba  -->
					<td>{{ $sup->Comentario}}</td>
					<td>
						<a href="{{URL::action('SuplidorController@edit',$sup->IdSuplidor)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$sup->IdSuplidor}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>
					</td>
				</tr>
				@include('almacen.suplidor.modal')
				@endforeach
			</table>
		</div>
		{{$suplidores->render()}}
	</div>
</div>

@endsection