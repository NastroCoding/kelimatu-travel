<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'options' => 'nullable|array',
            'options.*' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $request['image'] = $path;
        }

        $validated['created_by'] = auth()->id();

        $service = Service::create([
            'title' => $validated['title'],
            'image' => $request['image'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'created_by' => Auth::user()->id,
        ]);

        if (!empty($request->options)) {
            foreach ($request->options as $opt) {
                if ($opt) {
                    ServiceOption::create([
                        'service_id' => $service->id,
                        'option' => $opt,
                        'created_by' => auth()->id(),
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'options' => 'array', // Ensure options is an array
            'options.*' => 'required', // Ensure each option has an 'option' field that is required and a string
        ]);

        // Find the model you want to update
        $model = Service::findOrFail($id);

        // Update basic model details
        $model->title = $request->title;
        $model->description = $request->description;
        $model->price = $request->price;
        $model->created_by = Auth::user()->id;
        $model->save();

        $submittedChoiceIds = collect($validatedData['options'])->pluck('id')->filter();
        $existingChoiceIds = $model->options->pluck('id');
        $choicesToDelete = $existingChoiceIds->diff($submittedChoiceIds);


        ServiceOption::whereIn('id', $choicesToDelete)->delete();

        // Update or create details based on input options
        if ($request->has('options')) {
            foreach ($request->options as $option) {
                if (!isset($option['id'])) {

                    $newOption = ServiceOption::query();
                    $newOption->create([
                        'service_id' => $model->id,
                        'option' => $option['option'],
                        'created_by' => Auth::user()->id
                    ]);
                } else {
                    $existingOption = ServiceOption::find($option['id']);

                    if ($existingOption) {

                        $existingOption->update([
                            'service_id' => $model->id,
                            'option' => $option['option'],
                            'created_by' => Auth::user()->id
                        ]);
                    }
                }
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Model updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return back()->with('success', 'Layanan berhasil di hapus!');
    }
}
