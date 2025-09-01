// edit.blade.php

@extends('layouts.admin')

@section('content')

<h1 class="mt-4">Edit User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit User</li>
</ol>

<div class="card">
    <div class="card-header">
        Editing User: {{ $user->name }}
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                {{-- CHANGED: Pass the full $user object, not just $user->id --}}
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('POST') {{-- HTML forms don't natively support PUT/PATCH, so we use POST and specify the method --}}

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                    </div>

                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection