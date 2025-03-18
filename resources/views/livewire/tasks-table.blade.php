<div>
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

        function toggleId(element, fullId) {
            if (element.innerText.includes("...")) {
                element.innerText = fullId; // Show complete ID
            } else {
                element.innerText = fullId.length > 10 ? fullId.substring(0, 10) + "..." : fullId; // Cut again
            }
        }
    </script>

    <!-- FILTERS -->
    <div id="form-group" class="flex max-md:flex-col justify-center items-center gap-3 mb-3">
        <input type="search" wire:model.live="search" placeholder="Search by name" class="form-control">

        <input type="date" wire:model.live="searchDate" class="form-control">

        <select wire:model.live="searchStatus" class="form-control">
            <option value="">All Status</option>
            <option value="completed">Completed</option>
            <option value="in-progress">In Progress</option>
            <option value="canceled">Canceled</option>
            <option value="not-start">Not Start</option>
        </select>
    </div>

    <!-- TABLE -->
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
            <tr class="text-center align-middle" wire:key="task-{{ $task->id }}">
                <th scope="row" class="hover:underline cursor-pointer" onclick="toggleId(this, '{{ $task->id }}')">
                    {{ Str::limit($task->id, 10, '...') }}
                </th>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ \Carbon\Carbon::parse($task->date)->translatedFormat('d \d\e F, Y') }}</td>
                <td>
                    <livewire:status-selector :taskId="$task->id" wire:key="status-{{ $task->id }}"/>
                </td>
                <td class="flex justify-center items-center min-h-[4rem]">
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#{{$task->id}}">
                        <i class="bi bi-pen-fill text-yellow-500 hover:bg-blue-200 p-2 rounded transition-all duration-300"></i>
                    </button>
                    <x-update-modal :task="$task" />
                    <form action="{{ route('task.destroy', $task->id) }}" method="post" class="h-24 lg:h-auto flex place-content-center">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete(this)">
                            <i class="bi bi-trash3-fill text-red-500 hover:bg-blue-200 p-2 rounded transition-all duration-300"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>