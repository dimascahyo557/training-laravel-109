@extends('admin.admin')
@section('title-content', 'Product')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Products</h3>

        <div class="card-tools">
            <a href="{{ route('product.create') }}" class="btn btn-tool">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control" id="filter_category">
                        <option value="">All Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($filterCatId == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Search</label>
                    <input name="search" type="text" id="filter_search" class="form-control" value="{{ $filterKeyword }}" placeholder="Search data">
                    @error('search')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>SKU</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>
                            @if($product->image != null)
                                <img src="{{ asset('storage/' . $product->image) }}" width="200" alt="produk image">
                            @endif
                        </td>
                        <td>{{ $product->status }}</td>
                        <td style="width: 100px">
                            <form action="{{ route('product.destroy', [ 'product' => $product->id ]) }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="btn-group">
                                    <a href="{{ route('product.show', [ 'product' => $product->id ]) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('product.edit', [ 'product' => $product->id ]) }}" class="btn btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        {{ $products->appends($_GET)->links() }}
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#filter_category').on('change', function () {
            filter()
        })

        $('#filter_search').on('keypress', function (event) {
            if (event.keyCode == 13) {
                filter()
            }
        })

        function filter() {
            var categoryId = $('#filter_category').val()
            var keyword = $('#filter_search').val()

            window.location.replace("{{ route('product.index') }}?category_id=" + categoryId + "&keyword=" + keyword)
        }
    })
</script>
@endsection