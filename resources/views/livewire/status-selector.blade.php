<div>
    <x-status-indicator status="{{$status}}" class="dropdown-toggle" />

    <div class="dropdown">
        @php
        $availableStatus = ['completed', 'in-progress', 'canceled', 'not-start'];
        @endphp

        <div class="dropdown">

            <ul class="dropdown-menu">
                @foreach($availableStatus as $newStatus)
                <li class="dropdown-item" >
                    <button type="button" wire:click="updateStatus('{{ $newStatus }}')" class="flex gap-2 items-center justify-center">
                        {{ ucfirst($newStatus) }}
                        <div class="h-2 w-2 rounded-full
                        @if($newStatus === 'completed') bg-success
                        @elseif($newStatus === 'in-progress') bg-warning
                        @elseif($newStatus === 'canceled') bg-danger
                        @else bg-secondary @endif">
                        </div>
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>