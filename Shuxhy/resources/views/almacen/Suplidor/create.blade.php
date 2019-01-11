@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Suplidor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'almacen/suplidor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
             <div class="form-group">
                  <label for="Compania">Compania</label>
                  <input type="text" name="Compania" class="form-control" placeholder="Compania...">
            </div>


            <div class="form-group">
                  <label for="Direccion">Direccion</label>
                  <input type="text" name="Direccion" class="form-control" placeholder="Direccion...">
            </div>


            <div class="form-group">
                  <label for="Telefono">Telefono</label>
                  <input type="number" name="Telefono" class="form-control" placeholder="Telefono...">
            </div>

            <div class="form-group">
                  <label for="NombreContacto">Persona de Contacto</label>
                  <input type="text" name="NombreContacto" class="form-control" placeholder="Persona de Contacto...">
            </div>

            <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control" placeholder="Comentario...">
            </div>


            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger"><a href="{{url('almacen/suplidor')}}">Cancelar</a></button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection