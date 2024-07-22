<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = Mail::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('subject', 'LIKE', "%{$search}%");
        }

        $mails = $query->latest('created_at')->get();

        $page = 'inbox';

        return view('admin.inbox', compact('mails', 'page'));
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
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Validate the incoming request to ensure 'ids' is a string
        $request->validate([
            'ids' => 'required|string',
        ]);

        // Convert the comma-separated string into an array
        $ids = explode(',', $request->input('ids'));

        // Validate each ID to ensure they exist in the 'mails' table
        $request->validate([
            'ids.*' => 'exists:mails,id',
        ]);

        // Delete the corresponding records
        Mail::whereIn('id', $ids)->delete();

        // Optionally, you can return a response or redirect
        return redirect()->route('mails.index')->with('success', 'Selected mails deleted successfully.');
    }
}
