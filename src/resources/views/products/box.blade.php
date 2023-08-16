<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
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
            <form action="{{route('payment')}}" method="POST">
                @csrf
                <input type="hidden" name="total" value="{{ $total }}">
            <div class="text-end pe-0">
                <button class="btn btn-sm btn-primary" type="submit">Go To Payment</button>
            </div>
            </form>
        </div>
    </div>
</body>

</html>