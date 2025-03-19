<button type="submit" data-bs-toggle="dropdown" aria-expanded="false" class="navbar-toggler" data-bs-auto-close="outside">
    <div class="flex max-md:flex-col items-center justify-center gap-2 hover:bg-blue-200 p-2 rounded transition-all duration-300">
        <?php
            $statusText = match($status) {
                'completed' => 'Completed',
                'in-progress' => 'In progress',
                'canceled' => 'Canceled',
                default => 'Not Start'
            };

            $statusColor = match($status) {
                'completed' => 'bg-success',
                'in-progress' => 'bg-warning',
                'canceled' => 'bg-danger',
                default => 'bg-secondary'
            };
        ?>

        <span>{{ $statusText }}</span>
        <span class="h-2 w-2 rounded-full {{ $statusColor }}"></span>
    </div>
</button>
