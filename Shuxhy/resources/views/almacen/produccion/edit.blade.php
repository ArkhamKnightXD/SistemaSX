@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Actualizar Produccion: {{ $produccion->Estatus}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

            </div>
      </div>

			{!!Form::model($produccion,['method'=>'PATCH','route'=>['almacen.produccion.update',$produccion->IdProduccion]])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Estado de la produccion</label>
                  <select name="Estatus" class="form-control selectpicker" id="Estatus" data-live-search="true" value="{{$produccion->Estatus}}">
                        <option>En Proceso</option>
                        <option>Listo</option>
                  </select>
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="CantidadProducida">Cantidad producida</label>
                  <input type="text" name="CantidadProducida" class="form-control" value="{{$produccion->CantidadProducida}}" placeholder="Cantidad producida...">
            </div> 
                  </div>




                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/produccion')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>



			{!!Form::close()!!}


            
		
@endsection