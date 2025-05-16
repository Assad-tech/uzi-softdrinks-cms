<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutOurClient;
use Illuminate\Http\Request;

class CompanyLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos = AboutOurClient::all();
        return view('backend.companies.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.companies.createHome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $logo = $request->file('logo');
        $logoName = time() . '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('front/assets/images/find-uzi'), $logoName);
        $newLogo = new AboutOurClient();
        $newLogo->company_logo = $logoName;
        $newLogo->save();
        toastr()->success('Logo added successfully!');
        return redirect()->route('admin.manage.company-logos');
    }


    public function edit(string $id)
    {
        $logo = AboutOurClient::find($id);
        return view('backend.companies.editHome', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $updateLogo = AboutOurClient::find($id);
        $logo = $request->file('logo');
        $logoName = time() . '.' . $logo->getClientOriginalExtension();
        unlink(public_path('front/assets/images/find-uzi/' . $updateLogo->company_logo));
        $logo->move(public_path('front/assets/images/find-uzi'), $logoName);
        $updateLogo->company_logo = $logoName;
        $updateLogo->save();
        toastr()->success('Logo updated successfully!');
        return redirect()->route('admin.manage.company-logos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logo = AboutOurClient::find($id);
        unlink(public_path('front/assets/images/find-uzi/' . $logo->company_logo));
        $logo->delete();
        toastr()->success('Logo deleted successfully!');
        return redirect()->route('admin.manage.company-logos');
    }
}
