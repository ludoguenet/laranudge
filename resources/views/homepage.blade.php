<x-app-layout>
    <div class="relative isolate overflow-hidden bg-gradient-to-b from-emerald-100/20">
        <div class="absolute inset-y-0 right-1/2 -z-10 -mr-96 w-[200%] origin-top-right skew-x-[-30deg] bg-white shadow-xl shadow-emerald-600/10 ring-1 ring-emerald-50 sm:-mr-80 lg:-mr-96" aria-hidden="true"></div>
            <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-8">
                    <div class="mx-auto max-w-4xl">
                        @if ($nudge)
                        <x-nudge :nudge=$nudge :random-synonym=$randomSynonym />
                        @else
                        <div class="rounded-md bg-emerald-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1 md:flex md:justify-between">
                                    <p class="text-sm text-emerald-700">No nudge posted yet.</p>
                                    <p class="mt-3 text-sm md:ml-6 md:mt-0">
                                        <a href="{{ route('nudges.create') }}" class="whitespace-nowrap font-medium text-emerald-700 hover:text-emerald-600">
                                            Share the first nudge!
                                            <span aria-hidden="true"> &rarr;</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
    </div>
</x-app-layout>
