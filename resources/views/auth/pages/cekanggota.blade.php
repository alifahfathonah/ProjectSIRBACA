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
                <li><a href="#" class="panel-fullscreen"><p class="fa fa-expand"></p></a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="fa fa-cog"></p></a>                                        
                    <ul class="dropdown-menu">
                        <li><a href="#" class="panel-collapse"><p class="fa fa-angle-down"></p> Collapse</a></li>
                        <li><a href="#" class="panel-remove"><p class="fa fa-times"></p> Remove</a></li>
                    </ul>                                        
                </li>                                        
            </ul>    
            </div>

            <div class="panel-body">
              <div class="container-fluid">
  					
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Default</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><p class="fa fa-angle-down"></p></a></li>
                                        <li><a href="#" class="panel-refresh"><p class="fa fa-refresh"></p></a></li>
                                        <li><a href="#" class="panel-remove"><p class="fa fa-times"></p></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>No Induk</th>
                                                <th>No Bp</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php($no = 1)
                                        @foreach($tampil as $t)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$t->no_induk}}</td>
                                                <td>{{$t->bp}}</td>
                                                <td>{{$t->nama}}</td>
                                                <td>{{$t->status}}</td>
                                                <td>
                                                	<button class="btn btn-info" data-toggle="modal" data-target="#myModalEdit{{$t->no_induk}}">Edit</button>
                                                </td>
                                                <td>
                                                	<button class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete{{$t->no_induk}}">Delete</button>
                                                </td>
                                            </tr>
                                            <!-- The Modal -->
											<div class="modal fade" id="myModalEdit{{$t->no_induk}}">
											  <div class="modal-dialog">
											    <div class="modal-content">

											      <!-- Modal Header -->
											      <div class="modal-header">
											        <h4 class="modal-title">Edit data {{$t->no_induk}}</h4>
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											      </div>

											      <!-- Modal body -->
											      <div class="modal-body">
											        <div style="width:60%;margin:0px auto;">
													    <form class="" action="{{ url('/home/update/anggota/'.$t->id)}}" method="post">
													      @csrf @method('put')
													    <p>
													      <p>No Induk :</p>
													      <input type="text" onkeypress="return hanyaAngka(event)" name="no_induk" class="form-control form-control-lg" value="{{ $t->no_induk}}" maxlength="15">
													    </p>
													     <p>
													      <p>Bp :</p>
													      <input type="text" onkeypress="return hanyaAngka(event)" name="bp" class="form-control form-control-lg" value="{{ $t->bp}}" maxlength="2">
													    </p>
													    <p>
													      <p>Nama :</p>
													      <input type="text" name="nama" class="form-control form-control-lg" value="{{ $t->nama}}">
													    </p>

													    <p>
													     <p>Status :</p>
													      <select class="form-control" name="status">
													      	<option value="{{ $t->status}}">{{ $t->status}}</option>
													        <option value="mahasiswa">Mahasiswa</option>
													        <option value="dosen">Dosen</option>
													      </select>
													    </p>
													    <p>
													      <input type="submit"  value="Update" class="btn btn-primary btn-lg">
													    </p>
													    </form>
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
											      

											      <!-- Modal footer -->
											      <div class="modal-footer">
											        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											      </div>
											      </div>
											    </div>
											  </div>
											</div>

											 <!-- The Modal Delete -->
											<div class="modal fade" id="myModalDelete{{$t->no_induk}}">
											  <div class="modal-dialog">
											    <div class="modal-content">

											      <!-- Modal Header -->
											      <div class="modal-header">
											        <h4 class="modal-title">Delete data {{$t->no_induk}}</h4>
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											      </div>

											      <!-- Modal body -->
											      <div class="modal-body">
											       <center>
											       	<h2>Apakah Anda Yakin Ingin Menhapus data dengan No Induk {{$t->no_induk}} ini ? </h2>
											       <p>
											       	<form method="post" action="{{ url('/home/delete/anggota/'.$t->id)}}"> @csrf @method('delete')
											       		<input type="submit" value="Delete" class="btn btn-warning">
											       		<input type="button" value="Cancel!" class="btn btn-danger" data-dismiss="modal">
											       	</form>
											       </p>
											       </center>
											      </div>

											      <!-- Modal footer -->
											      <div class="modal-footer">
											        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											      </div>

											    </div>
											  </div>
											</div>
                           				@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
            </div>
        </div>
      
    </div>  
  </div>
  </div>
</div>

@endsection