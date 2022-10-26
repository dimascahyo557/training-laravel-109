@extends('admin.admin')
@section('title-content', 'Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Product</h3>
        </div>
        <div class="card-body">

            @if (!empty($product->image))
                <img src="{{ asset('storage/' . $product->image) }}" alt="product image">
            @endif

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Category</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $product->category->name }}"
                            disabled
                        >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>SKU</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $product->sku }}"
                            disabled
                        >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $product->name }}"
                            disabled
                        >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Status</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $product->status }}"
                            disabled
                        >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Price</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $product->price }}"
                            disabled
                        >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Description</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $product->description }}"
                            disabled
                        >
                    </div>
                </div>
            </div>


        </div>
        <div class="card-footer">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection