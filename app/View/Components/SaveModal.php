<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaveModal extends Component
{
    // public $isUpdate = false;
    public function __construct()
    {
        // $this->isUpdate = $isUpdate;
    }

    public function render(): View|Closure|string
    {
        return view('components.save-modal');
    }
}
