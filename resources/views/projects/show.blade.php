<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects > Detail') }}

            <a href="{{ $project->path() . '/edit' }}"
                class="justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Edit Project
            </a>
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                <!-- Description list-->
                <section aria-labelledby="applicant-information-title">
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
                                {{ $project->title }}
                            </h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $project->description }}</p>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <fieldset>
                                        <legend class="text-lg font-medium text-gray-900">Tasks</legend>
                                        <div class="mt-4 border-t border-b border-gray-200 divide-y divide-gray-200">
                                            @forelse ($project->tasks as $task)
                                                <form action="{{ $task->path() }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="relative flex items-start py-4">
                                                        <div class="min-w-0 flex-1 text-sm">
                                                            <input type="text" name="body"
                                                                value="{{ $task->body }}"
                                                                onchange="this.form.submit()"
                                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                        <div class="ml-3 flex items-center h-5">
                                                            <input name="completed" type="checkbox"
                                                                {{ $task->completed ? 'checked' : '' }}
                                                                onchange="this.form.submit()"
                                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                    </div>
                                                </form>
                                            @empty
                                            @endforelse

                                            <div class="relative flex items-start py-4">
                                                <div class="min-w-0 flex-1 text-sm">
                                                    <form action="{{ $project->path() . '/tasks' }}" method="POST">
                                                        @csrf

                                                        <div class="space-y-8 divide-y divide-gray-200">
                                                            <div
                                                                class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                                                <div class="sm:col-span-6">
                                                                    <div class="mt-1">
                                                                        <input type="text" name="body"
                                                                            placeholder="Begin adding tasks..."
                                                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </dl>
                        </div>
                    </div>
                </section>

                <!-- Comments-->
                <section aria-labelledby="notes-title">
                    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                        <div class="divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 id="notes-title" class="text-lg font-medium text-gray-900">General Notes</h2>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-6 sm:px-6">
                            <div class="flex space-x-3">
                                <div class="min-w-0 flex-1">
                                    <form action="{{ $project->path() }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <div>
                                            <label for="notes" class="sr-only">General Notes</label>
                                            <textarea id="notes" name="notes" rows="3" placeholder="Add a notes"
                                                class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md">{{ $project->notes }}</textarea>
                                        </div>

                                        <div class="mt-3 flex items-center justify-between">
                                            <button type="submit"
                                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Comment</button>
                                        </div>
                                    </form>

                                    @if ($errors->any)
                                        <div class="field mt-6">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-sm text-red">{{ $error }}</li>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <section aria-labelledby="activity-title" class="lg:col-start-3 lg:col-span-1">
                @include('projects.activity.card')
            </section>
        </div>
    </div>
</x-app-layout>
