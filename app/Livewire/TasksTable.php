<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TasksTable extends Component
{
    public $search = '';
    public $searchDate = '';
    public $searchStatus = '';
    public $tasks;

    public function getTasksProperty()
    {
        return Task::all();
    }

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function filterTable()
    {
        // Filtrar el array directamente sin modificar la base de datos
        $this->tasks = array_values(array_filter($this->tasks, function ($task) {
            return (!$this->search || stripos($task['name'], $this->search) !== false)
                && (!$this->searchDate || $task['date'] === $this->searchDate)
                && (!$this->searchStatus || $task['status'] === $this->searchStatus);
        }));
    }

    public function render()
    {
        return view('livewire.tasks-table');
    }
}
