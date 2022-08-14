<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 py-4">
        <h1 class="sr-only">Profile</h1>
        <!-- Main 3 column grid -->
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <!-- Left column -->
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                <!-- Welcome panel -->
                <section aria-labelledby="profile-overview-title">
                    <div class="rounded-lg bg-white overflow-hidden shadow">
                        <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                        <div class="bg-white p-6">
                            <div class="sm:flex sm:items-center sm:justify-between">
                                <div class="sm:flex sm:space-x-5">
                                    <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                        <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                        <p class="text-xl font-bold text-gray-900 sm:text-2xl">
                                            {{ auth()->user()->name }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-5 flex justify-center sm:mt-0">
                                    <a href="/projects/create"
                                        class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Create Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Actions panel -->
                <section aria-labelledby="quick-links-title">
                    <div
                        class="bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
                        @foreach ($projects as $project)
                            <div
                                class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                                <h3 class="text-lg font-medium">
                                    <a href="{{ $project->path() }}" class="focus:outline-none">
                                        <!-- Extend touch target to entire panel -->
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        {{ $project->title }}
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">{{ $project->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">
                <!-- Announcements -->
                <section aria-labelledby="announcements-title">
                    <div class="rounded-lg bg-white overflow-hidden shadow">
                        <div class="p-6">
                            <h2 class="text-base font-medium text-gray-900" id="announcements-title">Announcements
                            </h2>
                            <div class="flow-root mt-6">
                                <ul role="list" class="-my-5 divide-y divide-gray-200">
                                    <li class="py-5">
                                        <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                            <h3 class="text-sm font-semibold text-gray-800">
                                                <a href="#" class="hover:underline focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Office closed on July 2nd
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">Cum qui rem deleniti.
                                                Suscipit in dolor veritatis sequi aut. Vero ut earum quis deleniti.
                                                Ut a sunt eum cum ut repudiandae possimus. Nihil ex tempora neque
                                                cum consectetur dolores.</p>
                                        </div>
                                    </li>

                                    <li class="py-5">
                                        <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                            <h3 class="text-sm font-semibold text-gray-800">
                                                <a href="#" class="hover:underline focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    New password policy
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">Alias inventore ut
                                                autem optio voluptas et repellendus. Facere totam quaerat quam quo
                                                laudantium cumque eaque excepturi vel. Accusamus maxime ipsam
                                                reprehenderit rerum id repellendus rerum. Culpa cum vel natus. Est
                                                sit autem mollitia.</p>
                                        </div>
                                    </li>

                                    <li class="py-5">
                                        <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                            <h3 class="text-sm font-semibold text-gray-800">
                                                <a href="#" class="hover:underline focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Office closed on July 2nd
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">Tenetur libero
                                                voluptatem rerum occaecati qui est molestiae exercitationem.
                                                Voluptate quisquam iure assumenda consequatur ex et recusandae.
                                                Alias consectetur voluptatibus. Accusamus a ab dicta et. Consequatur
                                                quis dignissimos voluptatem nisi.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
