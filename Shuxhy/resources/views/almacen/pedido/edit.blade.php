@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar pedido: {{ $pedido->Estatus}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($pedido,['method'=>'PATCH','route'=>['almacen.pedido.update',$pedido->IdPedido]])!!}
            {{Form::token()}}
           <div class="form-group">
                   <label>Estado del pedido</label>
                  <select name="Estatus" class="form-control selectpicker" id="IdEstatus" data-live-search="true">
                        <option>Sin Entregar</option>
                        <option>Entregado</option>
                  </select>
            </div>


            <div class="form-group">
                  <label for="FechaEntrega">Fecha de entrega</label>
                  <input type="text" name="FechaEntrega" class="form-control" value="{{$pedido->FechaEntrega}}" placeholder="Fecha de entrega...">
            </div>
                  </div>

            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger"><a href="{{url('almacen/pedido')}}">Cancelar</a></button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection