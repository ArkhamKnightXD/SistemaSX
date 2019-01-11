@extends ('layouts.admin')
@section ('contenido')
	

		
            <div class="row">

                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
                       <div class="form-group">
                   <label for="Fecha">Fecha</label>
                   <p>{{$compra->Fecha}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="Suplidor">Suplidor</label>
                  <p>{{$compra->Compania}}</p>
            </div>

                  </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <p>{{$compra->Comentario}}</p>
            </div>

                  </div>

                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="Total">Total</label>
                  <p>{{$compra->Total}}</p>
            </div>  

                  </div>


                   

</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                               
                                                <th>Material</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                               
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">{{$compra->Total}}</h4></th>
                                                
                                          </tfoot>

                                          <tbody>
                                                @foreach ($DetalleCompra as $det)
                                                <tr>
                                                    <td>{{$det->material}}</td>
                                                    <td>{{$det->Precio}}</td>
                                                    <td>{{$det->Cantidad}}</td>
                                                    <td>{{$det->Cantidad*$det->Precio}}</td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>






            


            
            
	
@endsection