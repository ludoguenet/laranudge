<x-app-layout>
    <x-slot name="title">
        {{ $nudge->title }}
    </x-slot>

    <div class="px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-4xl">
            @if ($nudge)
            <x-nudge :nudge=$nudge :random-synonym=$randomSynonym />
            @else
            <div class="rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-sm text-green-700">No nudge posted yet.</p>
                        <p class="mt-3 text-sm md:ml-6 md:mt-0">
                            <a href="{{ route('nudges.create') }}" class="whitespace-nowrap font-medium text-green-700 hover:text-green-600">
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
</x-app-layout>
