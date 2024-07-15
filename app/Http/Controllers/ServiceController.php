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
        'icons' => 'nullable|array',
        'icons.*' => 'nullable|string',
        'image' => 'nullable|image',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('services', 'public');
        $validated['image'] = $path;
    }

    $validated['created_by'] = auth()->id();

    $service = Service::create([
        'title' => $validated['title'],
        'image' => $validated['image'] ?? null,
        'description' => $validated['description'],
        'price' => $validated['price'],
        'created_by' => Auth::user()->id,
    ]);

    if (!empty($request->options) && !empty($request->icons)) {
        foreach ($request->options as $index => $opt) {
            if ($opt) {
                ServiceOption::create([
                    'service_id' => $service->id,
                    'option' => $opt,
                    'icon' => $request->icons[$index],
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
        'options.*.id' => 'nullable|integer', // Ensure each option has an 'id' field that is nullable and an integer
        'options.*.option' => 'required|string', // Ensure each option has an 'option' field that is required and a string
        'options.*.icon' => 'required|string', // Ensure each option has an 'icon' field that is required and a string
    ]);

    $service = Service::findOrFail($id);

    $service->title = $validatedData['title'];
    $service->description = $validatedData['description'];
    $service->price = $validatedData['price'];
    $service->created_by = Auth::user()->id;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('services', 'public');
        $service->image = $path;
    }

    $service->save();

    $submittedOptions = collect($validatedData['options'])->pluck('id')->filter();
    $existingOptionsId = $service->options->pluck('id');
    $optionsToDelete = $existingOptionsId->diff($submittedOptions);

    ServiceOption::where('id', $optionsToDelete)->delete();

    if (!empty($validatedData['options'])) {
        foreach ($validatedData['options'] as $optionData) {
            if (isset($optionData['id'])) {
                // Update existing option
                $option = ServiceOption::find($optionData['id']);
                if ($option) {
                    $option->option = $optionData['option'];
                    $option->icon = $optionData['icon'];
                    $option->save();
                }
            } else {
                // Create new option
                ServiceOption::create([
                    'service_id' => $service->id,
                    'option' => $optionData['option'],
                    'icon' => $optionData['icon'],
                    'created_by' => Auth::user()->id,
                ]);
            }
        }
    }

    // Redirect back with success message
    return redirect()->back()->with('success', 'Service updated successfully');
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
