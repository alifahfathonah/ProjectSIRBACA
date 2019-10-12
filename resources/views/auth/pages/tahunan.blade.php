@extends('auth.template')
@section('mainhome')
<div class="container-fluid">
	<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Kegiatan</h3>
                <ul class="panel-controls" style="margin-top: 2px;">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                    <ul class="dropdown-menu">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                    </ul>                                        
                </li>                                        
            </ul>    
            </div>

            <div class="panel-body">
              <div class="row">
              
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Kegiatan</th>
                    <th>Jumlah</th>
                   
                  </tr>
                </thead>
                <tbody>

                
                @php($no= 1)
                 <div class="row">
                        
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Column</h3>
                                </div>
                                <div class="panel-body">                                    
                                    <div id="charts-column" class="rickshaw_graph"></div>
                                </div>
                            </div>                                                        
                        </div>
                        
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Legend</h3>
                                </div>
                                <div class="panel-body">                                    
                                    <div id="charts-legend"></div>
                                    <div class="chart-legend">
                                        <div id="legend"></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        
                    </div>      
                </tbody>
              </table>
            </div>
        </div>
      
    </div>


  
  </div>
  </div>
</div>

@endsection