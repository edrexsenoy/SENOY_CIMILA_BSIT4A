@extends('layouts.user')

@section('content')

<body>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">ITEMS</div>
        <div class="panel-body">
            <p></p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="{{ route('user.items.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>


        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Item Quantity</th>
                    <th scope="col">Item Created At</th>
                    <th scope="col">Item Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>₱ {{$item->price}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <a href="{{ route('user.items.view', $item->id) }}" class="btn btn-warning btn-sm">
                            View
                        </a>
                        <a href="{{ route('user.items.edit', $item->id) }}" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('user.items.delete', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Remove item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>



@endsection