@extends('layouts.admin')

@section('content')

<body>
    <div class="container">
        <div class="row">
            <label for="name">Name</label>
            <input disabled type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
            <label for="price">Email</label>
            <input disabled type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
            <a href="{{ route('admin.index') }}" class="btn btn-danger"> Go Back</a>
        </div>
</body>

@endsection