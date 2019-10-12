@extends('auth.template')
@section('mainhome')
<div class="container-fluid">
	<div class="row">
    <div class="col-md-12">
       <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Buku Tamu</h3>
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
              <div class="container-fluid">
                <div class="row">
                <form action="{{url('/home/pencarian/buku/tamu')}}" method="get">
                  @csrf
                  <div class="col-md-7"><h2 align="right">Pencarian</h2></div>
                   <div class="col-md-1">
                    <select class="form-control" name="hari">
                      <option value="{{date('d')}}">{{date('d')}}</option>
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
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="14">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                     
                    </select>
                  </div>
                  <div class="col-md-1">
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
                  <div class="col-md-2">
                    <select class="form-control" name="tahun">
                      @for($i = 2019; $i <= date('Y'); $i++)
                      <option value="{{ $i}}">{{ $i}}</option>
                      @endfor
                    </select>
                  </div>
                <div class="col-md-1"><input type="submit" class="btn btn-info" name="btncari" value="Cari"> </div>
                </form>
              </div> <br>
              </div>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Induk</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Kegiatan</th>
                    <th>Kegiatan detail</th>
                  </tr>
                </thead>
                <tbody>
                @php($no= 1)
                @foreach($tampil as $t)
               	 <tr>
                    <td>{{$no++}}</td>
                    <td>{{ $t->no_induk }}</td>
                    @php($c = DB::table('anggota_models')->where('no_induk',$t->no_induk)->get())
                    @foreach($c as $ck)
                    <td>{{ $ck->nama}}</td>
                    <td>{{$ck->status}}</td>
                    @endforeach
                    <td>{{ $t->kegiatan }}</td>
                    <td>{{ $t->namakegiatan }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      
    </div>

  </div>
</div>

@endsection