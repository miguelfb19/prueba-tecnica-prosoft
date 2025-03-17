<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class allTasksTable extends Component
{
    public $tasks;
    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function render(): View|Closure|string
    {
        return view('components.all-tasks-table');
    }
}
