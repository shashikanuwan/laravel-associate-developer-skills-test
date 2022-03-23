<section class="antialiased px-4 mt-6">
    <div class="flex flex-col justify-center h-full">
        <div class="w-full max-w-5xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">All Employees</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold">Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold">Phone Number</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold">Company</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold">Edit</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold">Delete</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y">
                            @forelse ($employees as $employee)
                                <tr>
                                    <td class="p-2 ">
                                        <div class="">
                                            <div class="font-medium">{{ $employee->full_name }}</div>
                                            <img src="{{ Storage::disk('local')->url('public/employee-profile-photos/' . $employee->profile_photo) }}" alt="profile_photo" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-medium">{{ $employee->email }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-medium">{{ $employee->phone_number }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-medium">{{ $employee->company->name }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <a href="{{ route('employee.edit', $employee) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <form action="{{ route('employee.destroy', $employee) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 p-3 rounded relative my-6 w-full shadow" role="alert">
                                    <strong class="font-bold">oops!</strong>
                                    <span class="block sm:inline">Employee are not yet registered</span>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
