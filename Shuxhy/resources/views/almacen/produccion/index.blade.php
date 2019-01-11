@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de producciones <a href="produccion/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('almacen.produccion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Descripcion del producto</th>
					<th>Estatus</th>
					<th>Cantidad a producir</th>
					<th>Cantidad producida</th>
					<th>Cantidad que falta</th>
					<th>Comentario</th>
					<th>Opciones</th>
				</thead>
               @foreach ($producciones as $produc)
				<tr> 
					<td>{{ $produc->Fecha}}</td>
					<td>{{ $produc->Descripcion}}</td>
					<td>{{ $produc->Estatus}}</td>
				 <!-- Aqui se establecen los datos  -->
					<td>{{ $produc->CantidadProducir}}</td>		<!-- que se mostraran estos deben  -->
					<th>{{ $produc->CantidadProducida}}</th>			<!-- de coincidir con el orden de arriba  -->
					<td>{{ $produc->CantidadFaltante}}</td>
					<td>{{ $produc->Comentario}}</td>		
			
					


					<td>
						<a href="{{URL::action('ProduccionController@edit',$produc->IdProduccion)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
					</td>
				</tr>
				@include('almacen.produccion.modal')
				@endforeach
			</table>
		</div>
		{{$producciones->render()}}
	</div>
</div>

@endsection