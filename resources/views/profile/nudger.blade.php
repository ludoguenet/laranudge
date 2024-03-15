<x-app-layout>
    <x-slot name="title">
        {{ $user->name }}
    </x-slot>

    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 px-8">

            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $user->name }}</h3>
            </div>

            <div>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Total nudges</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalNudges }}</dd>
                    </div>
                    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Nudges created this month</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $monthlyNudges }}</dd>
                    </div>
                    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Nudges liked</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $likedNudges }}</dd>
                    </div>
                </dl>
            </div>

        </div>
    </div>
</x-app-layout>
