<x-card>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div>
            <x-label for="name" :value="__('Name')"/>
            <x-input id="name" type="text" name="name" :value="old('name')" required autofocus
                     class="block mt-1 w-full"/>
        </div>

        <div class="mt-4">
            <x-label for="label" :value="__('Label')"/>
            <x-input id="label" type="text" name="label" :value="old('label')" required
                     class="block mt-1 w-full"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-3">
                {{ __('Create') }}
            </x-button>
        </div>
    </form>
</x-card>
