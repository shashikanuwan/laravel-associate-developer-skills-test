<x-app-layout>

    <a href="{{ route('company.create') }}">Create</a>

    <x-company :companies="$companies" />

</x-app-layout>
