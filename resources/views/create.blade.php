<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<header>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</header>


<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('items.store') }}" method="POST">
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

</html>