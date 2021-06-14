<x-card>
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form action="{{ route('films.store') }}" method="POST">
        @csrf
        <div>
            <x-label for="title" :value="__('Film Title')"/>
            <x-input id="title" type="text" name="title" :value="old('title')" required
                     class="block mt-1 w-full"/>
        </div>

        <div class="my-4">
            <x-label for="year" :value="__('Year')"/>
            <x-input id="year" type="number" min="1895" max="3000" step="1" name="year"
                     :value="old('year') ?? date('Y')" required class="block mt-1 w-full"/>
        </div>

        <hr>

        <h5 class="font-semibold my-2 text-xl text-gray-500 leading-tight">
            {{ __('Contacts') }}
        </h5>

        @foreach(\App\Models\Job::all() as $job)
            <div class="my-4">
                <x-label :for="$job->label" :value="$job->name"/>

                <select name="contacts[{{$job->id}}][]" multiple="multiple"
                        id="{{$job->label}}"
                        class="select2 h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none
                                focus:shadow-outline block my-1 w-full">
                </select>
            </div>
        @endforeach

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-3">
                {{ __('Create') }}
            </x-button>
        </div>
    </form>
</x-card>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            ajax: {
                url: '{{ route('contacts.fullName') }}',
                delay: 250,
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
            }
        });

        $('.select2').on('select2:opening select2:closing', function (event) {
            let $searchfield = $(this).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });
    });
</script>
