@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Recetas: {{ $receta->Nombre}}</h3>
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

			{!!Form::model($receta,['method'=>'PATCH','route'=>['almacen.receta.update',$receta->IdReceta],'files'=>'true'])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" value="{{$receta->Nombre}}" placeholder="Nombre...">
            </div>
                  </div>



                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" value="{{$receta->Descripcion}}" placeholder="Descripción...">
            </div> 
                  </div>

                   

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Equipo">Equipo usados</label>
                  <input type="text" name="Equipo" class="form-control" value="{{$receta->Equipo}}" placeholder="Equipos usados...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Porcion">Porciones</label>
                  <input type="number" name="Porcion" class="form-control" value="{{$receta->Porcion}}" placeholder="Porcion...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="TiempoPreparacion">Tiempo de preparacion</label>
                  <input type="text" name="TiempoPreparacion" class="form-control" value="{{$receta->TiempoPreparacion}}" placeholder="Tiempo de preparacion...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoDeReposicion">Costo de reposicion</label>
                  <input type="text" name="CostoDeReposicion" class="form-control" value="{{$receta->CostoDeReposicion}}" placeholder="Costo de reposicion...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoIndirecto">Costo indirecto</label>
                  <input type="number" name="CostoIndirecto" class="form-control" value="{{$receta->CostoIndirecto}}" placeholder="Costo indirecto...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoManoDeObra">Costo de mano de obra</label>
                  <input type="number" name="CostoManoDeObra" class="form-control" value="{{$receta->CostoManoDeObra}}" placeholder="Costo de mano de obra...">
            </div>

                  </div>


                   


                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/receta')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>



			{!!Form::close()!!}		
            
		
@endsection