@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="text-2xl font-bold text-linkedin-dark-blue">Edit Task</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary flex items-center">
        <i class="bi bi-arrow-left mr-2"></i> Back to Tasks
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="title" class="form-label">Task Title *</label>
                <input type="text" class="form-control w-full @error('title') border-red-500 @enderror" 
                       id="title" name="title" value="{{ old('title', $task->title) }}" required>
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control w-full @error('description') border-red-500 @enderror" 
                          id="description" name="description" rows="4">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-6">
                <div class="flex items-center">
                    <input type="hidden" name="completed" value="0">
                    <input class="form-check-input h-5 w-5 text-linkedin-blue rounded mr-3" type="checkbox" 
                           id="completed" name="completed" value="1" 
                           {{ $task->completed ? 'checked' : '' }}>
                    <label class="form-check-label font-medium text-linkedin-dark-gray" for="completed">
                        Mark as completed
                    </label>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">Cancel</a>
                <button type="submit" class="btn btn-primary flex items-center">
                    <i class="bi bi-save mr-2"></i> Update Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection