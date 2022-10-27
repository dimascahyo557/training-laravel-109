@extends('admin.admin')
@section('title-content', 'Transaction')

@section('content')
    <form action="{{ route('transaction.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Import Excel</h3>
            </div>
            <div class="card-body">
    
                <div class="form-group">
                    <label>File Excel</label>
                    <input name="import" type="file" class="form-control">
                    @error('import')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary float-right">Import</button>
            </div>
        </div>
    </form>
@endsection