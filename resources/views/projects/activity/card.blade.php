<div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
    <h2 id="activity-title" class="text-lg font-medium text-gray-900">Activity</h2>

    <!-- Activity Feed -->
    <div class="mt-6 flow-root">
        <ul role="list" class="-mb-8">
            @foreach ($project->activity as $activity)
                <li>
                    <div class="relative pb-8">
                        @if (! $loop->last)
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                aria-hidden="true"></span>
                        @endif

                        <div class="relative flex space-x-3">
                            <div>
                                <span
                                    class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                <div>
                                    <p class="text-sm text-gray-500">{{ $activity->description }}</p>
                                </div>
                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                    <time
                                        datetime="{{ $activity->created_at }}">{{ $activity->created_at->diffForHumans(null, true) }}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
