@extends('admin.admin')
@section('title-content', 'Product')

@section('content')
    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
            </div>
            <div class="card-body">

                @if (!empty($product->image))
                    <img src="{{ asset('storage/' . $product->image) }}" alt="product image">
                @endif

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>SKU</label>
                            <input name="sku" type="text" class="form-control" value="{{ $product->sku }}" placeholder="Enter sku">
                            @error('sku')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control"  value="{{ $product->name }}" placeholder="Enter product name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" @if($product->status == 'active') selected @endif>Active</option>
                                <option value="inactive" @if($product->status == 'inactive') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" class="form-control" value="{{ $product->price }}" placeholder="Enter price">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter description">{{ $product->description }}</textarea>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary float-right">Edit Product</button>
            </div>
        </div>
    </form>
@endsection