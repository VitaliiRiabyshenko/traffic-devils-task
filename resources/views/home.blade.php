@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (auth()->user()->hasPermission('add_user'))
                    <a href="{{ route('register') }}" class="link-primary">Add User</a>
                @endif
                @if (auth()->user()->hasPermission('add_product'))
                    <a href="{{ route('products.create') }}" class="link-primary">Add new product</a>
                @endif                
            </div>
            @if ($statistics)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Count Products</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statistics as $statistic)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $statistic->name }}</td>
                                <td>{{ $statistic->products_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
