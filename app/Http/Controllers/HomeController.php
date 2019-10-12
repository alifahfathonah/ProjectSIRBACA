<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activasi;
use App\BukuTamuModel;
use App\AnggotaModel;
use App\User;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phari = BukuTamuModel::where('tgl','LIKE','%'.date('Y-m-d').'%')->get();
        $pbulan = BukuTamuModel::where('tgl','LIKE','%'.date('Y-m').'%')->get();
        $ptahun = BukuTamuModel::where('tgl','LIKE','%'.date('Y').'%')->get();
        $anggota = AnggotaModel::all();
        return view('auth.pages.index',compact('phari','pbulan','ptahun','anggota'));
    }

    public function pencarianbktamu(Request $r)
    {
         $tampil = BukuTamuModel::where('tgl','LIKE', '%'.date('Y-m-d').'%')
         ->orderBy('created_at','ASC')
         ->get();

         if(@$r->btncari)
         {
             $tampil = BukuTamuModel::where('tgl','LIKE', '%'.$r->tahun.'-'.$r->bulan.'-'.$r->hari.'%')
             ->orderBy('id','asc')
             ->get();
         }
        return view('auth.pages.bukutamu',compact('tampil'));
    }

    public function cekanggota()
    {
        $tampil = AnggotaModel::orderBy('no_induk', 'desc')->get();
        return view('auth.pages.cekanggota', compact('tampil'));
    }

    public function upanggota(Request $r, $id)
    {
          $up = AnggotaModel::find($id);
          $up->no_induk = $r->no_induk;
          $up->nama = $r->nama;
          $up->bp = $r->bp;
          $up->status = $r->status;
          $up->update();

            if($up)
            {
                Session::flash('sukses','Data Berhasil di Update!');
            }
            else
            {
                Session::flash('error','Data Gagal di Update!');
            }
          return back();
    }

    public function dlanggota( $id)
    {
          $dl = AnggotaModel::find($id);
          $dl->delete();

          if($dl)
          {
            Session::flash('sukses','Data Berhasil di Hapus!');
          }
          else
          {
            Session::flash('error','Data Gagal di Hapus!');
          }
          return back();
    }

    public function tahunan()
    {
        return view('auth.pages.tahunan');
    }
    public function harian(Request $r)
    {

        // $tampil = BukuTamuModel::GroupBy('tgl')->select('tgl',DB::raw('YEAR(tgl) as ce'), DB::raw('count(*) as total'))->where('tgl','LIKE', '%'.date('Y-m-d').'%')->orderBy('ce','desc')->get();
        $kondisi = "";
        $status = '';

         $tampil = BukuTamuModel::GroupBy('kegiatan')
         ->select('kegiatan',DB::raw('count(*) as total'))
         ->where('tgl','LIKE', '%'.date('Y-m-d').'%')
         ->orderBy('total','desc')
         ->get();


         $tampilke = BukuTamuModel::GroupBy('namakegiatan')
         ->select('namakegiatan',DB::raw('count(*) as total'))
         ->where('tgl','LIKE', '%'.date('Y-m-d').'%')
         ->orderBy('total','desc')
         ->get();


        $tampilpeng =  BukuTamuModel::GroupBy('bp')
        ->select('bp',DB::raw('count(*) as total'))
        ->where('tgl','LIKE', '%'.date('Y-m-d').'%')
        ->orderBy('total','desc')
        ->get();


        $tampilpengno =  BukuTamuModel::GroupBy('no_induk')
        ->select('no_induk',DB::raw('count(*) as total'))
        ->where('tgl','LIKE', '%'.date('Y-m-d').'%')
        ->orderBy('total','desc')
        ->get();

        if(@$r->btnke)
        {
            $tampil = BukuTamuModel::GroupBy('kegiatan')
            ->select('kegiatan',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
            ->orderBy('total','desc')
            ->get();
            
           
        }
        elseif(@$r->btnketer)
        {
            $tampilke = BukuTamuModel::GroupBy('namakegiatan')
            ->select('namakegiatan',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
            ->orderBy('total','desc')
            ->get();
        }
         elseif(@$r->btnbp)
        {
            $tampilpeng =  BukuTamuModel::GroupBy('bp')
            ->select('bp',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
            ->orderBy('total','desc')
            ->get();
        }
         elseif(@$r->btnnoinduk)
        {
           $tampilpengno =  BukuTamuModel::GroupBy('no_induk')
           ->select('no_induk',DB::raw('count(*) as total'))
           ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
           ->orderBy('total','desc')
           ->get();
        }

        //cetak


        elseif(@$r->btncetakke)
        {
            $tampil = BukuTamuModel::GroupBy('kegiatan')
            ->select('kegiatan',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
            ->orderBy('total','desc')
            ->get();
             $kondisi = 'kegiatan';
             $status = 'Kegiatan';
             return view('auth.pages.cetak',compact('tampil','kondisi','status'));
           
        }
        elseif(@$r->btncetakketer)
        {
            $tampil = BukuTamuModel::GroupBy('namakegiatan')
            ->select('namakegiatan',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
            ->orderBy('total','desc')
            ->get();
             $kondisi = 'namakegiatan';
             $status = 'Kegiatan Terperinci';
             return view('auth.pages.cetak',compact('tampil','kondisi','status'));
        }
         elseif(@$r->btncetakbp)
        {
            $tampil =  BukuTamuModel::GroupBy('bp')
            ->select('bp',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
            ->orderBy('total','desc')
            ->get();
             $kondisi = 'bp';
             $status = 'Pengunjung Berdasarkan Bp';
             return view('auth.pages.cetak',compact('tampil','kondisi','status'));
        }
         elseif(@$r->btncetaknoinduk)
        {
           $tampil =  BukuTamuModel::GroupBy('no_induk')
           ->select('no_induk',DB::raw('count(*) as total'))
           ->where('tgl','LIKE', '%'.$r->tahun."-".$r->bulan."-".$r->hari.'%')
           ->orderBy('total','desc')
           ->get();
             $kondisi = 'no_induk';
             $status = 'Pengunjung Berdasarkan No Induk';
             return view('auth.pages.cetak',compact('tampil','kondisi','status'));
        }

        //dd($tampil);

        return view('auth.pages.harian',compact('tampil','tampilpeng','tampilke','tampilpengno'));
    }

    public function bulanan(Request $r)
    {
         $tampilke = BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),kegiatan'))
         ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, kegiatan'))
         ->orderBy('tahun','desc')
         ->where('tgl', 'LIKE', '%'.date('Y-m').'%')
         ->get();

          $tampilketer = BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),namakegiatan'))
         ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, namakegiatan'))
         ->orderBy('total','desc')
         ->where('tgl', 'LIKE', '%'.date('Y-m').'%')
         ->get();

         $tampilpeng =  BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),bp'))
         ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, bp'))
         ->orderBy('tahun','desc')
         ->where('tgl', 'LIKE', '%'.date('Y-m').'%')
         ->get();


         if(@$r->btnke)
         {
             $tampilke = BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),kegiatan'))
             ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, kegiatan'))
             ->orderBy('tahun','desc')
             ->where('tgl', 'LIKE', '%'.$r->tahun."-".$r->bulan.'%')
             ->get();
         }
         elseif(@$r->btnketer)
         {
             $tampilketer = BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),namakegiatan'))
             ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, namakegiatan'))
             ->orderBy('total','desc')
             ->where('tgl', 'LIKE', '%'.$r->tahun."-".$r->bulan.'%')
             ->get();
         }
         elseif(@$r->btnbp)
         {
             $tampilpeng =  BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),bp'))
             ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, bp'))
             ->orderBy('tahun','desc')
             ->where('tgl', 'LIKE', '%'.$r->tahun."-".$r->bulan.'%')
             ->get();
            
         }

//cetak
         elseif(@$r->btncetakke)
         {
             $tampil = BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),kegiatan'))
             ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, kegiatan'))
             ->orderBy('tahun','desc')
             ->where('tgl', 'LIKE', '%'.$r->tahun."-".$r->bulan.'%')
             ->get();
             $kondisi = 'kegiatan';
             $status = 'Kegiatan';
             return view('auth.pages.cetakbulan',compact('tampil','kondisi','status'));
         }
         elseif(@$r->btncetakketer)
         {
             $tampil = BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),namakegiatan'))
             ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, namakegiatan'))
             ->orderBy('total','desc')
             ->where('tgl', 'LIKE', '%'.$r->tahun."-".$r->bulan.'%')
             ->get();
             $kondisi = 'namakegiatan';
             $status = 'Kegiatan Terperinci';
             return view('auth.pages.cetakbulan',compact('tampil','kondisi','status'));
         }
         elseif(@$r->btncetakbp)
         {
             $tampil =  BukuTamuModel::GroupBy(DB::raw('YEAR(tgl),MONTH(tgl),bp'))
             ->select(DB::raw('YEAR(tgl) as tahun,MONTH(tgl) as bulan,count(*) as total, bp'))
             ->orderBy('tahun','desc')
             ->where('tgl', 'LIKE', '%'.$r->tahun."-".$r->bulan.'%')
             ->get();
             $kondisi = 'bp';
             $status = 'Pengunjung Berdasarkan Bp';
             return view('auth.pages.cetakbulan',compact('tampil','kondisi','status'));
         }
            
        

        return view('auth.pages.bulanan',compact('tampilke','tampilketer','tampilpeng','carikegiatan'));
    }

    public function svactivasi(Request $r)
    {
        $input = new Activasi();
        $input->tanggal = date('Y-m-d');
        $input->jumlah = 0;
        $input->status = 0;
        $input->save();

        if($input)
        {
            Session::flash('sukses','Activasi Berhasil');
        }
        else
        {
            Session::flash('error','Activasi Gagal');
        }
        return back();
    } 

    public function upactivasi(Request $r,$id)
    {
        $input = Activasi::find($id);
        $input->status = $r->status;
        $input->update();

        if($input)
        {
            Session::flash('sukses','Activasi Berhasil di Rubah');
        }
        else
        {
            Session::flash('error','Activasi Gagal');
        }
        return back();
    } 

    public function cetak()
    {
        $url = $_SERVER['REQUEST_URI'];
        $kondisi = "";
        $status = '';
        if($url == '/home/cetak/laporan/kegiatan/harian')
        {
             $tampil = BukuTamuModel::GroupBy('kegiatan')
             ->select('kegiatan',DB::raw('count(*) as total'))
             ->where('created_at','LIKE', '%'.date('Y-m-d').'%')
             ->orderBy('total','desc')
             ->get();
             $kondisi = 'kegiatan';
             $status = 'Kegiatan';
        }
        elseif($url == '/home/cetak/laporan/kegiatanterperinci/harian')
        {
             $tampil = BukuTamuModel::GroupBy('namakegiatan')
             ->select('namakegiatan',DB::raw('count(*) as total'))
             ->where('tgl','LIKE', '%'.date('Y-m-d').'%')
             ->orderBy('total','desc')
             ->get();
             $kondisi = 'namakegiatan';
             $status = 'Kegiatan Terperinci';
        }
        elseif($url == '/home/cetak/laporan/pengunjungnoinduk/harian')
        {
            $tampil =  BukuTamuModel::GroupBy('no_induk')
            ->select('no_induk',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.date('Y-m-d').'%')
            ->orderBy('total','desc')
            ->get();
             $kondisi = 'no_induk';
             $status = 'Pengunjung Berdasarkan No Induk';

        }
        elseif($url == '/home/cetak/laporan/pengunjungbp/harian')
        {
          
            $tampil =  BukuTamuModel::GroupBy('bp')
            ->select('bp',DB::raw('count(*) as total'))
            ->where('tgl','LIKE', '%'.date('Y-m-d').'%')
            ->orderBy('total','desc')
            ->get();
             $kondisi = 'bp';
             $status = 'Pengunjung Berdasarkan Bp';
        }
        else{
            abort(404);
        }

        return view('auth.pages.cetak',compact('tampil','kondisi','status'));
    }

    public function getuser()
    {
        return view('auth.pages.edituser');
    }

     public function upuser(Request $r, $id)
    {
        $up = User::find($id);
        $up->name = $r->name;
        $up->email = $r->email;

        if($r->password == "")
        {
            $up->password = $up->password;
        }
        else
        {
            $up->password =  bcrypt($r->password) ;
        }
        $up->update();
        if($up)
        {
            Session::flash('sukses','Data Berhasil  Di Update!');
        }
        else
        {
            Session::flash('gagal','Data Gagal Di Update!');
        }
        


        return back();
    }
}
