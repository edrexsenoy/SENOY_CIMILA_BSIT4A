@extends('layouts.user')

@section('content')

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('user.items.update', $item->id) }}" method="POST">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $item->description }}">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="{{ $item->quantity }}">
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</body>

@endsection