<section class="antialiased px-4 mt-6">
    <div class="flex flex-col justify-center h-full">
        <div class="w-full max-w-5xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">All Companies</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold"> Logo</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold"> Cover Image</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold"> Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold"> Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold">Telephone Number</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold"> Website</div>
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
                            @forelse ($companies as $company)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <img src="{{ Storage::disk('local')->url('public/logos/' . $company->logo) }}" alt="logo" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <img src="{{ Storage::disk('local')->url('public/cover-images/' . $company->cover_image) }}" alt="cover_image" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $company->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $company->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $company->telephone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ $company->website }}" target="new">{{ $company->website }}</a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('company.edit', $company) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{ route('company.destroy', $company) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
