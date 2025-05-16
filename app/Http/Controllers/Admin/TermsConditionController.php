<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermAndCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index()
    {
        $content = TermAndCondition::first();
        return view('backend.termsAndConditions.index',compact('content'));
    }

    public function update(Request $request)
    {
        // dd($request);
        // Validate the request
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Save to the database (assuming a `TermsConditions` model exists)
        $termsConditions = TermAndCondition::firstOrCreate();
        $termsConditions->update($validated);

        toastr()->success('Terms and Conditions updated successfully!');
        return redirect()->back();
    }
}
