<?php

namespace App\Http\Controllers;

use App\Models\DataAkunProdusen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageUserController extends Controller
{
    public function pembeli()
    {
        return view('frontend.users.pembeli.index');
    }

    public function produsen()
    {
        try {
            DB::beginTransaction();
            $produsenData = DataAkunProdusen::with('user')->get();
            DB::commit();
            return view('frontend.users.produsen.index', compact('produsenData'));
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
