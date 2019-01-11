@extends ('layouts.admin')
@section ('contenido')
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Nuevo Pedido</h3>
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

                  {!!Form::open(array('url'=>'almacen/pedido','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                   <label for="Cliente">Cliente</label>
                  <select name="IdCliente" class="form-control selectpicker" id="IdCliente" data-live-search="true">
                        @foreach ($clientes as $cliente)
                        <option value="{{$cliente->IdCliente}}">{{$cliente->cliente}}</option>
                        @endforeach
                  </select>
            </div>
       </div>        

                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                   <label>Estado del pedido</label>
                  <select name="Estatus" class="form-control selectpicker" id="IdEstatus" data-live-search="true">
                        <option>Sin Entregar</option>
                        <option>Entregado</option>
                  </select>
            </div>
                  </div>



                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control" placeholder="Comentario...">
            </div> 
                  </div>



                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                  <label for="DireccionEntrega">Direccion de entrega</label>
                  <input type="text" name="DireccionEntrega" class="form-control"  placeholder="Direccion de entrega...">
            </div>

                  </div>



                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                  <label for="FechaEntrega">Fecha de Entrega</label>
                  <input type="date" name="FechaEntrega" class="form-control" placeholder="Fecha de entrega...">
            </div>  

                  </div>




</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label>Producto</label>
                                          <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                                                @foreach ($productos as $producto)
                                                <option value="{{$producto->IdProducto}}_{{$producto->Precio}}">{{$producto->producto}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>


                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="PrecioProducto">Precio del producto</label>
                                          <input type="number" disabled name="pprecioproducto" id="pprecioproducto" class="form-control" placeholder="Precio del producto RD$">
                                          
                                    </div>

                              </div>

                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="Cantidad">Cantidad del producto</label>
                                          <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                                          
                                    </div>

                              </div>

                               <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label>Combo</label>
                                          <select name="pidcombo" class="form-control selectpicker" id="pidcombo" data-live-search="true">
                                                @foreach ($combos as $combo)
                                                <option value="{{$combo->IdCombo}}_{{$combo->Total}}">{{$combo->combo}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>


                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="PrecioCombo">Precio del combo</label>
                                          <input type="number" disabled name="ppreciocombo" id="ppreciocombo" class="form-control" placeholder="Precio del combo RD$">
                                          
                                    </div>

                              </div>

                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="CantidadCombo">Cantidad del combo</label>
                                          <input type="number" name="pcantidadcombo" id="pcantidadcombo" class="form-control" placeholder="Cantidad">
                                          
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
                                                <th>Cantidad de productos</th>
                                                <th>Precio del producto</th>
                                                <th>Combo</th>
                                                <th>Cantidad de combos</th>
                                                <th>Precio del combo</th>
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
                                                <th><h4 id="total">RD$/ . 00</h4><input type="hidden" name="Total" id="Total"></th>
                                                
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
                  <button class="btn btn-danger"><a href="{{url('almacen/pedido')}}">Cancelar</a></button>
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
                         $("#pidcombo").change(mostrarValores2);

                         function mostrarValores() 
                         {
                              datosProductos=document.getElementById('pidproducto').value.split('_');
                               $("#pprecioproducto").val(datosProductos[1]);
                         }


                         function mostrarValores2() 
                         {
                              datosCombos=document.getElementById('pidcombo').value.split('_');
                               $("#ppreciocombo").val(datosCombos[1]);
                         }


                        function agregar(argument) // funciona correctamente
                        {

                              datosProductos=document.getElementById('pidproducto').value.split('_');
                              datosCombos=document.getElementById('pidcombo').value.split('_');
                               

                              IdProducto=datosProductos[0];
                              IdCombo=datosCombos[0];
                              Producto=$("#pidproducto option:selected").text();
                              Combo=$("#pidcombo option:selected").text();
                              Cantidad=$("#pcantidad").val();
                              PrecioProducto=$("#pprecioproducto").val();
                              PrecioCombo=$("#ppreciocombo").val();
                              CantidadCombo=$("#pcantidadcombo").val();

                              if (Cantidad!="" && Cantidad>0 && CantidadCombo!="" && CantidadCombo>0 &&  PrecioProducto!="" && IdCombo!="" && PrecioCombo>0 && PrecioCombo!="" && PrecioProducto>0 ) 
                              {
                                    subtotal[cont]=(Cantidad*parseInt(PrecioProducto)+ CantidadCombo*parseInt(PrecioCombo)); // error aqui no suma solo pega los 2 valores
                                    

                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="PrecioProducto[]" value="'+PrecioProducto+'"></td><td><input type="hidden" name="IdCombo[]" value="'+IdCombo+'">'+Combo+'</td><td><input type="number" name="CantidadCombo[]" value="'+CantidadCombo+'"></td><td><input type="number" name="PrecioCombo[]" value="'+PrecioCombo+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("RD$/. " +total);
                                    $("#Total").val(total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }


                               if ( PrecioCombo>0 && PrecioCombo!=""  && PrecioProducto==0 && IdProducto!="" && CantidadCombo!="" && CantidadCombo>0 && Cantidad=="") 
                              {
                                    subtotal[cont]=(CantidadCombo*parseInt(PrecioCombo)); 

                                    total=total+subtotal[cont]; 

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="hidden" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="hidden" name="PrecioProducto[]" value="'+PrecioProducto+'"></td><td><input type="hidden" name="IdCombo[]" value="'+IdCombo+'">'+Combo+'</td><td><input type="number" name="CantidadCombo[]" value="'+CantidadCombo+'"></td><td><input type="number" name="PrecioCombo[]" value="'+PrecioCombo+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("RD$/. " +total);
                                    $("#Total").val(total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }

                              if (Cantidad!="" && PrecioProducto>0 && PrecioProducto!="" && CantidadCombo=="" && Cantidad>0) 
                              {
                                    subtotal[cont]=(Cantidad*parseInt(PrecioProducto)); 

                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="PrecioProducto[]" value="'+PrecioProducto+'"></td><td><input type="hidden" name="IdCombo[]" value="'+IdCombo+'">'+Combo+'</td><td><input type="hidden" name="CantidadCombo[]" value="'+CantidadCombo+'"></td><td><input type="hidden" name="PrecioCombo[]" value="'+PrecioCombo+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("RD$/. " +total);
                                    $("#Total").val(total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }

                              else
                              {
                                    alert$("Error al ingresar el detalle del pedido, revise los datos del producto");
                              }

                        }
                        

                        function limpiar() //lista sin problemas
                        {
                              $("#pcantidad").val("");
                              $("#pprecioproducto").val("");
                              $("#ppreciocombo").val("");
                              $("#pcantidadcombo").val("");
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