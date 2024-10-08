@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Sales Report</h1>

        @if($sales->isEmpty())
            <p>No sales data available.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Product ID</th>
                        <th>Checkout ID</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->user_id }}</td>
                            <td>{{ $sale->product_id }}</td>
                            <td>{{ $sale->checkout_id }}</td>
                            <td>{{ $sale->price }}</td>
                            <td>{{ $sale->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
