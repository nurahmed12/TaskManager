@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="text-2xl font-bold text-linkedin-dark-blue">Profile Settings</h1>
</div>

@if (session('success'))
    <div class="alert alert-success flex items-center fade-in">
        <i class="bi bi-check-circle-fill mr-2"></i> {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name" class="form-label">Full Name *</label>
                    <input type="text" class="form-control w-full @error('name') border-red-500 @enderror" 
                           id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" class="form-control w-full @error('email') border-red-500 @enderror" 
                           id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="border-t pt-6 mb-6">
                <h2 class="text-xl font-semibold text-linkedin-dark-blue mb-4">Change Password</h2>
                <p class="text-linkedin-dark-gray mb-4">Leave blank to keep current password</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control w-full @error('password') border-red-500 @enderror" 
                               id="password" name="password">
                        @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control w-full" 
                               id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary flex items-center">
                    <i class="bi bi-save mr-2"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection