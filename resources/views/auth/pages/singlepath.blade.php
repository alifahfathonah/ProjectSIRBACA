@extends('auth.template')
@section('mainhome')
<div class="container-fluid">
	 <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>No Induk</th>
        <th>Jumlah</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @php($no= 1)
    @foreach($tampil as $t)
      <tr>
        <td>{{$no++}}</td>
        <td>{{ date('d-m-Y',strtotime($t->tanggal))}}</td>
        <td>{{$t->jumlah}}</td>
        <td>
        	<a href="{{url('/home/lihat/laporan/harian/'.$t->tanggal)}}" class="btn btn-default">Lihat</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection