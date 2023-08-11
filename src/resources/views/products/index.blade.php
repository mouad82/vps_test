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
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary me-2">Create New Product</a>
            <a class="btn btn-sm btn-primary" href="{{ route('products.box') }}">Show box ({{ $boxCount }})</a>
        </div>
        <h1 class="mb-3">Products</h1>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-sm-6 col-12 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100">
                            <object class="{{ Storage::url("images/{$product->image}") }}">
                                <img class="w-100" src="https://climate.onep.go.th/wp-content/uploads/2020/01/default-image.jpg">
                            </object>
                        </div>
                        <div class="fw-bold">{{ $product->name }}</div>
                        <div class="text-end text-danger">{{ $product->price }} DHs</div>
                        <i class="text-muted">{{ $product->description }} DHs</i>
                        <a href="{{ route('products.addToBox', $product->id) }}" class="w-100 btn btn-sm btn-primary">Add to box</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>