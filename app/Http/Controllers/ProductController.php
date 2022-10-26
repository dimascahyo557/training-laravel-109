<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->query('keyword');
        $filterCatId = $request->query('category_id');

        $query = new Product;

        if (!empty($filterKeyword)) {
            $query = $query->where('name', 'LIKE', '%' . $filterKeyword . '%');
        }

        if (!empty($filterCatId)) {
            $query = $query->where('category_id', $filterCatId);
        }

        $products = $query->paginate(1);

        $categories = Category::select('id', 'name')->get();

        return view('admin.product.index')
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('filterKeyword', $filterKeyword)
                ->with('filterCatId', $filterCatId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        $categories = Category::select('id', 'name')->where('status', 'active')->get();
        return view('admin.product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'name'          => 'required',
            'sku'           => 'required',
            'category_id'   => ['required', 'exists:categories,id'],
            'price'         => ['required', 'numeric'],
            'image'         => ['nullable', 'image']
        ]);

        $inputs = $request->all();

        // Simpan gambar
        if ($request->has('image')) {
            $image = $request->file('image')->store('product', 'public');
            $inputs['image'] = $image;
        } else {
            unset($inputs['image']);
        }

        Product::create($inputs);

        // set flash message
        session()->flash('success', 'Product created successfully');

        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.edit')
            ->with('product', $product)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'          => 'required',
            'sku'           => 'required',
            'category_id'   => ['required', 'exists:categories,id'],
            'price'         => ['required', 'numeric'],
            'image'         => ['nullable', 'image']
        ]);

        $inputs = $request->all();

        if ($request->has('image')) {
            // hapus gambar lama
            if ($product->image != null && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // simpan gambar baru
            $image = $request->file('image')->store('product', 'public');
            $inputs['image'] = $image;
        } else {
            $inputs['image'] = $product->image;
        }

        // update data
        $product->update($inputs);

        // set flash message
        session()->flash('success', 'Product updated successfully');

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // hapus gambar lama
        if ($product->image != null && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        // set flash message
        session()->flash('success', 'Product deleted successfully');

        return redirect(route('product.index'));
    }
}
