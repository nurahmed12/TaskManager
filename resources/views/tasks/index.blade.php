@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">My Tasks</h1>
    <div class="header-actions">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> New Task
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success fade-in">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
    </div>
@endif

@if($tasks->isEmpty())
    <div class="card fade-in">
        <div class="empty-state">
            <i class="bi bi-journal-check"></i>
            <h3>No tasks yet</h3>
            <p>Get started by creating your first task to stay organized and productive</p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg mr-2"></i> Create Task
            </a>
        </div>
    </div>
@else
    <div class="card fade-in">
        <div class="card-header">
            <i class="bi bi-list-task mr-2"></i> Your Tasks
        </div>
        <div>
            @foreach($tasks as $task)
                <div class="task-item">
                    <div class="task-info">
                        <div class="task-title">{{ $task->title }}</div>
                        @if($task->description)
                            <div class="task-description">{{ \Illuminate\Support\Str::limit($task->description, 120) }}</div>
                        @endif
                        <div class="task-meta">
                            <span><i class="bi bi-calendar mr-1"></i> {{ $task->created_at->format('M d, Y') }}</span>
                            <span><i class="bi bi-clock mr-1"></i> {{ $task->created_at->format('h:i A') }}</span>
                        </div>
                    </div>
                    
                    <div class="task-actions">
                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="status-badge {{ $task->completed ? 'badge-completed' : 'badge-pending' }}">
                                @if($task->completed)
                                    <i class="bi bi-check-circle-fill mr-1"></i> Completed
                                @else
                                    <i class="bi bi-clock-history mr-1"></i> Pending
                                @endif
                            </button>
                        </form>
                        
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-edit btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection