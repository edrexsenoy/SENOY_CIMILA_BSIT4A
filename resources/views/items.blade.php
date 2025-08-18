<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <header>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </header>


</head>

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
                    <a href="{{ route('items.create') }}" class="btn btn-primary">Create</a>
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
                        <a href="{{ route('items.view', $item->id) }}" class="btn btn-warning btn-sm">
                            View
                        </a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('items.delete', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Remove item?')">
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
<footer>

</footer>

</html>