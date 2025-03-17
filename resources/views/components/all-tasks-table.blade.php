<!-- This script launch confrmation alert before delete task -->
<script>
    function confirmDelete(button) {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to delete this task?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest("form").submit(); // Submit form to delete task
            }
        });
    }
</script>
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
        @foreach ($tasks as $task)
        <tr class="text-center align-middle">
            <th scope="row">{{ $task->id }}</th>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ \Carbon\Carbon::parse($task->date)->translatedFormat('d \d\e F, Y') }}</td>
            <td>
                <x-status-indicator status="{{$task -> status}}" class="dropdown-toggle" />
                <div class="dropdown">
                    <ul class="dropdown-menu">
                        <li class="ml-5">
                            <form action="">
                                <button class="dropdown-item">
                                    <x-status-indicator status="completed" />
                                </button>
                            </form>
                        </li>
                        <li class="ml-5">
                            <form action="">
                                <button class="dropdown-item">
                                    <x-status-indicator status="in-progress" />
                                </button>
                            </form>
                        </li>
                        <li class="ml-5">
                            <form action="">
                                <button class="dropdown-item">
                                    <x-status-indicator status="canceled" />
                                </button>
                            </form>
                        </li>
                        <li class="ml-5">
                            <form action="">
                                <button class="dropdown-item">
                                    <x-status-indicator status="" />
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
            <td class="flex justify-center items-center min-h-[4rem]">
                <button type="submit" data-bs-toggle="modal" data-bs-target="#{{$task->id}}">
                    <i class="bi bi-pen-fill text-yellow-500 hover:bg-blue-200 p-2 rounded transition-all duration-300"></i>
                </button>
                <x-update-modal :task="$task" />

                <form action="{{ route('task.destroy', $task->id) }}" method="post" class="h-24 md:h-auto flex place-content-center">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete(this)">
                        <i class="bi bi-trash3-fill text-red-500 hover:bg-blue-200 p-2 rounded transition-all duration-300"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        <ul class="dropdown-menu">
        </ul>
    </tbody>
</table>