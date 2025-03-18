<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TasksTable extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $search = '';
    public $searchDate = '';
    public $searchStatus = '';

    public function render()
    {
        $query = Task::query();

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->searchDate)) {
            $query->whereDate('date', $this->searchDate);
        }

        if (!empty($this->searchStatus)) {
            $query->where('status', $this->searchStatus);
        }

        return view('livewire.tasks-table', [
            'tasks' => $query->get()
        ]);
    }
}

