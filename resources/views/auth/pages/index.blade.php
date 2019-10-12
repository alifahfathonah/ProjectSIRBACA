@extends('auth.template')
@section('mainhome')
<!-- <canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script> -->

    <div class="row">
      <div class="col-md-3">
             <div class="widget widget-primary widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-group"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">{{ @count($anggota)}}</div>
                    <div class="widget-title">Jumlah  </div>
                    <div class="widget-subtitle">Anggota</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                </div>                            
            </div>
        </div>
    

     <div class="col-md-3">

    <div class="widget widget-success widget-item-icon">
        <div class="widget-item-left">
            <span class="fa fa-user"></span>
        </div>
        <div class="widget-data">
            <div class="widget-int num-count">{{ @count($phari)}}</div>
            <div class="widget-title">Pengunjung</div>
            <div class="widget-subtitle">Hari Ini</div>
        </div>
        <div class="widget-controls">                                
            <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
        </div>                            
    </div>

</div>
 <div class="col-md-3">

    <div class="widget widget-warning widget-item-icon">
        <div class="widget-item-left">
            <span class="fa fa-user"></span>
        </div>
        <div class="widget-data">
            <div class="widget-int num-count">{{ @count($pbulan)}}</div>
            <div class="widget-title">Pengunjung</div>
            <div class="widget-subtitle">Bulan Ini</div>
        </div>
        <div class="widget-controls">                                
            <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
        </div>                            
    </div>

</div>
 <div class="col-md-3">

    <div class="widget widget-info widget-item-icon">
        <div class="widget-item-left">
            <span class="fa fa-user"></span>
        </div>
        <div class="widget-data">
            <div class="widget-int num-count">{{ @count($ptahun)}}</div>
            <div class="widget-title">Pengunjung </div>
            <div class="widget-subtitle">Tahun Ini</div>
        </div>
        <div class="widget-controls">                                
            <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
        </div>                            
    </div>

</div>

<div class="col-md-9">

    <div class="panel panel-danger">
        <div class="panel-body panel-body-pricing">


            @php($cek = DB::table('activasis')->orderBy('id','desc')->first())

            @if($cek->tanggal == date('Y-m-d'))
                @if($cek->status == '0')
                <form action="{{ url('/home/activitas/'.$cek->id) }}" method="post">
                    @csrf @method('put')
                    <input type="hidden" name="status" value="1">
                    <h2>Status <small>Sekarang adalah :</small></h2>  
                      
                      </div>
                        <div class="panel-footer"> 
                            <input type="submit" class="btn btn-warning btn-block" value="Active">
                     </div>
                </form>
                @else
                <form action="{{ url('/home/activitas/'.$cek->id) }}" method="post">
                    @csrf @method('put')
                    <input type="hidden" name="status" value="0">
                    <h2>Status <small>Sekarang adalah :</small></h2>  
                      
                      </div>
                        <div class="panel-footer"> 
                            <input type="submit" class="btn btn-danger btn-block" value="Non Active">
                     </div>
                   
                </form>
                @endif
             @else
                  <form action="{{ url('/home/activitas') }}" method="post">
                    @csrf 
                    <h2>Status <small>Sekarang adalah :</small></h2>  
                      
                      </div>
                        <div class="panel-footer"> 
                            <input type="submit" class="btn btn-danger btn-block" value="Non Active">
                     </div>
                </form>
             @endif
        
    </div>

</div>   
 <div class="col-md-3">

        <div class="widget widget-danger widget-padding-sm">
            <div class="widget-big-int plugin-clock">00:00</div>                            
            <div class="widget-subtitle plugin-date">Loading...</div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
            </div>                            
            <div class="widget-buttons widget-c3">
                <div class="col">
                    <a href="#"><span class="fa fa-clock-o"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-bell"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-calendar"></span></a>
                </div>
            </div>                            
        </div>                        

    </div>
</div>


</div>
@endsection