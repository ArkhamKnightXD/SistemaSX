@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de inventarios </h3>
		@include('almacen.inventario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Cantidad del producto</th>
					<th>Cantidad del material</th>
					<th>Opciones</th>
				</thead>
               @foreach ($inventarios as $produc)
				<tr> 
					<td>{{ $produc->Nombre}}</td>
					<td>{{ $produc->Descripcion}}</td>
				 <!-- Aqui se establecen los datos  -->
					<td>{{ $produc->CantidadProducto}}</td>		<!-- que se mostraran estos deben  -->
					<th>{{ $produc->CantidadMaterial}}</th>			<!-- de coincidir con el orden de arriba  -->		
			
					


					<td>
						<a href="{{URL::action('InventarioController@edit',$produc->IdInventario)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$produc->IdInventario}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>
					</td>
				</tr>
				@include('almacen.inventario.modal')
				@endforeach
			</table>
		</div>
		{{$inventarios->render()}}
	</div>
</div>

@endsection