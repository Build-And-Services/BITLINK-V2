<?php

namespace App\Http\Controllers;

use App\Models\DataEvaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitoringProdusenController extends Controller
{
    public function laporanBulanan()
    {
        try {
            $laporanBulanan = DataEvaluasi::where('id_akunp', Auth::user()->id)->get();
            return view('produsen.monitoring.index', ['getLaporan' => $laporanBulanan]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function createLaporan()
    {
        try {
            return view('produsen.monitoring.create');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function storeLaporan(Request $request)
    {
        try {
            $request->validate([
                'tgl_evaluasi' => 'required|date',
                'kinerja_produksi' => 'required',
                'kualitas_benih' => 'required',
                'kendala_produksi' => 'required',
                'saran_produksi' => 'required',
            ]);

            DataEvaluasi::create([
                // 'id_akunp' => $request->id_akunp,
                'id_akunp' => Auth::user()->id,
                'tgl_evaluasi' => $request->tgl_evaluasi,
                'kinerja_produksi' => $request->kinerja_produksi,
                'kualitas_benih' => $request->kualitas_benih,
                'kendala_produksi' => $request->kendala_produksi,
                'saran_produksi' => $request->saran_produksi,
            ]);

            return redirect('/monitoring/laporan-bulanan')->with('success', 'Berhasil menambahkan data evaluasi');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function showLaporan($id)
    {
        try {
            $laporan = DataEvaluasi::findOrFail($id);
            return view('produsen.monitoring.edit', [
                'getLaporan' => $laporan
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function updateLaporan(Request $request, $id)
    {
        try {
            $request->validate([
                'tgl_evaluasi' => 'required|date',
                'nama_perusahaan' => 'required',
                'kinerja_produksi' => 'required',
                'kualitas_benih' => 'required',
                'kendala_produksi' => 'required',
                'saran_produksi' => 'required',
            ]);

            $laporan = DataEvaluasi::find($id);

            $laporan->update([
                'id_akunp' => Auth::user()->id,
                'tgl_evaluasi' => $request->tgl_evaluasi,
                'nama_perusahaan' => $request->nama_perusahaan,
                'kinerja_produksi' => $request->kinerja_produksi,
                'kualitas_benih' => $request->kualitas_benih,
                'kendala_produksi' => $request->kendala_produksi,
                'saran_produksi' => $request->saran_produksi,
            ]);

            return redirect('/monitoring/laporan-bulanan')->with('success', 'Berhasil update data evaluasi');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function destroyLaporan($id)
    {
        try {
            $laporan = DataEvaluasi::find($id);
            $laporan->delete();
            return redirect('/monitoring/laporan-bulanan')->with('success', 'Berhasil menghapus data evaluasi');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
