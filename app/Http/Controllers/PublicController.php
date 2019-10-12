<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnggotaModel;
use App\BukuTamuModel;
use App\Activasi;
use Session;

class PublicController extends Controller
{
    public function svanggota(Request $r)
    {
      

       $cekactiv = Activasi::where('tanggal',date('Y-m-d'))->first();
       if(@count($cekactiv) > 0)
       {
          if($cekactiv->status == '1')
          {
            //dd($cekactiv);
            Session::flash('gagal','Buku Tamu Belum di Activekan Silahkan Hubungi Admin');
            return redirect('/');
          }
          else
          {
             $r->validate([
                'no_induk' => 'required|max:50',
                'bp' => 'required|max:3',
                'nama' => 'required|max:100',
                'status' => 'required|max:50',
            ]);
            $cek = AnggotaModel::where('no_induk',$r->no_induk)->first();
            if(@count($cek) > 0)
            {
               Session::flash('gagal','Anda Telah Terdaftar');
               return redirect('/');
            }
            else{
              $input = $r->all();
              $save = AnggotaModel::create($input);


              $noinduk = $r->no_induk;
              $nama = $r->nama;
              $bp = $r->bp;
              $status = $r->status;
              Session::flash('sukses','Terimakasi Telah Registrasi');
              return view('home.section.bukutamu', compact('noinduk','nama','status','bp'));
            }
          }
       }
       else
       {
          Session::flash('gagal','Buku Tamu Belum di Activekan Silahkan Hubungi Admin');
          return back();
       }

    }

    public function ckanggota(Request $r)
    {
        $cekactiv = Activasi::where('tanggal',date('Y-m-d'))->first();
       if(@count($cekactiv) > 0)
       {
          if($cekactiv->status == '1')
          {
            //dd($cekactiv);
            Session::flash('gagal','Buku Tamu Belum di Activekan Silahkan Hubungi Admin');
            return redirect('/');
          }
          else
          {
             $cek = AnggotaModel::where('no_induk',$r->cek)->orWhere('nama', $r->cek)->first();

             if(@count($cek) > 0)
             {
               $noinduk = $cek->no_induk;
               $nama = $cek->nama;
               $bp = $cek->bp;
               $status = $cek->status;
               return view('home.section.bukutamu', compact('noinduk','nama','status','bp'));
             }
             else {
               Session::flash('gagal','gagal');
               return redirect('/notiv');
             }
          }
       }
       else
       {
          Session::flash('gagal','Buku Tamu Belum di Activekan Silahkan Hubungi Admin');
          return back();
       }
       

    }
    public function svbukutamu(Request $r)
    {
       $cekactiv = Activasi::where('tanggal',date('Y-m-d'))->first();
       if(@count($cekactiv) > 0)
       {
          if($cekactiv->status == '1')
          {
            //dd($cekactiv);
            Session::flash('gagal','Buku Tamu Belum di Activekan Silahkan Hubungi Admin');
            return redirect('/');
          }
          else
          {
             if($r->kegiatan == 'Membaca')
             {
                $input =  new BukuTamuModel();
                $input->no_induk = $r->noinduk;
                $input->kegiatan = $r->kegiatan;
                $input->bp = $r->bp;
                $input->tgl = date('Y-m-d');
                $input->namakegiatan = $r->namakegiatan;
                $input->save();
                Session::flash('sukses','Terimakasi Telah melakukan Pengisisan Buku Tamu Ruang Baca Pendidikan Informatika!');
                return redirect('/');
             }
             else{
               $input =  new BukuTamuModel();
               $input->no_induk = $r->noinduk;
               $input->kegiatan = $r->kegiatan;
                $input->bp = $r->bp;
                $input->tgl = date('Y-m-d');
               $input->namakegiatan = $r->kegiatan;
               $input->save();
               Session::flash('sukses','Terimakasi Telah melakukan Pengisisan Buku Tamu Ruang Baca Pendidikan Informatika!');
               return redirect('/');
             }
          }
       }
       else
       {
          Session::flash('gagal','Buku Tamu Belum di Activekan Silahkan Hubungi Admin');
          return back();
       }
        
    }
}
