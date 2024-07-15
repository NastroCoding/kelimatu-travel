<?php

namespace App\Http\Controllers;

use App\Models\AllServiceDetail;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceDetailController extends Controller
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
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'nullable|string',
            'guider' => 'nullable|string',
            'included' => 'nullable|array',
            'included.*.id' => 'nullable|integer',
            'included.*.icon' => 'nullable|string',
            'included.*.text' => 'nullable|string',
            'included.*.inc_description' => 'nullable|string',
            'excluded' => 'nullable|array',
            'excluded.*.id' => 'nullable|integer',
            'excluded.*.icon' => 'nullable|string',
            'excluded.*.text' => 'nullable|string',
            'excluded.*.exc_description' => 'nullable|string',
        ]);

        $user = Auth::user()->id;
        $detail = ServiceDetail::where('service_id', $id)->first();

        if (!$detail) {
            $detail = ServiceDetail::create([
                'description' => $request->description ?? '',
                'guider' => $request->guider ?? 'Belum Ditentukan',
                'service_id' => $id,
                'created_by' => $user
            ]);
        } else {
            $detail->description = $request->description ?? '';
            $detail->guider = $request->guider ?? 'Belum Ditentukan';
            $detail->save();
        }

        $includedSubmittedIds = collect($request->included)->pluck('id')->filter();
        $existingIncludedIds = AllServiceDetail::where('service_detail_id', $detail->id)->where('type', 'included')->pluck('id');
        $includedToDelete = $existingIncludedIds->diff($includedSubmittedIds);

        if ($request->included) {
            foreach ($request->included as $included) {
                $includedDetail = AllServiceDetail::findOrNew($included['id']);
                $includedDetail->service_detail_id = $detail->id;
                $includedDetail->type = 'included';
                $includedDetail->icon = $included['icon'] ?? '';
                $includedDetail->text = $included['text'] ?? '';
                $includedDetail->description = $included['inc_description'] ?? '';
                $includedDetail->created_by = $user;
                $includedDetail->save();
            }
        }

        AllServiceDetail::whereIn('id', $includedToDelete)->delete();

        $excludedSubmittedIds = collect($request->excluded)->pluck('id')->filter();
        $existingExcludedIds = AllServiceDetail::where('service_detail_id', $detail->id)->where('type', 'excluded')->pluck('id');
        $excludedToDelete = $existingExcludedIds->diff($excludedSubmittedIds);

        if ($request->excluded) {
            foreach ($request->excluded as $excluded) {
                $excludedDetail = AllServiceDetail::findOrNew($excluded['id']);
                $excludedDetail->service_detail_id = $detail->id;
                $excludedDetail->type = 'excluded';
                $excludedDetail->icon = $excluded['icon'] ?? '';
                $excludedDetail->text = $excluded['text'] ?? '';
                $excludedDetail->description = $excluded['exc_description'] ?? '';
                $excludedDetail->created_by = $user;
                $excludedDetail->save();
            }
        }

        AllServiceDetail::whereIn('id', $excludedToDelete)->delete();

        return redirect()->back()->with('success', 'Detail Layanan berhasil ditambahkan atau diperbarui.');
    }


    /**
     * Display the specified resource.
     */
    public function show(ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceDetail $serviceDetail)
    {
        //
    }
}
