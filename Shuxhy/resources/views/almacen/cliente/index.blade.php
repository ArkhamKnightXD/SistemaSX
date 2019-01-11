@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('almacen.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Comentario</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Usuario de Instagram</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $clien)
				<tr>
					   <!-- Aqui se establecen los datos  -->
					<td>{{ $clien->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $clien->Apellido}}</td>		<!-- de coincidir con el orden de arriba  -->
					<td>{{ $clien->Comentario}}</td>
					<td>{{ $clien->Direccion}}</td>
					<td>{{ $clien->Telefono}}</td>
					<td>{{ $clien->UsuarioIG}}</td>
					<td>
						<a href="{{URL::action('ClienteController@edit',$clien->IdCliente)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$clien->IdCliente}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>
					</td>
				</tr>
				@include('almacen.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection