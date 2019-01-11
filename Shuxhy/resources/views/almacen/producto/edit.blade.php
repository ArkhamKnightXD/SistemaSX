@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Productos: {{ $producto->Nombre}}</h3>
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

			{!!Form::model($producto,['method'=>'PATCH','route'=>['almacen.producto.update',$producto->IdProducto],'files'=>'true'])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" value="{{$producto->Nombre}}" placeholder="Nombre...">
            </div>
                  </div>



                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" value="{{$producto->Descripcion}}" placeholder="Descripción...">
            </div> 
                  </div>

                   

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Precio">Precio</label>
                  <input type="number" name="Precio" class="form-control" value="{{$producto->Precio}}" placeholder="Precio RD$...">
            </div>

                  </div>

                   


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Unidad</label>
                  <select name="IdUnidad" class="form-control selectpicker" id="IdUnidad" data-live-search="true">
                        @foreach ($unidad as $uni)
                        @if($uni->IdUnidad==$producto->IdUnidad)
                        <option value="{{$uni->IdUnidad}}" selected>{{$uni->NombreUnidad}}</option>
                        @else
                        <option value="{{$uni->IdUnidad}}">{{$uni->NombreUnidad}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>


                  </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Forma</label>
                  <select name="IdForma" class="form-control selectpicker" id="IdForma" data-live-search="true">
                        @foreach ($forma as $form)
                        @if($form->IdForma==$producto->IdForma)
                        <option value="{{$form->IdForma}}" selected>{{$form->Nombre}}</option>
                        @else
                        <option value="{{$form->IdForma}}">{{$form->Nombre}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Relleno</label>
                  <select name="IdRelleno" class="form-control selectpicker" id="IdRelleno" data-live-search="true">
                        @foreach ($relleno as $rell)
                        @if($rell->IdRelleno==$producto->IdRelleno)
                        <option value="{{$rell->IdRelleno}}" selected>{{$rell->Nombre}}</option>
                        @else
                        <option value="{{$rell->IdRelleno}}">{{$rell->Nombre}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Sabor</label>
                  <select name="IdSabor" class="form-control selectpicker" id="IdSabor" data-live-search="true">
                        @foreach ($sabor as $sab)
                        @if($sab->IdSabor==$producto->IdSabor)
                        <option value="{{$sab->IdSabor}}" selected>{{$sab->Nombre}}</option>
                        @else
                        <option value="{{$sab->IdSabor}}">{{$sab->Nombre}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Topping</label>
                  <select name="IdTopping" class="form-control selectpicker" id="IdTopping" data-live-search="true">
                        @foreach ($topping as $top)
                        @if($top->IdTopping==$producto->IdTopping)
                        <option value="{{$top->IdTopping}}" selected>{{$top->Nombre}}</option>
                        @else
                        <option value="{{$top->IdTopping}}">{{$top->Nombre}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>


                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Imagen">Imagen</label>
                  <input type="file" name="Imagen" class="form-control">
                  @if (($producto->Imagen)!="")
                  <img src="{{asset('imagenes/productos/'.$producto->Imagen)}}" height="250px" width="400px">
                  @endif
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