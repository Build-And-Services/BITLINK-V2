<?php

namespace App\Http\Controllers;

use App\Models\BenihData;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function padi(){
        // get benih data jenis padi
        $benih = BenihData::where('jenis_benih', 'padi')->get();
        return view('frontend.product.index', compact('benih'));
    }
    
    public function kedelai(){
        // get benih data jenis kedelai
        $benih = BenihData::where('jenis_benih', 'kedelai')->get();
        return view('frontend.product.index', compact('benih'));
    }
    
    public function detail($id){
        // get benih data detail id
        $benih = BenihData::with(['akunProdusen' => function($query) {
            $query->with('dataProdusen');
        }])->where('id_benih', $id)->first();

        return view('frontend.product.detail', compact('benih'));
    }

    public function checkout($id, $quantity){
        $benih = BenihData::with(['akunProdusen' => function($query) {
            $query->with('dataProdusen');
        }])->where('id_benih', $id)->first();

        return view('frontend.product.checkout', compact(['benih', 'quantity']));
    }
}
