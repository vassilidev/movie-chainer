<x-card>
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div>
            <x-label for="gender" :value="__('Gender')"/>
            <div class="relative inline-block w-full text-gray-700">
                <select name="gender" id="gender" required autofocus
                        class="h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline block my-1 w-full">
                    <option value="mr">Mr</option>
                    <option value="mme" {{ old('gender') == 'mme' ? 'selected' : '' }}>Mme</option>
                </select>
            </div>
        </div>
        <div>
            <x-label for="name" :value="__('Name')"/>
            <x-input id="name" type="text" name="name" :value="old('name')" required
                     class="block mt-1 w-full"/>
        </div>

        <div class="mt-4">
            <x-label for="surname" :value="__('Surname')"/>
            <x-input id="surname" type="text" name="surname" :value="old('surname')" required
                     class="block mt-1 w-full"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-3">
                {{ __('Create') }}
            </x-button>
        </div>
    </form>
</x-card>
