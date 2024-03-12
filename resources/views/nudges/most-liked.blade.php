<x-app-layout>
    <x-slot name="title">
        Most liked nudges
    </x-slot>

    <div class="relative isolate overflow-hidden bg-gradient-to-b from-rose-100/20">
        <div class="absolute inset-y-0 right-1/2 -z-10 -mr-96 w-[200%] origin-top-right skew-x-[-30deg] bg-white shadow-xl shadow-rose-600/10 ring-1 ring-rose-50 sm:-mr-80 lg:-mr-96" aria-hidden="true"></div>
        <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($nudges as $nudge)
                        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                            <div class="flex w-full items-center justify-between space-x-6 p-6">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="truncate text-sm font-medium text-gray-900">{{ $nudge->title }}</h3>
                                        <span class="inline-flex flex-shrink-0 items-center gap-1 px-1.5 py-0.5 text-xs font-medium">
                                              <div class="text-gray-400 text-xs">{{ $nudge->likes_count }}</div>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-3 text-emerald-300">
                                                <path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <p class="mt-1 truncate text-sm text-gray-500">{{ $nudge->content }}</p>
                                </div>
                            </div>
                            <div>
                                <div class="-mt-px flex divide-x divide-gray-200">
                                    <div class="flex w-0 flex-1">
                                        <a href="{{ route('nudges.show', $nudge) }}" class="bg-green-50 hover:bg-gray-50 hover:text-emerald-600 relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900 transition duration-150 ease-in-out">
                                            View the code
                                        </a>
                                    </div>
                                        <div class="-ml-px flex w-0 flex-1">
                                            <span class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm text-gray-600">
                                                by {{ $nudge->user->name }}
                                            </span>
                                        </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
    </div>
</x-app-layout>
