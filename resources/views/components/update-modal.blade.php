<div class="modal fade" id="{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-title">
                    Update Task
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body flex">
                <form class="flex flex-col w-full justify-center m-4 gap-3" action="{{ route('task.update', $task->id) }}" method="post">
                    <!-- Here, i might to add a csrf instruction to get information from the form in the controller -->
                    @csrf
                    @method('PUT')
                    <div id="form-group" class="flex gap-4 max-md:flex-col self-center">
                        <input value="{{$task->name}}" type="text" name="name" id="name" placeholder="Enter task name" class="custom-input" required>
                        <input value="{{$task->description}}" type="text" name="description" id="description" placeholder="Enter task description" class="custom-input" required>
                    </div>
                    <hr class="h-[1px] border-0 bg-gray-500">
                    <div class="flex justify-end gap-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="modal-btn-close">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="modal-btn-save">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>