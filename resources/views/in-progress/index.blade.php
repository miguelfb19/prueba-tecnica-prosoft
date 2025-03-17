@extends('layouts.app')

@section('content')
<section id="task-in-progress" class="bg-white rounded-lg flex flex-col gap-5 p-10 h-full w-full overflow-auto fade-in">
    <div class="flex justify-center items-center">
        <a href="/" class="btn btn-outline-primary flex place-content-center px-1 py-0">
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
                <th scope="row">{{ $task->id }}</th>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->date }}</td>
                <td>
                    <div class="dropdown">

                        <x-status-indicator status="{{$task -> status}}" class="dropdown-toggle" />

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <x-status-indicator status="completed" />
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <x-status-indicator status="in-progress" />
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <x-status-indicator status="canceled" />
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <x-status-indicator status="" />
                                </a>
                            </li>
                        </ul>
                    </div>
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

            <ul class="dropdown-menu">

            </ul>


        </tbody>
    </table>
</section>
@endsection