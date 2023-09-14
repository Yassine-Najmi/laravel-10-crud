<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
        // ->with('i', (request()->input('page', 1) - 1) * 5)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'name' => 'required|max:50',
            'details' => 'required|min:4'
        ]);
        // $requestData = $request->all();

        // process the file upload
        if ($request->hasFile('image')) {
            $fileName = date('YmdHis') . "." . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $validatedData['image'] = '/storage/' . $path;
        }

        // fill
        $product->fill($validatedData)->save();

        return redirect(route('products.index'))->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'name' => 'required|max:50',
            'details' => 'required|min:4'
        ]);

        // process the file upload
        if ($request->hasFile('image')) {
            $fileName = time() . "." . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $validatedData['image'] = '/storage/' . $path;
        }

        // Update product
        $product->update($validatedData);

        return redirect(route('products.index'))->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
