<div class="mx-auto w-full max-w-lg mt-4">
    <div class="py-4 text-center text-xl">
        <span>Create Employee</span>
    </div>
    <div class="bg-white sm:px-6 lg:px-8 py-14">

        <x-jet-validation-errors class="mb-4" />

        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                    <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                        :value="old('first_name')" autofocus />
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                        :value="old('last_name')" />
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                    <x-jet-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number"
                        :value="old('phone_number')" />
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-jet-label for="profile_photo" value="{{ __('Profile Photo') }}" />
                    <x-jet-input id="profile_photo" class="block mt-1 w-full" type="file" name="profile_photo"
                        :value="old('profile_photo')" autofocus />
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-jet-label for="company_id" value="{{ __('Company') }}" />
                    <select id="company_id" name="company_id"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option selected disabled>Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->getRouteKey() }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-start mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Create') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>
