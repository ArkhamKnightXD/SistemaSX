@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
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

			{!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" placeholder="Nombre...">
            </div>
                  </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" placeholder="Descripción...">
            </div> 
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Precio">Precio</label>
                  <input type="number" name="Precio" class="form-control"  placeholder="Precio RD$...">
            </div>

                  </div>



                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
           <div class="form-group">
                   <label>Unidad</label>
                  <select name="IdUnidad" class="form-control selectpicker" id="IdUnidad" data-live-search="true">
                        @foreach ($unidades as $unid)
                        <option value="{{$unid->IdUnidad}}">{{$unid->NombreUnidad}}</option>
                        @endforeach
                  </select>
            </div>


                  </div>





                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Forma</label>
                  <select name="IdForma" class="form-control selectpicker" id="IdForma" data-live-search="true">
                        @foreach ($formas as $forma)
                        <option value="{{$forma->IdForma}}">{{$forma->Nombre}}</option>
                        @endforeach
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Relleno</label>
                  <select name="IdRelleno" class="form-control selectpicker" id="IdRelleno" data-live-search="true">
                        @foreach ($rellenos as $relleno)
                        <option value="{{$relleno->IdRelleno}}">{{$relleno->Nombre}}</option>
                        @endforeach
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Sabor</label>
                  <select name="IdSabor" class="form-control selectpicker" id="IdSabor" data-live-search="true">
                        @foreach ($sabores as $sabor)
                        <option value="{{$sabor->IdSabor}}">{{$sabor->Nombre}}</option>
                        @endforeach
                  </select>
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Topping</label>
                  <select name="IdTopping" class="form-control selectpicker" id="IdTopping" data-live-search="true">
                        @foreach ($toppings as $topping)
                        <option value="{{$topping->IdTopping}}">{{$topping->Nombre}}</option>
                        @endforeach
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Imagen">Imagen</label>
                  <input type="file" name="Imagen" class="form-control">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/producto')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>


            


			{!!Form::close()!!}		
            
	
@endsection