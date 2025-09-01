@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Change Password</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Users</a></li>
    <li class="breadcrumb-item active">Change Password</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-key me-1"></i>
        Change Password for: **{{ $user->name }}**
    </div>
    <div class="card-body">

        {{-- Display Validation Errors --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.updatePassword', $user->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Password</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection