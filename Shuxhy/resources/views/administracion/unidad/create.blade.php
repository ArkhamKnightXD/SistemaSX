@extends ('layouts.admin')
@section ('contenido')
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Nueva Unidad de Medida</h3>
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

                  {!!Form::open(array('url'=>'administracion/unidad','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="NombreUnidad">Nombre</label>
                  <input type="text" name="NombreUnidad" class="form-control" placeholder="Nombre...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Abreviatura">Abreviatura</label>
                  <input type="text" name="Abreviatura" class="form-control"  placeholder="Abreviatura...">
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