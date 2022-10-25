@extends('admin.admin')
@section('title-content', 'Category')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>

        <div class="card-tools">
            <a href="{{ url('admin/category/create') }}" class="btn btn-tool">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status }}</td>
                        <td style="width: 100px">
                            <form action="{{ url('admin/category/' . $category->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="btn-group">
                                    <a href="{{ url('/admin/category/' . $category->id) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('/admin/category/' . $category->id . '/edit') }}" class="btn btn-warning">
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
</div>
@endsection