<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Add New Business</h3>
                        <p class="text-sm text-gray-600">Enter the details below to register a new business in the system.</p>
                    </div>

                    <form action="{{ route('business.store') }}" method="POST" class="space-y-6">
                        @csrf


                        <div>
                            <label for="business_name" class="block text-sm font-semibold text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="business_name" id="business_name"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('business_name') border-red-500 @enderror"
                                placeholder="Enter Business name here." value="{{ old('business_name') }}">
                            @error('business_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="contact_email" id="contact_email"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('email') border-red-500 @enderror"
                                placeholder="Enter email here." value="{{ old('contact_email') }}">
                            @error('contact_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                            <a href="{{ route('business.index') }}"
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                class="ml-4 inline-block px-6 py-2 text-sm font-bold text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm transition">
                                Save Business
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>