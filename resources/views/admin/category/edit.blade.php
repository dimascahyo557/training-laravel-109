@extends('admin.admin')
@section('title-content', 'Category')

@section('content')
    <form action="{{ url('/admin/category/' . $category->id) }}" method="post">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>
            <div class="card-body">
    
                <div class="form-group">
                    <label>Category</label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        placeholder="Enter category"
                        value="{{ $category->name }}"
                    >
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option
                            value="active"
                            @if($category->status == 'active') selected @endif
                        >Active</option>
                        <option
                            value="inactive"
                            @if($category->status == 'inactive') selected @endif
                        >Inactive</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
    
            </div>
            <div class="card-footer">
                <a href="{{ url('admin/category') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary float-right">Edit Category</button>
            </div>
        </div>
    </form>
@endsection