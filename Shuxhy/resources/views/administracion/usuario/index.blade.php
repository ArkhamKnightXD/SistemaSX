@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="usuario/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('administracion.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombre</th>
					<th>Correo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $usu)
				<tr>
					   <!-- Aqui se establecen los datos  -->
					<td>{{ $usu->name}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $usu->email}}</td>		<!-- de coincidir con el orden de arriba  -->
					
					<td>
												
						
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>

                     </td>
				</tr>
				@include('administracion.usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection