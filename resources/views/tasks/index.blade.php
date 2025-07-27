@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="text-2xl font-bold text-gray-800">My Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary flex items-center">
        <i class="bi bi-plus-lg mr-2"></i> New Task
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success flex items-center">
        <i class="bi bi-check-circle-fill mr-2"></i> {{ session('success') }}
    </div>
@endif

@if($tasks->isEmpty())
    <div class="card empty-state">
        <i class="bi bi-journal-check"></i>
        <h3 class="text-xl font-medium mb-2">No tasks yet</h3>
        <p class="text-gray-600 mb-4">Get started by creating your first task</p>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary inline-flex items-center">
            <i class="bi bi-plus-lg mr-2"></i> Create Task
        </a>
    </div>
@else
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-5">Task</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Created</th>
                            <th class="text-end pe-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr class="task-card">
                                <td class="ps-5 py-4">
                                    <div class="font-medium text-gray-900">{{ $task->title }}</div>
                                    @if($task->description)
                                        <div class="text-sm text-gray-500 mt-1">{{ \Illuminate\Support\Str::limit($task->description, 50) }}</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="status-badge {{ $task->completed ? 'badge-completed' : 'badge-pending' }} d-inline-flex align-items-center"
                                                title="Click to toggle status">
                                            @if($task->completed)
                                                <i class="bi bi-check-circle-fill mr-1"></i> Completed
                                            @else
                                                <i class="bi bi-clock-history mr-1"></i> Pending
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center text-sm text-gray-500">
                                    {{ $task->created_at->format('M d, Y') }}
                                </td>
                                <td class="pe-5 text-end">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary action-btn flex items-center mr-2">
                                            <i class="bi bi-pencil mr-1"></i> Edit
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger action-btn flex items-center" onclick="return confirm('Are you sure you want to delete this task?')">
                                                <i class="bi bi-trash mr-1"></i> Delete
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
    </div>
@endif
@endsection