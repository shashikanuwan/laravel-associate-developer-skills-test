<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10 m-7">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Logo
                </th>
                <th scope="col" class="px-6 py-3">
                    Cover Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Telephone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Website
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <img src="{{ Storage::disk('local')->url('public/logos/' . $company->logo) }}" alt="logo" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <img src="{{ Storage::disk('local')->url('public/cover-images/' . $company->cover_image) }}" alt="cover_image" class="inline-block h-10 w-10 rounded-full ring-2 ring-white">
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
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
                        <a href="{{route('company.edit', $company)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form action="{{route('company.destroy', $company)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    {{$companies->links()}}
</div>
