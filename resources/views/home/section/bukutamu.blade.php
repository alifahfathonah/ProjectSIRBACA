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
    @if(Session::has('sukses'))
    <div class="alert alert-info">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h3 > Terimakasi Telah melakukan Pendaftaran Member Ruang Baca Pendidikan Informatika!</h3>
    </div>
    @endif



    <form class="" action="{{ url('/savebukutamu')}}" method="post" id="form1" name="form1" >
      @csrf
    <p>
      
      <label for="" class="form-control">{{ $noinduk}}</label>
    </p>
    <p>
      
      <label for="" class="form-control">{{ $nama}}</label>
    </p>

    <p>
     
        <label for="" class="form-control">{{ $status}}</label>
    </p>
    <input type="hidden" name="noinduk" value="{{ $noinduk}}">
    <input type="hidden" name="bp" value="{{ $bp }}">
    <p>
      <label for="" style="color:red;">kegiatan</label>
      <select class="form-control" name="kegiatan" id="select1"
onchange="tampilkan()">
        <option value="0">==pilih==</option>
        <option value="Membaca">Membaca</option>
        <option value="Memanfaatkan Internet">Memanfaatkan Internet</option>
        <option value="Mengunjungi website perpustakaan">Mengunjungi website perpustakaan</option>
      </select>
    </p>
    <p id="data"></p>
    <p>
      <input type="submit"  value="submit" class="btn btn-primary btn-lg">
    </p>
    </form>
  </div>
</div>
</div>
<script>
function tampilkan(){

  var nama_data=document.getElementById("form1").select1.value;
  var p_kontainer=document.getElementById("data");

    if (nama_data=="Membaca")
    {
        p_kontainer.innerHTML="<p>Nama Kegiatan</p><select name='namakegiatan' class='form-control'><option value='skripsi'>Skripsi</option><option value='Buku'>Buku</option><option value='Tesis'>Tesis</option><option value='Bahan Ajar'>Bahan Ajar</option><option value='Jurnal'>Jurnal</option><option value='Disertasi'>Disertasi</option><option value='Prosiding'>Prosiding</option><option value='koran/majalah'>koran/majalah</option><option value='laporan'>laporan</option></select>";
    }
    else{
      p_kontainer.innerHTML="";
   }
}
</script>
@endsection
