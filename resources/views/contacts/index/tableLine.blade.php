<tr>
    <x-table.td.text>
        {{ $contact->getFullName() }}
    </x-table.td.text>
    <x-table.td.action>
        <x-button.link href="{{ route('contacts.edit', $contact) }}">
            {{ __('Edit') }}
        </x-button.link>
    </x-table.td.action>
    <x-table.td.action>
        <form class="deleteForm" action="{{ route('contacts.destroy', $contact) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>
                {{ __('Delete') }}
            </x-button>
        </form>
    </x-table.td.action>
</tr>
