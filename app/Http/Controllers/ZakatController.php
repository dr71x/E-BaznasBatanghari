<?php

namespace App\Http\Controllers;

use App\Models\tipe;
use App\Models\berita;
use App\Models\detail;
use App\Models\Donasi;
use App\Models\sebutan;
use App\Models\kategori;
use Illuminate\Support\Str;
use App\Models\tentangzakat;
use Illuminate\Http\Request;
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
            $donation = Donasi::create([
                'transaction_id' => Str::uuid(),
                'donor_name' => $request->donor_name,
                'donor_email' => $request->donor_email,
                'donation_type' => $request->donation_type,
                'phone' => $request->phone,
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
        $data['detail'] = detail::where('kategori_id', $id)->get();
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
        return view('zakat.donasi');
    }

    public function TabelDonasi()
    {
        $data['donasi'] = Donasi::orderBy('created_at', 'desc')->cursorPaginate(10);
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
        $berita->gambar = $path;
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
        echo "tentang Kami";
    }

    public function detailberita($id){
        $data['berita'] = berita::where('id', $id)->orderBy('created_at', 'desc')->first();
        return view('zakat.detailberita',$data);
    }

    public function tentangzakat(){
        $data['tentang'] = tentangzakat::orderBy('created_at', 'desc')->get();
        return view('zakat.tentangzakattambah',$data);
    }

    public function formzakat(){
        $data['detail'] = detail::where('kategori_id','=','1')->get();
        return view('zakat.tentangzakat',$data);
    }

    public function zakatsimpan(Request $request){
        $this->validate($request, [
            'tipe_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('gambar')->store('public/berita');

        $berita = new tentangzakat();
        $berita->tipe_id = $request->tipe_id;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->gambar = $path;
        $berita->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function tentanghapus($id){
        tentangzakat::where('id',$id)->delete();
        return back()->with('success','Data Berhasil Dihapus');
    }

    public function tentangzakathome($id){
        $data['berita'] = tentangzakat::where('tipe_id', $id)->orderBy('created_at', 'desc')->get();
        return view('zakat.tentangzakathome',$data);
    }

    public function tentangzakatdetail($id){
        $data['berita'] = tentangzakat::where('id', $id)->orderBy('created_at', 'desc')->first();
        return view('zakat.detailtentang',$data);
    }
}
