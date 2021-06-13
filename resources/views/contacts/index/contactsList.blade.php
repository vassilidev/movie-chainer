<x-table>
    <thead class="bg-gray-50">
    <tr>
        <x-table.th.text>
            {{ __('Gender') }}
        </x-table.th.text>
        <x-table.th.text>
            {{ __('Name') }}
        </x-table.th.text>
        <x-table.th.text>
            {{ __('Label') }}
        </x-table.th.text>
        <x-table.th.action>
            <span class="sr-only">{{ __('Edit') }}</span>
        </x-table.th.action>
        <x-table.th.action>
            <span class="sr-only">{{ __('Delete') }}</span>
        </x-table.th.action>
    </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @forelse($contacts as $contact)
        @include('contacts.index.tableLine', $contact)
    @empty
        {{ __('No data') }}
    @endforelse
    </tbody>
</x-table>
