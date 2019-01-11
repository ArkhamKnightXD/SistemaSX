@extends ('layouts.admin')
@section ('contenido')
	

		
            <div class="row">

                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                   <label for="Fecha">Fecha</label>
                   <p>{{$produccion->Fecha}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
                       <div class="form-group">
                   <label for="Estatus">Estatus</label>
                   <p>{{$receta->Descripcion}}</p>
            
            </div>
                  </div>





                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <p>{{$producccion->Comentario}}</p>
            </div>  

                  </div>

</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                               
                                                <th>Receta</th>
                                                <th>Cantidad a Producir</th>
                                                <th>Cantidad Producida</th>
                                                <th>Cantidad Faltante</th>

                                          </thead>


                                          <tbody>
                                                @foreach ($DetalleProduccion as $det)
                                                <tr>
                                                    <td>{{$det->receta}}</td>
                                                    <td>{{$det->CantidadProducir}}</td>
                                                    <td>{{$det->CantidadProducida}}</td>
                                                    <td>{{$det->CantidadFaltante}}</td>  
                                                    
                                                </tr>
                                                @endforeach
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>






            


            
            
	
@endsection