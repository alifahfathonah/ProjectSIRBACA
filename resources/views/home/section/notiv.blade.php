@extends('home.template')
@section('contain')
<div class="center-screen">
  <br>
<div class="center-search">

  <div style="width:60%;margin:0px auto;">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  @if(Session::has('gagal'))
  <div class="alert alert-danger">
    <h3 > Maaf  Anda Belom Terdaftar Silahkan Isi data Berikut </h3>
  </div>
  @endif
    <form class="" action="{{ url('/pendaftarantamu')}}" method="post">
      @csrf
    <p>
      
      <input type="text" onkeypress="return hanyaAngka(event)" name="no_induk" class="form-control form-control-lg" placeholder="inputkan No Induk anda!" maxlength="15">
    </p>
     <p>
      
      <input type="text" onkeypress="return hanyaAngka(event)" name="bp" class="form-control form-control-lg" placeholder="inputkan Bp Anda" maxlength="2">
    </p>
    <p>
      
      <input type="text" name="nama" class="form-control form-control-lg" placeholder="inputkan Nama anda!">
    </p>

    <p>
     
      <select class="form-control" name="status">
        <option value="mahasiswa">Mahasiswa</option>
        <option value="dosen">Dosen</option>
      </select>
    </p>
    <p>
      <input type="submit"  value="Register" class="btn btn-primary btn-lg">
    </p>
    </form>
  </div>
</div>
</div>
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>
@endsection
