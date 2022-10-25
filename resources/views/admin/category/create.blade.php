@extends('admin.admin')
@section('title-content', 'Category')

@section('content')
    <form action="{{ url('/admin/category/create') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <div class="card-body">
    
                <div class="form-group">
                    <label>Category</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter category">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
    
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary float-right">Add Category</button>
            </div>
        </div>
    </form>
@endsection