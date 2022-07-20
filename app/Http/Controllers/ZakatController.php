<?php

namespace App\Http\Controllers;

use App\Models\tipe;
use App\Models\bulan;
use App\Models\berita;
use App\Models\detail;
use App\Models\Donasi;
use App\Models\sebutan;
use App\Models\kategori;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\kritiksaran;
use App\Models\pengeluaran;
use Illuminate\Support\Str;
use App\Models\tentangzakat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ZakatController extends Controller
{

    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }
    public function index()
    {
        $data['sebutan'] = sebutan::get();
        $data['kategori'] = kategori::get();
        return view('zakat.index', $data);
    }

    public function permintaan(Request $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::where('id',$request->userid)->first();

            $donation = Donasi::create([
                'transaction_id' => Str::uuid(),
                'donor_name' => $user->name,
                'userid' => $request->userid,
                'donor_email' => $user->email,
                'donation_type' => $request->donation_type,
                'phone' => $request->phone,
                'kategoriid' => $request->kategoriid,
                'namaTujuan' => $request->namaTujuan,
                'tujuan' => $request->tujuan,
                'amount' => floatval($request->amount),
            ]);

            $payload = [
                'transaction_details' => [
                    'order_id'      => $donation->transaction_id,
                    'gross_amount'  => $donation->amount,
                ],
                'customer_details' => [
                    'first_name'    => $donation->donor_name,
                    'email'         => $donation->donor_email,
                    'phone'         => $donation->phone,
                ],
                'item_details' => [
                    [
                        'id'       => $donation->donation_type,
                        'price'    => $donation->amount,
                        'quantity' => 1,
                        'name'     => $donation->donation_type,
                    ]
                ]
            ];
            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $donation->snap_token = $snapToken;
            $donation->save();
            $this->response['snap_token'] = $snapToken;
        });
        return response()->json($this->response);
    }

    public function detail($id)
    {
        $data['detail'] = detail::where('kategori_id', $id)->where('zis','1')->get();
        return view('zakat.detail', $data);
    }

    public function notification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        DB::transaction(function () use ($notif) {

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;
            $donation = Donasi::where('transaction_id', $orderId)->first();

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $donation->setStatusPending();
                    } else {
                        $donation->setStatusSuccess();
                    }
                }
            } elseif ($transaction == 'settlement') {
                $donation->setStatusSuccess();
            } elseif ($transaction == 'pending') {
                $donation->setStatusPending();
            } elseif ($transaction == 'deny') {
                $donation->setStatusFailed();
            } elseif ($transaction == 'expire') {
                $donation->setStatusExpired();
            } elseif ($transaction == 'cancel') {
                $donation->setStatusFailed();
            }
        });
        return;
    }

    public function Donasi()
    {
        $data['tipe'] = detail::where('zis','1')->where('kategori_id','1')->get();
        return view('zakat.donasi',$data);
    }

    public function DetailDonasi(Request $request){
        $data['donasi'] = Donasi::orderBy('created_at', 'desc')->where('kategoriid','=','1')->where('donation_type',$request->tipe)->get();
        return view('zakat.tabel_donasi', $data);
    }

    public function DonasiInfak(){
        return view('zakat.infak');
    }

    public function TabelDonasiInfak()
    {
        $data['donasi'] = Donasi::orderBy('created_at', 'desc')->where('kategoriid','=','2')->get();
        return view('zakat.tabel_donasi', $data);
    }
    public function TabelDonasi()
    {
        $data['donasi'] = Donasi::orderBy('created_at', 'desc')->where('kategoriid','=','1')->get();
        return view('zakat.tabel_donasi', $data);
    }

    public function DonasiSedekah()
    {
        return view('zakat.sedekah');
    }

    public function TabelDonasiSedekah(){
        $data['donasi'] = Donasi::orderBy('created_at', 'desc')->where('kategoriid','=','3')->get();
        return view('zakat.tabel_donasi', $data);
    }

    public function berita(){
        $data['berita'] = berita::orderBy('created_at', 'desc')->get();
        return view('zakat.berita',$data);
    }

    public function tambahberita(){
        $data['tipe'] = tipe::get();
        return view('zakat.formtambah',$data);
    }

    public function editberita($id){
        $data['tipe'] = tipe::get();
        $data['berita'] = berita::find($id);
        return view('zakat.formedit',$data);
    }

    public function editberitaSimpan(Request $request){
        $berita = berita::find($request->id);
        $berita->tipe_id = $request->tipe_id;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        if ($request->hasFile('gambar')) {
            $gambar = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
            $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
            $berita->gambar = $gambar;
            $berita->type = $ext;
        }
        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }

    public function simpanberita(Request $request){
        $this->validate($request, [
            'tipe_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('gambar')->store('public/berita');

        $berita = new berita();
        $berita->tipe_id = $request->tipe_id;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        if ($request->hasFile('gambar')) {
            $gambar = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
            $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
            $berita->gambar = $gambar;
            $berita->type = $ext;
        }
        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }

    public function hapusberita($id){
        $berita = berita::find($id);
        $berita->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }

    public function beritahome($id){
        $data['berita'] = berita::where('tipe_id', $id)->orderBy('created_at', 'desc')->get();
        return view('zakat.beritahome',$data);
    }

    public function tentangkami(){
        return view('zakat.tentangkami');
    }

    public function detailberita($id){
        $data['berita'] = berita::where('id', $id)->orderBy('created_at', 'desc')->first();
        return view('zakat.detailberita',$data);
    }

    public function tentangzakat(){
        $data['tentang'] = tentangzakat::orderBy('created_at', 'desc')->get();
        return view('zakat.tentangzakattambah',$data);
    }
    public function editzakat($id){
        $data['detail'] = detail::where('zis','=','0')->get();
        $data['tentang'] = tentangzakat::find($id);
        return view('zakat.tentangzakatedit',$data);
    }

    public function formzakat(){
        $data['detail'] = detail::where('zis','0')->get();
        return view('zakat.tentangzakat',$data);
    }

    public function editzakatSimpan(Request $request){
        $berita = tentangzakat::find($request->id);
        $berita->tipe_id = $request->tipe_id;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        if ($request->hasFile('gambar')) {
            $gambar = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
            $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
            $berita->gambar = $gambar;
            $berita->ext = $ext;
        }
        $berita->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function zakatsimpan(Request $request){
        $this->validate($request, [
            'tipe_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $berita = new tentangzakat();
        $berita->tipe_id = $request->tipe_id;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        if ($request->hasFile('gambar')) {
            $gambar = base64_encode(file_get_contents($request->file('gambar')->getRealPath()));
            $ext = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_EXTENSION);
            $berita->gambar = $gambar;
            $berita->ext = $ext;
        }
        $berita->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function tentanghapus($id){
        tentangzakat::where('id',$id)->delete();
        return back()->with('success','Data Berhasil Dihapus');
    }

    public function tentangzakathome($id){
        $cek = tentangzakat::where('tipe_id', $id)->orderBy('created_at', 'desc')->first();
        if ($cek != NULL) {
            $data['berita'] = tentangzakat::where('tipe_id', $id)->orderBy('created_at', 'desc')->get();
            return view('zakat.tentangzakathome',$data);
        } else {
            return redirect('/');
        }
        
    }

    public function tentangzakatdetail($id){
        $data['berita'] = tentangzakat::where('id', $id)->orderBy('created_at', 'desc')->first();
        return view('zakat.detailtentang',$data);
    }

    public function cetak(Request $request){
        $data['tgl1'] = $request->tgl1;
        $data['tgl2'] = $request->tgl2;
        $kategori = kategori::where('id',$request->kategoriid)->first();
        $data['kategori'] = $kategori->nama;
        $data['donasi'] = Donasi::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->where('kategoriid','=','1')->get();
        $data['total'] = Donasi::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->where('kategoriid','=','1')->sum('amount');
        return view('zakat.cetak',$data);
    }
    
    public function cetakinfak(Request $request){
        $data['tgl1'] = $request->tgl1;
        $data['tgl2'] = $request->tgl2;
        $kategori = kategori::where('id',$request->kategoriid)->first();
        $data['kategori'] = $kategori->nama;
        $data['donasi'] = Donasi::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->where('kategoriid','=','2')->get();
        $data['total'] = Donasi::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->where('kategoriid','=','2')->sum('amount');
        return view('zakat.cetak',$data);
    }

    public function cetaksedekah (Request $request){
        $data['tgl1'] = $request->tgl1;
        $data['tgl2'] = $request->tgl2;
        $data['donasi'] = Donasi::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->where('kategoriid','=','3')->get();
        $data['total'] = Donasi::whereBetween('created_at', [$request->tgl1, $request->tgl2])->where('status','success')->where('kategoriid','=','3')->sum('amount');
        $kategori = kategori::where('id',$request->kategoriid)->first();
        $data['kategori'] = $kategori->nama;
        return view('zakat.cetak',$data);
    }

    public function donasikeluar(){
        $data['pengeluaran'] = pengeluaran::where('kategoriid','=','1')->get();
        $data['pengeluaranid'] = pengeluaran::where('kategoriid','=','1')->first();
        return view('zakat.pengeluaranZakat',$data);
    }

    public function formdonasikeluar(){
        return view('zakat.pengeluaranZakatform');
    }

    public function pengeluaranzakatsimpan(Request $request){
        $this->validate($request, [
            'kategoriid' => 'required',
            'ket' => 'required',
            'pengeluaran' => 'required',
            'tanggal' => 'required',
        ]);

        $pengeluaran = new pengeluaran();
        $pengeluaran->kategoriid = $request->kategoriid;
        $pengeluaran->ket = $request->ket;
        $pengeluaran->pengeluaran = $request->pengeluaran;
        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function hapuspengeluaranzakat($id){
        pengeluaran::where('id',$id)->delete();
        return back()->with('success','Data Berhasil Dihapus');
    }

    public function donasikeluarinfak(){
        $data['pengeluaranid'] = pengeluaran::where('kategoriid','=','2')->first();
        $data['pengeluaran'] = pengeluaran::where('kategoriid','=','2')->get();
        return view('zakat.pengeluaranInfak',$data);
    }

    public function formdonasikeluarinfak(){
        return view('zakat.pengeluaranInfakform');
    }

    public function donasikeluarsedekah(){
        $data['pengeluaranid'] = pengeluaran::where('kategoriid','=','3')->first();
        $data['pengeluaran'] = pengeluaran::where('kategoriid','=','3')->get();
        return view('zakat.pengeluaranSedekah',$data);
    }

    public function formdonasikeluarsedekah(){
        return view('zakat.pengeluaranSedekahform');
    }

    public function donasikeluarcetak(){
        $data['kategori'] = kategori::get();
        $data['bulan'] = bulan::get();
        return view('zakat.CetakPengeluaran',$data);
    }

    public function donasikeluarcetakdetail(Request $request){
        $data['jenis'] = kategori::where('id',$request->kategori)->first();
        $data['pengeluaran'] = pengeluaran::where('kategoriid',$request->kategori)->whereMonth('tanggal',$request->bulan)->whereYear('tanggal',$request->tahun)->get();
        $data['total'] = pengeluaran::where('kategoriid',$request->kategori)->whereMonth('tanggal',$request->bulan)->whereYear('tanggal',$request->tahun)->sum('pengeluaran');
        return view('zakat.CetakPengeluaranDetail',$data);
    }

    public function histori(){
        return view('zakat.histori');
    }
    public function historidonasi(){
        $data['donasi'] = Donasi::orderBy('created_at', 'desc')->where('userid',\Auth::user()->id)->get();
        return view('zakat.tabel_donasi', $data);
    }

    public function cetaksemua(Request $request){
        $data['jenis'] = kategori::where('id',$request->id)->first();
        $data['pengeluaran'] = pengeluaran::where('kategoriid',$request->id)->whereBetween('tanggal',[$request->dari,$request->sampai])->get();
        $data['total'] = pengeluaran::where('kategoriid',$request->id)->whereBetween('tanggal',[$request->dari,$request->sampai])->sum('pengeluaran');
        return view('zakat.CetakPengeluaranDetail',$data);

    }

    public function kitsaran(){
        $data['data'] = kritiksaran::orderBy('id', 'desc')->get();
        return view('zakat.kitsaran',$data);
    }
    public function calculator(){
        $data['detail'] = detail::where('zis','=','2')->get();
        return view('zakat.calculator',$data);
    }

    public function struck($id){
        $data['donasi'] = Donasi::where('transaction_id',$id)->first();
        $customPaper = array(0,0,467.00,283.80);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('zakat.struck',$data)->setPaper($customPaper, 'landscape');
        return $pdf->download('struck.pdf');
    }
}

