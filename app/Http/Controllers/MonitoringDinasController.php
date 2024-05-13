<?php

namespace App\Http\Controllers;

use App\Models\DataAkunProdusen;
use App\Models\DataEvaluasi;
use Illuminate\Http\Request;

class MonitoringDinasController extends Controller
{
    public function laporanBulanan()
    {
        try {
            $produsen = DataAkunProdusen::with('user')->get();
            return view('frontend.monitoring-dinas.index', [
                'produsen' => $produsen
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function showLaporan($userId)
    {
        try {
            $laporan = DataEvaluasi::with('akunProdusen')->where('id_akunp', $userId)->get();
            return view('frontend.monitoring-dinas.laporan-kinerja-produsen', [
                'laporan' => $laporan
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
