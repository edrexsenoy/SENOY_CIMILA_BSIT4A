@extends('layouts.admin')

@section('content')

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.items.store') }}" method="POST">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>


@endsection