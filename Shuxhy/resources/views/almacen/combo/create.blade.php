@extends ('layouts.admin')
@section ('contenido')
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Nuevo Combo</h3>
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

                  {!!Form::open(array('url'=>'almacen/combo','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

      <div class="row">


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
             <div class="form-group">
                  <label for="Nombre">Nombre del combo</label>
                  <input type="text" name="Nombre" class="form-control" placeholder="Nombre del combo...">
            </div> 
       </div>        

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
           <div class="form-group">
                  <label for="Descripcion">Descripcion</label>
                  <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion...">
            </div> 
       </div>        


      <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        
                              <div class="form-group">
                                  <label for="Descuento">Descuento</label>
                                  <input type="text" name="Descuento" class="form-control" placeholder="Descuento%">
                            </div> 
                       </div>        


       
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Imagen">Imagen</label>
                  <input type="file" name="Imagen" class="form-control">
            </div>
                  </div>




</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label>Producto</label>
                                          <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                                                @foreach ($productos as $producto)
                                                <option value="{{$producto->IdProducto}}_{{$producto->Precio}}">{{$producto->producto}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>

                               <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label for="Precio">Precio</label>
                                          <input type="number" disabled name="pprecio" id="pprecio" class="form-control" placeholder="Precio RD$">
                                          
                                    </div>

                              </div>

                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

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
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Subtotal</th>
                                                

                                          </thead>

                                          <tfoot>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">S/ . 00</h4><input type="hidden" name="Total" id="Total"></th>
                                                
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
                  <button class="btn btn-danger"><a href="{{url('almacen/combo')}}">Cancelar</a></button>
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

                         $("#pidproducto").change(mostrarValores);

                         function mostrarValores() 
                         {
                              datosProductos=document.getElementById('pidproducto').value.split('_');
                               $("#pprecio").val(datosProductos[1]);
                         }


                        function agregar(argument) // funciona correctamente
                        {

                              datosProductos=document.getElementById('pidproducto').value.split('_');
                              IdProducto=datosProductos[0];
                              Producto=$("#pidproducto option:selected").text();
                              Precio=$("#pprecio").val();
                              Cantidad=$("#pcantidad").val();
                              

                              if (IdProducto!="" && Precio!="" && Precio>0 && Cantidad!="" && Cantidad>0) 
                              {
                                    subtotal[cont]=(Cantidad*Precio);
                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="number" name="Precio[]" value="'+Precio+'"></td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("S/. " +total);
                                    $("#Subtotal").val(subtotal[cont]);
                                    $("#Total").val(total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }

                              else
                              {
                                    alert$("Error al ingresar el detalle del combo, revise los datos del combo");
                              }

                        }

                        Total=Subtotal;
                        

                        function limpiar() //lista sin problemas
                        {
                              $("#pcantidad").val("");
                              $("#pprecio").val("");
                              $("#pdescuento").val("");
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
                              $("#total").html("S/. " +total);
                              $("#Total").val(total);
                              $("#fila" + index).remove();
                              evaluar(); 

                        }
                    
                      
                  </script>
                  @endpush
            
      
@endsection