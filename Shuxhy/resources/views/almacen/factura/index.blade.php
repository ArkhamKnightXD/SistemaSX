@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Facturas <a href="factura/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('almacen.factura.search')
	</div>
</div>
 <div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Forma de Pago</th>
					<th>Total Facturado</th>
					<th>Opciones</th>
				</thead>
               @foreach($facturas as $fact)
				<tr>  <!-- Aqui se establecen los datos  -->	<!-- que se mostraran estos deben  -->
					
					<td>{{ $fact->Fecha}}</td>
					<td>{{ $fact->FormaPago}}</td>
					<td>{{ $fact->TotalFacturado}}</td>
					<td>
						<a href="{{URL::action('FacturaController@show',$fact->IdFactura)}}"><i class="fa fa-eye" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$fact->IdFactura}}" data-toggle="modal"><i class="fa fa-minus" style="font-size:20px; color:red"></i></a>
					</td>
				</tr>
				@include('almacen.factura.modal')
				@endforeach
			</table>
		</div>
		{{$facturas->render()}}
	</div>
</div>

@endsection