@extends('layouts.app')

@section('content')
    <div class="container pt-3">
        <div class="text-end mb-3">
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary me-2">Products</a>
        </div>
        <h1 class="mb-3">Products</h1>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @foreach($products as $product)
                    @php
                    $total+=$product->price;
                    @endphp
                    <tr>
                        <td>
                            <div style="width:100px">
                                <object class="{{ Storage::url("images/{$product->image}") }}">
                                    <img class="w-100" src="https://climate.onep.go.th/wp-content/uploads/2020/01/default-image.jpg">
                                </object>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold">{{ $product->name }}</div>
                        </td>
                        <td>
                            <div class="text-end text-danger">{{ $product->price }} DHs</div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="fw-bold">Total</td>
                        <td class="text-end fw-bold"> {{ $total }} DHs </td>
                    </tr>
                </tbody>
            </table>
            @if($total > 0)
            <form action="{{route('goToPayment')}}" method="POST">
                @csrf
                <input type="hidden" name="total" value="{{ $total }}">
            <div class="text-end pe-0">
                <button class="btn btn-sm btn-primary" type="submit">Go To Payment</button>
            </div>
            </form>
            @endif
        </div>
    </div>
@endsection
