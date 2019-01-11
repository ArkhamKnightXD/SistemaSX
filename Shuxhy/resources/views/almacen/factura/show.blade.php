@extends ('layouts.admin')
@section ('contenido')
	

		
            <div class="row">

                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
                       <div class="form-group">
                   <label for="Fecha">Fecha</label>
                   <p>{{$factura->Fecha}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="FormaPago">Forma de Pago</label>
                  <p>{{$factura->FormaPago}}</p>
            </div>

                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="TotalFacturado">Total</label>
                  <p>{{$factura->TotalFacturado}}</p>
            </div>  

                  </div>


                   

</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                               
                                        
                                                <th>Pedido</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                               
                                                <th></th>
                                                <th><h4 id="total">{{$factura->TotalFacturado}}</h4></th>
                                                
                                          </tfoot>

                                          <tbody>
                                                @foreach ($DetalleFactura as $det)
                                                <tr>
                                                    <td>{{$det->pedido}}</td>
                                                    <td>{{$det->PrecioPed}}</td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>






            


            
            
	
@endsection