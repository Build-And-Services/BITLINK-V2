<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use App\Models\BenihData;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function webhook(Request $request){
                
        $transactionStatus = $request->transaction_status;
        $pesanan = Pesanan::find($request->order_id);
        if($transactionStatus == "capture"){
            $pesanan->status_pembayaran = 'SUKSES';
            $benih = BenihData::find($pesanan->id_benih);
            $benih->stok_benih = $benih->stok_benih - $pesanan->quantity;
            $benih->save();
            $pesanan->save();
        }else if($transactionStatus == 'deny' || $transactionStatus == 'cancel'){
            $pesanan->status_pemabayaran = 'DIBATALKAN';
            $pesanan->save();
        }
    }
    
}
