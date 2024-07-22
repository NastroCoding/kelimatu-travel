<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'gmail' => 'required',
            'whatsapp_num' => 'required',
            'instagram' => 'required',
            'operational' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'map' => 'required',
            'history' => 'required',
        ]);

        $config = Config::findOrFail($id);

        $config->update($request->all());

        return back()->with('success', 'Pengaturan berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Config $config)
    {
        //
    }
}
