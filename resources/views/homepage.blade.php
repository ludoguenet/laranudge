<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-4xl">
            @if ($nudge)
            <article class="text-md leading-8 text-gray-500 sm:text-lg mb-5">
                {{ $nudge->content }}
            </article>

            <pre>
                <x-torchlight-code language='php'>{!! $nudge->code !!}</x-torchlight-code>
            </pre>

            <figcaption class="mt-10">
                {{-- <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}
                <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                    <div class="font-semibold text-gray-900">{{ $nudge->user->name }}</div>
                    <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    <div class="text-gray-600">This {{ $randomSynonym }} <span class="text-green-500">nudge</span> was posted on {{ $nudge->created_at->format('m/d/Y') }}</div>
                </div>
            </figcaption>
            </figure>
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
