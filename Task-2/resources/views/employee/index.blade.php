<x-app-layout>

    <x-alart />

    <div class="mt-10 m-7 text-center">
        <a href="{{ route('employee.create') }}"class=" bg-lime-500 hover:bg-lime-600 active:bg-lime-700  focus:ring focus:ring-lime-300 rounded-sm px-4 py-2">Create New Employee</a>
    </div>

    <x-show-employee :employees="$employees" />

</x-app-layout>
