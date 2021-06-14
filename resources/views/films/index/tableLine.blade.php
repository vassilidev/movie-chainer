<tr>
    <x-table.td.text>
        {{ $film->title }}
    </x-table.td.text>
    <x-table.td.text>
        {{ $film->year }}
    </x-table.td.text>
    <x-table.td.text>
        {{ $film->contacts_count }}
    </x-table.td.text>
    <x-table.td.action>
        <x-button.link href="{{ route('films.edit', $film) }}">
            {{ __('Edit') }}
        </x-button.link>
    </x-table.td.action>
    <x-table.td.action>
        <form class="deleteForm" action="{{ route('films.destroy', $film) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>
                {{ __('Delete') }}
            </x-button>
        </form>
    </x-table.td.action>
</tr>
