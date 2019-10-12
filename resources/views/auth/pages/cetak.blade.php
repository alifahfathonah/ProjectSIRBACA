<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<style>
		.tab, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
</style>
<body>
<div style="overflow:hidden;">
	<img src="{{asset('/img/logo.png')}}" alt="" style="width:100px;height:75px;" align="left" >
 <div>
 	<h3 align="center">
 		SEKOLAH TINGGI KEGURUAN DAN ILMU PENDIDIKAN <BR>
 		(STKIP) PGRI SUMATERA BARAT
 	</h3>
 </div>
 
</div>
<br>
<div style="float:left">
 	Jl Gunung Pengilun Padang
 </div>
<div style="float:right">
	Telp (0751) 7053731. Fax (0751) 34311
</div>
 <br>
 <hr >
 <p align="center">{{ $status }}</p>
  <div>	
 </div> <br> 
<table border="1" style="width:100%" class="tab">
@if($kondisi == 'kegiatan')
<tr>
	<th align="center">No</th>
	<th align="center">Kegiatan</th>
	<th align="center">Jumlah</th>
</tr>
@php($no = 1)
@foreach($tampil as $t)
<tr>
	<td>{{$no++}}</td>
	<td>{{$t->kegiatan}}</td>
	<td>{{$t->total}}</td>
</tr>
@endforeach

@elseif($kondisi == 'namakegiatan')
<tr>
	<th align="center">No</th>
	<th align="center">Nama Kegiatan</th>
	<th align="center">Jumlah</th>
</tr>
@php($no = 1)
@foreach($tampil as $t)
<tr>
	<td>{{$no++}}</td>
	<td>{{$t->namakegiatan}}</td>
	<td>{{$t->total}}</td>
</tr>
@endforeach

@elseif($kondisi == 'bp')
<tr>
	<th align="center">No</th>
	<th align="center">bp</th>
	<th align="center">Jumlah</th>
</tr>
@php($no = 1)
@foreach($tampil as $t)
<tr>
	<td>{{$no++}}</td>
	<td>{{$t->bp}}</td>
	<td>{{$t->total}}</td>
</tr>
@endforeach

@elseif($kondisi == 'no_induk')
<tr>
	<th align="center">No</th>
	<th align="center">No Induk</th>
	<th align="center">Jumlah</th>
</tr>
@php($no = 1)
@foreach($tampil as $t)
<tr>
	<td>{{$no++}}</td>
	<td>{{$t->no_induk}}</td>
	<td>{{$t->total}}</td>
</tr>
@endforeach

@endif
</table>
<br>
 <script type="text/javascript">
 	window.print();
 </script>
</body>
</html>