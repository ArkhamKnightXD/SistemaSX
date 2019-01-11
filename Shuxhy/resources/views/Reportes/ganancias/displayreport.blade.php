@extends ('layouts.admin')
@section ('contenido')
	

			{!!Form::open(array('url'=>'reportes/ganancias','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


<div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Reporte de Ganancias de</h3>
      </div>
</div>
            <div class="row">


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
      
       </div>        

                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
       
                  </div>


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">

                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">

                  <div class="form-group">
                  <label for="Desde">Desde</label>
                  <input type="date" name="Desde" class="form-control" placeholder="Desde...">
                   </div>  

                   <div class="form-group">
                  <label for="Hasta">Hasta</label>
                  <input type="date" name="Hasta" class="form-control" placeholder="Hasta...">
                  </div>  


                  </div>


</div>

<div class="row">

                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <button type="submit" id="bt_add" class="btn btn-primary" type="submit">Generar</button>
                                          
                                    </div>

                              </div>

                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

  
                                    </div>

                              </div>
                              
                        </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="generar">

                  </div>

            </div>

@endsection