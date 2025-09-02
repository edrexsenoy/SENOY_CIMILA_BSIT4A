@extends('layouts.admin')

@section('content')

<body>
    <div class="container">
        <div class="row">
            <label for="name">Name</label>
            <input disabled type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}">
            <label for="price">Price</label>
            <input disabled type="text" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}">
            <label for="description">Description</label>
            <input disabled type="text" class="form-control" name="description" placeholder="Description" value="{{ $item->description }}">
            <label for="quantity">Quantity</label>
            <input disabled type="number" class="form-control" name="quantity" placeholder="Quantity" value="{{ $item->quantity }}">
            <a href="{{ route('admin.items.index') }}" class="btn btn-danger"> Go Back</a>
        </div>
</body>

@endsection