<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\Donasi;
use App\Models\sebutan;
use App\Models\kategori;
use Illuminate\Support\Str;
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
}
