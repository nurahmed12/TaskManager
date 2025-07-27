@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="text-2xl font-bold text-gray-800">Edit Task</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary flex items-center">
        <i class="bi bi-arrow-left mr-2"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="form-label">Task Title *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $task->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <div class="form-check form-switch">
                    <!-- Fix: Add hidden input for false value -->
                    <input type="hidden" name="completed" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" 
                           id="completed" name="completed" value="1" 
                           {{ $task->completed ? 'checked' : '' }}>
                    <label class="form-check-label fw-medium" for="completed">
                        Mark as completed
                    </label>
                </div>
            </div>
            
            <div class="d-flex justify-content-end mt-5">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary me-3">Cancel</a>
                <button type="submit" class="btn btn-primary flex items-center">
                    <i class="bi bi-save mr-2"></i> Update Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection