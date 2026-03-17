<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2">
                        <div class="bg-gray-50 p-5 rounded-lg shadow mb-6">
                            <h3 class="text-lg font-bold mb-4">Business Detail</h3>

                            <p><span class="font-semibold">Name:</span> {{$business->business_name }}</p>
                            <p><span class="font-semibold">Email:</span> {{ $business->contact_email }}</p>
                            <p><span class="font-semibold">Business Category:</span>
                                @if($business->categories->count())
                                {{ $business->categories->pluck('name')->join(', ') }}
                                @else
                                <span class="text-gray-400 italic">Nill</span>
                                @endif
                            </p>
                        </div>

                        <div class="bg-white p-5 rounded-lg shadow">
                            <h3 class="text-lg font-bold mb-4">All Tasks</h3>

                            @forelse($business->tasks->sortByDesc('created_at') as $task)
                            <div class="border rounded-lg p-4 mb-3 hover:shadow transition">

                                <div class="flex justify-between items-center">
                                    <h5 class="font-semibold text-gray-800">{{ $task->title }}</h5>

                                    @if($task->status == 'open')
                                    <form action="{{ route('task.status', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700 hover:bg-yellow-200">
                                            Open
                                        </button>
                                    </form>
                                    @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                        Completed
                                    </span>
                                    @endif
                                </div>

                                <p class="text-sm text-gray-600 mt-2">{{ $task->description }}</p>

                            </div>
                            @empty
                            <p class="text-gray-400">No tasks found.</p>
                            @endforelse

                        </div>

                    </div>

                    <!-- Task Section -->
                    <div>
                        <h3 class="text-lg font-bold mb-6">Create Task</h3>

                        <form action="{{route('task.store')}}" method="POST" class="mb-6 bg-gray-50 p-4 rounded-lg border">
                            @csrf
                            <input type="hidden" name="taskable_id" value="{{$business->id}}">
                            <input type="hidden" name="taskable_type" value="business">

                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" name="title"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-500 @enderror">
                                @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="description" rows="3"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror"></textarea>
                                @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700">
                                Create Task
                            </button>
                        </form>
                    </div>

                </div>


                <div class="flex justify-start mt-5">
                    <a href="{{ route('business.index') }}"
                        class="inline-block px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>