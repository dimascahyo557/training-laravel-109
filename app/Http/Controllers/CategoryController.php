<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index')
                ->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        // Validasi (cara 1)
        // $validator = Validator::make($inputs, [
        //     'name' => 'required|max:255',
        //     'status' => [ 'required', 'in:active,inactive' ]
        // ], [
        //     'name.required' => 'Kolom kategori harus diisi.'
        // ]);

        // if ($validator->fails()) {
        //     return redirect('/admin/category/create')->withErrors($validator);
        // }

        // Validasi (cara 2)
        $request->validate([
            'name' => 'required|max:255',
            'status' => [ 'required', 'in:active,inactive' ]
        ], [
            'name.required' => 'Kolom kategori harus diisi.'
        ]);

        // Menyimpan data (cara ke 1)
        // $category = new Category;
        // $category->name = $request->input('name');
        // $category->status = $request->input('status');
        // $category->save();

        // Menyimpan data (cara ke 2, mass assignment)
        // Category::create([
        //     'name' => $request->input('name'),
        //     'status' => $request->input('status')
        // ]);

        // Menyimpan data (cara ke 3, mass assignment)
        Category::create($inputs);

        // set flash message
        session()->flash('success', 'Category successfully saved');

        return redirect('/admin/category');
    }

    public function show(Category $category) // Route model binding
    {
        // $category = Category::where('id', $id)->first();
        // $category = Category::find($id);
        // $category = Category::findOrFail($id);

        return view('admin.category.show')->with('category', $category);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit')->with('category', $category);
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => [ 'required', 'in:active,inactive' ]
        ], [
            'name.required' => 'Kolom kategori harus diisi.'
        ]);

        // Ubah data (cara 1)
        // $category->name = $request->input('name');
        // $category->status = $request->input('status');
        // $category->save();

        // Ubah data (cara 2, mass assignment)
        // $category->update([
        //     'name' => $request->input('name'),
        //     'status' => $request->input('status')
        // ]);

        // Ubah data (cara 3, mass assignment)
        $category->update($request->all());

        // set flash message
        session()->flash('success', 'Category updated successfully');

        return redirect('/admin/category');
    }

    public function destroy(Category $category)
    {
        // Hapus data
        $category->delete();

        // set flash message
        session()->flash('success', 'Category deleted successfully');

        return redirect('/admin/category');
    }
}
