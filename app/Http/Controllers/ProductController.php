<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
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
        $categories = Category::all();
        return view('products.create', compact('categories'));
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
        $product_valid = $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string|max:40',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Taille max 2MB
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',

        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension(); // Récupérer l'extension du fichier
            $imageName = 'product_' . $product->id . '.' . $extension; // Nom basé sur l'ID
            $imagePath = $image->storeAs('products_images', $imageName, 'public'); // Stockage

            // Mettre à jour le champ image
            $product->update(['image' => $imagePath]);
        }
        return redirect()->route('products.index')->with('success', 'Produit Bien ajouté!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
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
        $product = Product::findOrFail($id); // Get the product by its ID
        $categories = Category::all(); // Get all categories for the dropdown
        return view('products.edit', compact('product', 'categories'));
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
        // Validate the request
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|string|max:40',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Max 2MB for image
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        // Find the product to update
        $product = Product::findOrFail($id);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($product->image && file_exists(public_path('storage/' . $product->image))) {
                unlink(public_path('storage/' . $product->image));
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = 'product_' . $product->id . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('products_images', $imageName, 'public');

            // Update product image in the database
            $product->image = $imagePath;
        }

        // Update other fields
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Produit bien modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit Bien supprimée!');
    }
}
