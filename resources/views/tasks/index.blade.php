@extends('layouts.app')

@section('title', 'Lista de Tareas')
@section('content')

<!-- This script launch succes or error message on screen -->
@if(session('success'))
<script>
    Swal.fire({
        title: "Deleted!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonText: "OK",
        confirmButtonColor: "oklch(0.623 0.214 259.815)"
    });
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        title: "Error!",
        text: "{{ session('error') }}",
        icon: "error",
        confirmButtonText: "OK",
        confirmButtonColor: "#d33"
    });
</script>
@endif


<section id="data-show" class="bg-white rounded-lg flex flex-col gap-3 p-10 max-md:p-3 h-full w-full overflow-auto fade-in">
    <!-- Modals -->
    <x-save-modal />

    <h1 class="text-2xl text-center text-gray-900 font-bold">Welcome to TO-DO task manager</h1>
    <!-- Button trigger modal -->

    <button type="button" class="btn btn-primary self-center" data-bs-toggle="modal" data-bs-target="#saveModal">
        Create new task
    </button>

    <div id="table-container" class="overflow-auto p-10">
        
        <livewire:tasks-table />

    </div>

    <a href="/in-progress" class="btn btn-primary self-end">
        View tasks in progress
    </a>
</section>
@endsection