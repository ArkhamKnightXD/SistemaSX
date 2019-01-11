@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Compras <a href="compra/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('almacen.compra.search')
	</div>
</div>
 <div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Suplidor</th>
					<th>Comentario</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>
               @foreach($compras as $com)
				<tr>  <!-- Aqui se establecen los datos  -->	<!-- que se mostraran estos deben  -->
					
					<td>{{ $com->Fecha}}</td>
					<td>{{ $com->Compania}}</td>
					<td>{{ $com->Comentario}}</td>
					<td>{{ $com->Total}}</td>
					<td>
						<a href="{{URL::action('CompraController@show',$com->IdCompra)}}"><i class="fa fa-eye" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$com->IdCompra}}" data-toggle="modal"><i class="fa fa-minus" style="font-size:20px; color:red"></i></a>
					</td>
				</tr>
				@include('almacen.compra.modal')
				@endforeach
			</table>
		</div>
		{{$compras->render()}}
	</div>
</div>

@endsection