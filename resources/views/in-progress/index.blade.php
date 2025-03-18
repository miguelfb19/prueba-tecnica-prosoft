@extends('layouts.app')

<script>
    function toggleId(element, fullId) {
        if (element.innerText.includes("...")) {
            element.innerText = fullId; // Show complete ID
        } else {
            element.innerText = fullId.length > 10 ? fullId.substring(0, 10) + "..." : fullId; // Cut again
        }
    }
</script>

@section('content')
<section id="task-in-progress" class="bg-white rounded-lg flex flex-col gap-5 p-10 h-full w-full overflow-auto fade-in">
    <div class="flex justify-center items-center">
        <a href="/" class="btn btn-outline-primary flex place-content-center p-1">
            <i class="bi bi-arrow-left-short text-2xl"></i>
        </a>
        <h1 class="text-center flex-1">Tasks in progress</h1>
        <span></span>
    </div>
    <table class="table table-hover pb-20">
        <thead>
            <tr class="table-primary text-center">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasksInProgress as $task)
            <tr class="text-center align-middle">
                <th scope="row" class="hover:underline cursor-pointer" onclick="toggleId(this, '{{ $task->id }}')">
                    {{ Str::limit($task->id, 10, '...') }}
                </th>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->date }}</td>
                <td>
                    <livewire:status-selector :taskId="$task->id" />
                </td>
                <td>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="changeIsUpdate(true)">
                        <i class="bi bi-pen-fill text-yellow-500 hover:bg-blue-200 p-2 rounded transition-all duration-300"></i>
                    </button>
                    <button type="button">
                        <i class="bi bi-trash3-fill text-red-500 hover:bg-blue-200 p-2 rounded transition-all duration-300"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection