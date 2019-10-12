@extends('home.template')
@section('contain')
<br><br>
<div class="center-screen">
  <br>
 @include('pesan')
<form class="" action="{{ url('/savetamu')}}" method="post">
  @csrf
<div class="input-group mb-3 input-group-lg center-search">
  <div class="input-group-prepend ">
    <span class="input-group-text "><i class="fa fa-search"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="Silahkan Masukan NPM | NIDN | NAMA Anda!" name="cek">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit">Go</button>
  </div>
</div>
</form>
<br>
</div>

<br><br>
@endsection
