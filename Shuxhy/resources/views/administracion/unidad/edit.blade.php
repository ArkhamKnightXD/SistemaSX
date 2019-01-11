@extends ('layouts.admin')
@section ('contenido')
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Editar Unidad: {{ $unidad->NombreUnidad}}</h3>
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

                  {!!Form::model($unidad,['method'=>'PATCH','route'=>['administracion.unidad.update',$unidad->IdUnidad],'files'=>'true'])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="NombreUnidad">NombreUnidad</label>
                  <input type="text" name="NombreUnidad" class="form-control" value="{{$unidad->NombreUnidad}}" placeholder="NombreUnidad...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Abreviatura">Abreviatura</label>
                  <input type="text" name="Abreviatura" class="form-control" value="{{$unidad->Abreviatura}}" placeholder="Abreviatura...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('administracion/unidad')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>



                  {!!Form::close()!!}           
            
            
@endsection