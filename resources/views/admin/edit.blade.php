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
                {{-- ✅ FIXED: Added method="POST" and @csrf directive --}}
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="roles" class="form-label">Role</label>
                        <select class="form-select" name="roles" id="roles">
                            <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection