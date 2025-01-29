<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session('authentication')) {
            return redirect()->route('auth.login')->withErrors([
                'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session('authentication')) {
            return redirect()->route('auth.login')->withErrors([
                'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!session('authentication')) {
            return redirect()->route('auth.login')->withErrors([
                'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }
        $categorie_valid = $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string|max:255',
        ]);

        Category::create($categorie_valid);
        return redirect()->route('categories.index')->with('success', 'categorie bien ajouté!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categorie)
    {
        if (!session('authentication')) {
            return redirect()->route('auth.login')->withErrors([
                'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!session('authentication')) {
            return redirect()->route('auth.login')->withErrors([
                'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }
        $categorie = Category::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!session('authentication')) {
            return redirect()->route('auth.login')->withErrors([
                'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }
        $categorie_valid = $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string|max:255',
        ]);

        $categorie = Category::findOrFail($id);

        $categorie->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('categories.index')->with('success', 'categorie est bien mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!session('authentication')) {
            return redirect()->route('auth.login')->withErrors([
                'access_denied' => 'Vous devez être connecté pour accéder à cette page.',
            ]);
        }
        $categorie = Category::findOrFail($id);
        $categorie->delete();
        return redirect()->route('categories.index')->with('success_del', 'categorie bien supprimé!');
    }
}
