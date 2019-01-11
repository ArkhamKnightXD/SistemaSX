@extends ('layouts.admin')
@section ('contenido')
	

		
            <div class="row">

                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                   <label for="NombreReceta">Nombre</label>
                   <p>{{$receta->Nombre}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
                       <div class="form-group">
                   <label for="Descripcion">Descripcion</label>
                   <p>{{$receta->Descripcion}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="Porcion">Porcion</label>
                  <p>{{$receta->Porcion}}</p>
            </div>

                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="TiempoPreparacion">Tiempo Preparacion</label>
                  <p>{{$receta->TiempoPreparacion}}</p>
            </div>  

                  </div>


                   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoManoDeObra">Costo Mano De Obra</label>
                  <p>{{$receta->CostoManoDeObra}}</p>
            </div>  

                  </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoIndirecto">Costo Indirecto</label>
                  <p>{{$receta->CostoIndirecto}}</p>
            </div>  

                  </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoDeReposicion">Costo de Reposicion</label>
                  <p>{{$receta->CostoDeReposicion}}</p>
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
                                                <th>Cantidad</th>
                                                <th>Unidad</th>
                                                <th>Precio de material</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                               
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">{{$receta->Total}}</h4></th>
                                                
                                          </tfoot>

                                          <tbody>
                                                @foreach ($DetalleReceta as $det)
                                                <tr>
                                                    <td>{{$det->material}}</td>
                                                    <td>{{$det->Cantidad}}</td>
                                                    <td>{{$det->NombreUnidad}}</td>
                                                    <td>{{$det->CostoMaterial}}</td>  
                                                    <td>{{$det->Cantidad*$det->CostoMaterial}}</td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>






            


            
            
	
@endsection