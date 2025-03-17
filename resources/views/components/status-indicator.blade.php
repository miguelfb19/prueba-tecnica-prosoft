<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="flex items-center justify-center gap-2">
                <!-- <span>
                        @if ($status === 'completed') Completed
                        @elseif ($status === 'in-progress') In progress
                        @elseif ($status === 'canceled') Canceled
                        @else Not Start @endif
                </span> -->
                <span class="h-2 w-2 rounded-full
                        @if($status === 'completed') bg-success
                        @elseif($status === 'in-progress') bg-warning
                        @elseif($status === 'canceled') bg-danger
                        @else bg-secondary @endif">
                </span>
        </div>
</button>
<!-- <ul class="dropdown-menu">
        <li>
                <a class="dropdown-item" href="#">
                        <x-status-indicator status="completed" />
                </a>
        </li>
        <li>
                <a class="dropdown-item" href="#">
                        <x-status-indicator status="in-progress" />
                </a>
        </li>
        <li>
                <a class="dropdown-item" href="#">
                        <x-status-indicator status="canceled" />
                </a>
        </li>
        <li>
                <a class="dropdown-item" href="#">
                        <x-status-indicator status="" />
                </a>
        </li>
</ul> -->