<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edition of the contact ":contact"', ['contact' => $contact->getFullName()]) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('contacts.edit.contactsEditForm')
        </div>
    </div>
</x-app-layout>