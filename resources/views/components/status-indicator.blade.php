<button type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="flex max-md:flex-col items-center justify-center gap-2 hover:bg-blue-200 p-2 rounded transition-all duration-300">
                <span>
                        @if ($status === 'completed') Completed
                        @elseif ($status === 'in-progress') In progress
                        @elseif ($status === 'canceled') Canceled
                        @else Not Start @endif
                </span>
                <span class="h-2 w-2 rounded-full
                                @if($status === 'completed') bg-success
                                @elseif($status === 'in-progress') bg-warning
                                @elseif($status === 'canceled') bg-danger
                                @else bg-secondary @endif">
                </span>
        </div>
</button>