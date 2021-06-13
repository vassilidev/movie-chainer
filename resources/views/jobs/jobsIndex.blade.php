<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs list') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('jobs.index.jobsCreateForm')

            <x-table>
                <thead class="bg-gray-50">
                <tr>
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
                @forelse($jobs as $job)
                    @include('jobs.index.tableLine', $job)
                @empty
                    {{ __('No data') }}
                @endforelse
                </tbody>
            </x-table>
        </div>
    </div>

</x-app-layout>
