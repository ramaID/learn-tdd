@csrf

<div class="space-y-8 divide-y divide-gray-200">
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700">
                Title
            </label>
            <div class="mt-1">
                <input type="text" name="title" id="title" autocomplete="title" value="{{ $project->title }}" required
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>

        <div class="sm:col-span-6">
            <label for="description" class="block text-sm font-medium text-gray-700">
                Description
            </label>
            <div class="mt-1">
                <textarea id="description" name="description" rows="3" required
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $project->description }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="pt-5">
    <div class="flex justify-end">
        <a href="{{ $project->path() }}"
            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancel
        </a>

        <button type="submit"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ $buttonText }}
        </button>
    </div>
</div>

@if ($errors->any)
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </div>
@endif
