@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Formas <a href="forma/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('administracion.forma.search')
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
               @foreach ($formas as $forma)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $forma->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $forma->Abreviatura}}</td>		<!-- de coincidir con el orden de arriba  -->
										
					<td>
						<a href="{{URL::action('FormaController@edit',$forma->IdForma)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$forma->IdForma}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>
					</td>
				</tr>
				@include('administracion.forma.modal')
				@endforeach
			</table>
		</div>
		{{$formas->render()}}
	</div>
</div>

@endsection