<tr>
    <x-table.td.text>
        {{ $job->name }}
    </x-table.td.text>
    <x-table.td.text>
        {{ $job->label }}
    </x-table.td.text>
    <x-table.td.action>
        <x-button.link href="{{ route('jobs.edit', $job) }}">
            {{ __('Edit') }}
        </x-button.link>
    </x-table.td.action>
    <x-table.td.action>
        <form class="deleteForm" action="{{ route('jobs.destroy', $job) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>
                {{ __('Delete') }}
            </x-button>
        </form>
    </x-table.td.action>
</tr>
