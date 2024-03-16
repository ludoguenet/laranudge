<x-app-layout>
    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Dashboard</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all your nudges and their status.</p>
                    </div>
                </div>
                @if($nudges->isNotEmpty())
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Title</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($nudges as $nudge)
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm">
                                            <div class="text-gray-500">{{ Str::limit($nudge->title, 70) }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <span class="inline-flex items-center rounded-md bg-{{ $nudge->validated === true ? 'green' : 'red' }}-50 px-2 py-1 text-xs font-medium text-{{ $nudge->validated === true ? 'green' : 'red' }}-700 ring-1 ring-inset ring-{{ $nudge->validated === true ? 'green' : 'red' }}-600/20">{{ $nudge->validated === true ? 'validated' : 'not validated yet' }}</span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ $nudge->created_at->format('m/d/Y') }}</td>
                                        <td class="flex items-center gap-2 relative whitespace-nowrap py-5 pl-3 pr-4 text-left text-sm font-medium sm:pr-0">
                                            <div x-data="" x-on:click.prevent="$dispatch('open-modal', 'nudge-preview-{{ $nudge->id }}')" class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-4 hover:cursor-pointer hover:text-gray-400 transition ease-in-out duration-300">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z" />
                                                </svg>

                                            </div>
                                            <x-modal name="nudge-preview-{{ $nudge->id }}" max-width="4xl">
                                                <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                                                    <div class="px-4 py-5 sm:px-6 text-gray-500">
                                                        You're currently viewing the code for your tip.
                                                    </div>
                                                    <div class="px-4 py-5 sm:p-6">
                                                        <pre>
                                                            <x-torchlight-code language='php'>{!! $nudge->code !!}</x-torchlight-code>
                                                        </pre>
                                                    </div>
                                                </div>
                                            </x-modal>
                                            @include('nudges.partials.delete-nudge-form', ['nudgeId' => $nudge->id])
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                <div class="sm:flex sm:items-center mt-5">
                    <div class="sm:flex-auto">
                        <p class="mt-2 text-sm text-gray-700">You have shared no nudge.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
