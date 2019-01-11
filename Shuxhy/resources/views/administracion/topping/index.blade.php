@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Toppings <a href="topping/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('administracion.topping.search')
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
               @foreach ($toppings as $top)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $top->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $top->Abreviatura}}</td>		<!-- de coincidir con el orden de arriba  -->
										
					<td>
						<a href="{{URL::action('ToppingController@edit',$top->IdTopping)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$top->IdTopping}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>
					</td>
				</tr>
				@include('administracion.topping.modal')
				@endforeach
			</table>
		</div>
		{{$toppings->render()}}
	</div>
</div>

@endsection