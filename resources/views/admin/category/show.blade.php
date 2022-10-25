@extends('admin.admin')
@section('title-content', 'Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Category</h3>
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
                    disabled
                >
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" disabled>
                    <option
                        value="active"
                        @if($category->status == 'active') selected @endif
                    >Active</option>
                    <option
                        value="inactive"
                        @if($category->status == 'inactive') selected @endif
                    >Inactive</option>
                </select>
            </div>

        </div>
        <div class="card-footer">
            <a href="{{ url('admin/category') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection