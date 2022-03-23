<x-app-layout>

    <x-alart />

    <div class="mt-10 m-7 text-center">
        <a href="{{ route('company.create') }}" class=" bg-lime-500 hover:bg-lime-600 active:bg-lime-700  focus:ring focus:ring-lime-300 rounded-sm px-4 py-2">Create New Company</a>
    </div>

    <x-company-show :companies="$companies" />

</x-app-layout>
