<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="mx-auto max-w-3xl">
            @if ($tip)
            <article class="text-lg leading-8 text-gray-600 mb-10">
                {{ $tip->content }}
            </article>

            <pre>
                <x-torchlight-code language='php'>{!! $tip->code !!}</x-torchlight-code>
            </pre>
            @else
            No tip posted yet.
            @endif
        </div>
    </div>
</x-app-layout>
