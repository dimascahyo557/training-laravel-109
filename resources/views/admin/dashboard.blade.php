@extends('admin.admin')
@section('title-content', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales Graph</h3>
                </div>
                <div class="card-body">
                    Sales graph here <br><br><br><br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Transaction</h3>
                </div>
                <div class="card-body">
                    Latest transaction here <br><br><br><br>
                </div>
            </div>
        </div>
    </div>
@endsection