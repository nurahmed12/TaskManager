@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="text-2xl font-bold text-linkedin-dark-blue">Create New Task</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary flex items-center">
        <i class="bi bi-arrow-left mr-2"></i> Back to Tasks
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            
            <div class="mb-6">
                <label for="title" class="form-label">Task Title *</label>
                <input type="text" class="form-control w-full @error('title') border-red-500 @enderror" 
                       id="title" name="title" placeholder="What needs to be done?" required>
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control w-full @error('description') border-red-500 @enderror" 
                          id="description" name="description" rows="4" 
                          placeholder="Add details about this task..."></textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                <button type="reset" class="btn btn-outline-primary">Reset</button>
                <button type="submit" class="btn btn-primary flex items-center">
                    <i class="bi bi-plus-lg mr-2"></i> Create Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection