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
                        <h3 class="text-lg font-bold text-gray-800">Edit The Person</h3>
                    </div>

                    <form action="{{ route('person.update', $person->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <!-- Name Row (Two Columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="firstname" class="block text-sm font-semibold text-gray-700 mb-1">First Name</label>
                                <input type="text" name="firstname" id="firstname"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('firstname') border-red-500 @enderror"
                                    placeholder="John" value="{{ old('firstname', $person->firstname) }}">
                                @error('firstname')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="lastname" class="block text-sm font-semibold text-gray-700 mb-1">Last Name</label>
                                <input type="text" name="lastname" id="lastname"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('lastname') border-red-500 @enderror"
                                    placeholder="Doe" value="{{ old('lastname', $person->lastname) }}">
                                @error('lastname')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('email') border-red-500 @enderror"
                                placeholder="john.doe@example.com" value="{{ old('email', $person->email) }}">
                            @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Field -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">Phone Number</label>
                            <input type="text" name="phone" id="phone"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('phone') border-red-500 @enderror"
                                placeholder="+1 (555) 000-0000" value="{{ old('phone', $person->phone) }}">
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
                                <option value="{{ $business->id }}"
                                    @selected(old('business_id', $person->business_id) == $business->id)>
                                    {{ $business->business_name }}
                                </option>
                                @endforeach
                            </select>

                            @error('business_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2">Tags</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach($tags as $tag)
                                <label class="flex items-center space-x-2 bg-gray-50 border rounded-md px-3 py-2 cursor-pointer hover:bg-gray-100">

                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        class="rounded text-blue-600"
                                        {{ in_array($tag->id, old('tags', $person->tags->pluck('id')->toArray())) ? 'checked' : '' }}>

                                    <span class="text-sm">{{ $tag->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>


                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                            <!-- Cancel Button -->
                            <a href="{{ route('person.index') }}"
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition">
                                Cancel
                            </a>

                            <!-- Save Button with Manual Margin -->
                            <button type="submit"
                                class="ml-4 inline-block px-6 py-2 text-sm font-bold text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm transition">
                                Edit Person
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>