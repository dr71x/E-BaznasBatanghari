<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donasi;
use App\Models\KritikSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('main.login');
    }

    public function register()
    {
        return view('main.register');
    }

    public function ProsesRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:repasssword',
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->level = 'user';
        $data->save();

        return redirect('/login')->with('success', 'Register Berhasil silahkan Login');
    }

    public function ProsesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $name = Auth::user()->name;
            return redirect()->intended('dashboard')->with('success', "Selamat Datang $name");
        } else {
            return back()->with([
                'errorse' => 'Silahkan Cek Kembali Email Dan Password Anda',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        if (\Auth::user()->level == "admin") {
            $data['zakat'] = Donasi::where('status','success')->sum('amount');
            $data['success'] = Donasi::where('status','success')->count();
            $data['pending'] = Donasi::where('status','pending')->count();
            $data['expired'] = Donasi::where('status','expired')->count();
            $bulan = Donasi::where('status','success')->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m-Y');
            });
            $data['total'] = Donasi::select(DB::raw("CAST(SUM(amount) as int) as total"),DB::raw('extract(month from "created_at") as month'))->where('status','success')->where('kategoriid','1')->groupBy('month')->pluck('total');
            $data['total1'] = Donasi::select(DB::raw("CAST(SUM(amount) as int) as total"),DB::raw('extract(month from "created_at") as month'))->where('status','success')->where('kategoriid','2')->groupBy('month')->pluck('total');
            $data['total2'] = Donasi::select(DB::raw("CAST(SUM(amount) as int) as total"),DB::raw('extract(month from "created_at") as month'))->where('status','success')->where('kategoriid','3')->groupBy('month')->pluck('total');
            $kategori = [];
            foreach ($bulan as $item) {
                $kategori[] = Carbon::parse($item[0]->created_at)->format('M');
            }
            $data['bulan'] = $kategori;
            return view('dashboard',$data);
        } else {
            return view('dashboarduser');
        }
        
    }

    public function faq()
    {
        return view('zakat.faq');
    }

    public function KritikSaran(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'tentang' => 'required',
            'pesan' => 'required',
        ]);

        $data = new kritiksaran();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->tentang = $request->tentang;
        $data->pesan = $request->pesan;
        $data->save();

        return back()->with('success', 'Kritik dan Saran Terkirim');
    }
}
