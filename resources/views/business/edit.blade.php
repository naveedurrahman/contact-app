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
                        <h3 class="text-lg font-bold text-gray-800">Edit The Business</h3>
                    </div>

                    <form action="{{ route('business.update', $business->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="business_name" class="block text-sm font-semibold text-gray-700 mb-1">First Name</label>
                            <input type="text" name="business_name" id="business_name"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('business_name') border-red-500 @enderror"
                                placeholder="John" value="{{ old('business_name', $business->business_name) }}">
                            @error('business_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="contact_email" id="contact_email"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 @error('contact_email') border-red-500 @enderror"
                                placeholder="john.doe@example.com" value="{{ old('contact_email', $business->contact_email) }}">
                            @error('contact_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Categories</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach($categories as $category)
                                <label class="flex items-center space-x-2 bg-gray-50 border rounded-md px-3 py-2 cursor-pointer hover:bg-gray-100">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                        {{ in_array($category->id, old('categories', $business->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-700">{{ $category->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2">Tags</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach($tags as $tag)
                                <label class="flex items-center space-x-2 bg-gray-50 border rounded-md px-3 py-2 cursor-pointer hover:bg-gray-100">

                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        class="rounded text-blue-600"
                                        {{ in_array($tag->id, old('tags', $business->tags->pluck('id')->toArray())) ? 'checked' : '' }}>

                                    <span class="text-sm">{{ $tag->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                            <a href="{{ route('business.index') }}"
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition">
                                Cancel
                            </a>

                            <!-- Save Button with Manual Margin -->
                            <button type="submit"
                                class="ml-4 inline-block px-6 py-2 text-sm font-bold text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm transition">
                                Edit Business
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>