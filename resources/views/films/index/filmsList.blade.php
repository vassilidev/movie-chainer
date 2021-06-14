<x-table>
    <thead class="bg-gray-50">
    <tr>
        <x-table.th.text>
            {{ __('Film Title') }}
        </x-table.th.text>
        <x-table.th.text>
            {{ __('Year') }}
        </x-table.th.text>
        <x-table.th.text>
            {{ __('Contacts') }}
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
    @forelse($films as $film)
        @include('films.index.tableLine', $film)
    @empty
        <tr>
            <td colspan="100%">{{ __('No data') }}</td>
        </tr>
    @endforelse
    </tbody>
</x-table>
