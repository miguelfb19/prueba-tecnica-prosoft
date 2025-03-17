<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>TO-DO App</title>
</head>

<script>
    let isUpdate = false

    const changeIsUpdate = (value) => {
        isUpdate = value;
        document.querySelector("#modal-title").textContent = isUpdate ? "Update task" : "New task";
        document.querySelector("#modal-btn-save").textContent = isUpdate ? "Update" : "Save";
        document.querySelector("#modal-btn-close").textContent = isUpdate ? "Cancel" : "Close";
    };
</script>

<body class="h-screen">
    <main class="bg-blue-500 h-full w-full flex p-16">
        <section id="data-show" class="bg-white rounded-lg flex flex-col gap-5 p-10 h-full w-full">
            <!-- Modal -->
            <x-custom-modal />
            <h1 class="text-2xl text-center text-gray-900 font-bold">Welcome to TO-DO task manager</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary self-center" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="changeIsUpdate(false)">
                Create new task
            </button>

            <table class="table table-hover">
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
                    <tr class="text-center">
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->date }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="changeIsUpdate(true)">
                                <i class="bi bi-pen-fill text-red-700"></i>
                            </button>
                            <button type="button" class="btn btn-danger">
                                <i class="bi bi-trash3-fill text-yellow-700"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </section>
    </main>

</body>

</html>