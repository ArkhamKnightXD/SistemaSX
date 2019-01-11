@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Compra</h3>
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

			{!!Form::open(array('url'=>'almacen/compra','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                   <label for="Suplidor">Suplidor</label>
                  <select name="IdSuplidor" class="form-control selectpicker" id="IdSuplidor" data-live-search="true">
                        @foreach ($suplidores as $suplidor)
                        <option value="{{$suplidor->IdSuplidor}}">{{$suplidor->suplidor}}</option>
                        @endforeach
                  </select>
            </div>
       </div>        

                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control" placeholder="Comentario...">
            </div> 
                  </div>


                 

</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label>Material</label>
                                          <select name="pidmaterial" class="form-control selectpicker" id="pidmaterial" data-live-search="true">
                                                @foreach ($materiales as $material)
                                                <option value="{{$material->IdMaterial}}">{{$material->material}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>


                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="Precio">Precio</label>
                                          <input type="number" name="pprecio" id="pprecio" class="form-control" placeholder="Precio RD$">
                                          
                                    </div>

                              </div>

                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="Cantidad">Cantidad</label>
                                          <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                                          
                                    </div>

                              </div>

                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                                          
                                    </div>

                              </div>

                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                                <th>Opciones</th>
                                                <th>Material</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">RD$/. 0.00</h4> <input type="hidden" name="Total" id="Total"></th>
                                                
                                          </tfoot>

                                          <tbody>
                                                
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                        
            <div class="form-group">
                  <input  name="_token" value="{{ csrf_token() }}"  type="hidden"></input>
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/compra')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>


            


			{!!Form::close()!!}	

                  @push ('scripts')	
                  <script>
                        $(document).ready(function(){ // funciona correctamente
                              $('#bt_add').click(function(){

                                    agregar();
                              });

                        });

                        var cont=0;
                        total=0;
                        subtotal=[];
                        $("#guardar").hide();
                        $("#pidmaterial").change(mostrarValores);


                        function mostrarValores()
                        {
                              datosMaterial=document.getElementById('pidmaterial').value.split('_');
                        }


                        
                        function agregar(argument) // funciona correctamente
                        {
                             datosMaterial=document.getElementById('pidmaterial').value.split('_');
                              

                              IdMaterial=datosMaterial[0];
                              Material=$("#pidmaterial option:selected").text();
                              Cantidad=$("#pcantidad").val();
                              Precio=$("#pprecio").val();

                             if (Cantidad!="" && Cantidad>0 && Precio!="" && Precio>0) 
                              {
                                    subtotal[cont]=(Cantidad*Precio); 
                                    

                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdMaterial[]" value="'+IdMaterial+'">'+Material+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="Precio[]" value="'+Precio+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("RD$/. " +total);
                                    $("#Total").val(total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }


                               
                              else
                              {
                                    alert$("Error al ingresar el detalle de la compra, revise los datos del material");
                              }

                        }
                        

                        function limpiar() //lista sin problemas
                        {
                              $("#pcantidad").val("");
                              $("#Total").val(total);
                        }

                        function evaluar() // funciona correctamente
                        {
                              if (total>0) 
                              {
                                     $("#guardar").show();
                              }
                               else
                              {
                                     $("#guardar").hide();
                              }
                        }

                        function eliminar(index) //funciona correctamente
                        {
                               total=total-subtotal[index];
                              $("#total").html("RD$/. " +total);
                              $("#Total").val(total);
                              $("#fila" + index).remove();
                              evaluar(); 

                        }
                    
                      
                  </script>
                  @endpush
            
	
@endsection