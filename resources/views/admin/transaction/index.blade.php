@extends('admin.admin')
@section('title-content', 'Transaction')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Transactions</h3>

        <div class="card-tools">
            <a href="{{ route('transaction.index') }}" class="btn btn-tool">
                <i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <div class="card-body">

        <a href="{{ route('transaction.export') }}" target="_blank" class="btn btn-success mb-3">
            Export Excel
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Product</th>
                    <th>Date</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->trx_date }}</td>
                        <td>{{ $transaction->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection