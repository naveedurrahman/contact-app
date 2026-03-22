<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Person') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Add New Person</h3>
                        <p class="text-sm text-gray-600">Enter the details below to register a new person in the system.</p>
                    </div>

                    <form action="{{ route('person.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="firstname" class="block text-sm font-semibold text-gray-700 mb-1">First Name</label>
                                <input type="text" name="firstname" id="firstname"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('firstname') border-red-500 @enderror"
                                    placeholder="John" value="{{ old('firstname') }}">
                                @error('firstname')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="lastname" class="block text-sm font-semibold text-gray-700 mb-1">Last Name</label>
                                <input type="text" name="lastname" id="lastname"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('lastname') border-red-500 @enderror"
                                    placeholder="Doe" value="{{ old('lastname') }}">
                                @error('lastname')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('email') border-red-500 @enderror"
                                placeholder="john.doe@example.com" value="{{ old('email') }}">
                            @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">Phone Number</label>
                            <input type="text" name="phone" id="phone"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('phone') border-red-500 @enderror"
                                placeholder="+1 (555) 000-0000" value="{{ old('phone') }}">
                            @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="business_id" class="block text-sm font-semibold text-gray-700 mb-1">Business</label>
                            <select name="business_id" id="business_id"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('business_id') border-red-500 @enderror">

                                <option value="" selected disabled>Select a Business</option>

                                @foreach($businesses as $business)
                                <option value="{{$business->id}}"
                                    {{ old('business_id') == $business->id ? 'selected' : '' }}>
                                    {{ $business->business_name }}
                                </option>
                                @endforeach
                            </select>

                            @error('business_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach($tags as $tag)
                                <label class="flex items-center space-x-2 bg-gray-50 border rounded-md px-3 py-2 cursor-pointer hover:bg-gray-100">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        class="rounded text-blue-600 focus:ring-blue-500"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-700">{{ $tag->name }}</span>
                                </label>
                                @endforeach
                            </div>
                            @error('tags')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                            <a href="{{ route('person.index') }}"
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                class="ml-4 inline-block px-6 py-2 text-sm font-bold text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm transition">
                                Save Person
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>