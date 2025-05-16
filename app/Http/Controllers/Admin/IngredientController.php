<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('backend.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('front/assets/images/ingredients'), $imageName);
        }
        $newIngredient = new Ingredient();
        $newIngredient->title = $request->title;
        $newIngredient->description = $request->description;
        $newIngredient->image = $imageName;
        $newIngredient->status = 1;
        $newIngredient->save();
        toastr()->success('Ingredient added successfully!');
        return redirect()->route('admin.manage.ingredients');
    }

    public function edit(string $id)
    {
        $ingredient = Ingredient::find($id);
        return view('backend.ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $updateIngredient = Ingredient::find($id);
        $updateIngredient->title = $request->title;
        $updateIngredient->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            unlink(public_path('front/assets/images/ingredients/' . $updateIngredient->image));
            $image->move(public_path('front/assets/images/ingredients'), $imageName);
            $updateIngredient->image = $imageName;
        }
        $updateIngredient->save();
        toastr()->success('Ingredient updated successfully!');
        return redirect()->route('admin.manage.ingredients');
    }


    public function destroy(string $id)
    {
        $ingredient = Ingredient::find($id);
        unlink(public_path('front/assets/images/ingredients/' . $ingredient->image));
        $ingredient->delete();
        toastr()->success('Ingredient deleted successfully!');
        return redirect()->route('admin.manage.ingredients');
    }
}
