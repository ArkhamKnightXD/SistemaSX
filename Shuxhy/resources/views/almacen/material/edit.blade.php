@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Materiales: {{ $material->Nombre}}</h3>
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

			{!!Form::model($material,['method'=>'PATCH','route'=>['almacen.material.update',$material->IdMaterial],'files'=>'true'])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" value="{{$material->Nombre}}" placeholder="Nombre...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" value="{{$material->Descripcion}}" placeholder="Descripción...">
            </div> 
                  </div>


                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Unidad</label>
                  <select name="IdUnidad" class="form-control selectpicker" id="IdUnidad" data-live-search="true">
                        @foreach ($unidad as $uni)
                        @if($uni->IdUnidad==$material->IdUnidad)
                        <option value="{{$uni->IdUnidad}}" selected>{{$uni->Abreviatura}}</option>
                        @else
                        <option value="{{$uni->IdUnidad}}">{{$uni->Abreviatura}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>
       </div>        



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Imagen">Imagen</label>
                  <input type="file" name="Imagen" class="form-control">
                  @if (($material->Imagen)!="")
                  <img src="{{asset('imagenes/materiales/'.$material->Imagen)}}" height="250px" width="400px">
                  @endif
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/material')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>



			{!!Form::close()!!}		
            
		
@endsection