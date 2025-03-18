<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class StatusSelector extends Component
{
    public $taskId;
    public $status;

    public function mount(string $taskId)
    {
        $this->taskId = $taskId;
        $this->status = Task::find($taskId)?->status ?? 'not-start';
    }

    public function updateStatus($newStatus)
    {
        Task::where('id', $this->taskId)->update(['status' => $newStatus]);
        $this->status = $newStatus;
    }


    public function render()
    {
        return view('livewire.status-selector');
    }
}
