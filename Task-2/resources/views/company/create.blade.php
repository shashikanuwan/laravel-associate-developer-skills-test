<x-app-layout>

    <div class="mx-auto w-full max-w-lg mt-4">
        <div class="py-4 text-center text-xl">
            <span>Create Company</span>
        </div>
        <div class="bg-white sm:px-6 lg:px-8 py-12">

            <x-jet-validation-errors class="mb-4" />

            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            autofocus />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" />
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-jet-label for="telephone" value="{{ __('Telephone Number') }}" />
                        <x-jet-input id="telephone" class="block mt-1 w-full" type="text" name="telephone"
                            :value="old('telephone')" />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-jet-label for="website" value="{{ __('Website') }}" />
                        <x-jet-input id="website" class="block mt-1 w-full" type="text" name="website"
                            :value="old('website')" />
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-jet-label for="logo" value="{{ __('Logo') }}" />
                        <x-jet-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')"
                            autofocus />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-jet-label for="cover_image" value="{{ __('Cover Image') }}" />
                        <x-jet-input id="cover_image" class="block mt-1 w-full" type="file" name="cover_image"
                            :value="old('cover_image')" />
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

</x-app-layout>
