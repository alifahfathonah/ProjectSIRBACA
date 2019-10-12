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
                <form action="{{url('home/laporan/bulanan')}}" method="get">
                  @csrf
                  <div class="col-md-5">
                    <select class="form-control" name="bulan">
                      <option value="{{date('m')}}">{{date('m')}}</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <select class="form-control" name="tahun">
                      @for($i = 2019; $i <= date('Y'); $i++)
                      <option value="{{ $i}}">{{ $i}}</option>
                      @endfor
                    </select>
                  </div>
                <div class="col-md-2"><input type="submit" class="btn btn-info" name="btnke" value="Cari"> <input type="submit" class="btn btn-info" name="btncetakke" value="print"></div>
                </form>
              </div> <br>
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
                @foreach($tampilke as $kc)
                  <tr>
                    <td>{{$no++}}</td>
                   
                    <td>{{ $kc->bulan}} / {{ $kc->tahun}}</td>
                    <td>{{ $kc->kegiatan}}</td>
                    <td>{{ $kc->total}}</td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      
    </div>
        <div class="col-md-6">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Kegiatan Terperinci</h3>
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
                <form action="{{url('home/laporan/bulanan')}}" method="get">
                  @csrf
                  <div class="col-md-4">
                    <select class="form-control" name="bulan">
                      <option value="{{date('m')}}">{{date('m')}}</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="tahun">
                      @for($i = 2019; $i <= date('Y'); $i++)
                      <option value="{{ $i}}">{{ $i}}</option>
                      @endfor
                    </select>
                  </div>
                <div class="col-md-4"><input type="submit" class="btn btn-info" name="btnketer" value="Cari">  <input type="submit" class="btn btn-info" name="btncetakketer" value="print"></div>
                </form>
              </div> <br>
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
                @foreach($tampilketer as $kter)
                  <tr>
                    <td>{{$no++}}</td>
                   
                    <td>{{ $kter->bulan}} / {{ $kter->tahun}}</td>
                    <td>{{ $kter->namakegiatan}}</td>
                    <td>{{ $kter->total}}</td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      
    </div>
    <div class="col-md-6">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Pengunjung Berdasarkan BP</h3>
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
                <form action="{{url('home/laporan/bulanan')}}" method="get">
                  @csrf
                  <div class="col-md-4">
                    <select class="form-control" name="bulan">
                      <option value="{{date('m')}}">{{date('m')}}</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="tahun">
                      @for($i = 2019; $i <= date('Y'); $i++)
                      <option value="{{ $i}}">{{ $i}}</option>
                      @endfor
                    </select>
                  </div>
                <div class="col-md-4"><input type="submit" class="btn btn-info" name="btnbp" value="Cari"> <input type="submit" class="btn btn-info" name="btncetakbp" value="print"></div>
                </form>
              </div> <br>
                 <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bp</th>
                      <th>Jumlah</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  @php($no= 1)
                  @foreach($tampilpeng as $ta)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{ $ta->bp}}</td>
                      <td>{{ $ta->total}}</td>
                     
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
      <h2></h2>
      
    </div>

  
  </div>
  </div>
</div>

@endsection