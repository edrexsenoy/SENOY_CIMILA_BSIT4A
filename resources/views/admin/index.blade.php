@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Manage User Accounts
    </div>
    <div class="card-body">
        {{-- Display Success Message --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Email Verified</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(isset($user->roles))
                        {{ $user->roles }}
                        @else
                        <span class="badge bg-secondary">No Role</span>
                        @endif
                    </td>
                    <td>
                        @if($user->email_verified_at)
                        <span class="badge bg-success">Verified</span>
                        @else
                        <span class="badge bg-warning">Not Verified</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>

                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('users.view', $user->id) }}" class="btn btn-warning btn-sm" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.changePasswordForm', $user->id) }}" class="btn btn-info btn-sm" title="Change Password">
                                <i class="fas fa-key"></i>
                            </a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection