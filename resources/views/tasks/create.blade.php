@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="text-2xl font-bold text-gray-800">Create New Task</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary flex items-center">
        <i class="bi bi-arrow-left mr-2"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="form-label">Task Title *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" placeholder="What needs to be done?" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4" 
                          placeholder="Add details about this task..."></textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end mt-5">
                <button type="reset" class="btn btn-outline-secondary me-3">Reset</button>
                <button type="submit" class="btn btn-primary flex items-center">
                    <i class="bi bi-plus-lg mr-2"></i> Create Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection