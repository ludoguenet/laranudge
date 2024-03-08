<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Admin Dashboard</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all members nudges and their status.</p>
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
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($nudges as $nudge)
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm">
                                            <div class="flex items-center">
                                                <div x-data="" x-on:click.prevent="$dispatch('open-modal', 'nudge-preview-{{ $nudge->id }}')" class="flex-shrink-0 hover:cursor-pointer hover:text-green-500 transition ease-in-out duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                                                    </svg>
                                                </div>
                                                <x-modal name="nudge-preview-{{ $nudge->id }}" max-width="4xl" focusable>
                                                    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                                                        <div class="px-4 py-5 sm:px-6 text-gray-500">
                                                            You're currently viewing the code for the tip.
                                                        </div>
                                                        <div class="px-4 py-5 sm:p-6">
                                                            <pre>
                                                                <x-torchlight-code language='php'>{!! $nudge->code !!}</x-torchlight-code>
                                                            </pre>
                                                        </div>
                                                    </div>
                                                </x-modal>
                                                <div class="ml-4">
                                                    <div class="text-gray-500" title="{{ $nudge->content }}">{{ Str::limit($nudge->title, 70) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <span>{{ $nudge->user->name }}</span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <span class="inline-flex items-center rounded-md bg-{{ $nudge->validated === true ? 'green' : 'red' }}-50 px-2 py-1 text-xs font-medium text-{{ $nudge->validated === true ? 'green' : 'red' }}-700 ring-1 ring-inset ring-{{ $nudge->validated === true ? 'green' : 'red' }}-600/20">{{ $nudge->validated === true ? 'validated' : 'not validated' }}</span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ $nudge->created_at->format('m/d/Y') }}</td>
                                        <td class="flex items-center space-x-5 relative whitespace-nowrap py-5 pl-3 pr-4 text-left text-sm font-medium sm:pr-0">
                                            <a href="{{ route('admin.nudges.edit', $nudge) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            @include('nudges.partials.delete-nudge-form', ['nudgeId' => $nudge->id])
                                            <!-- Enabled: "bg-green-500", Not Enabled: "bg-gray-200" -->
                                            <button x-data="toggles({{ $nudge->validated }})" @click="toggle({{ $nudge->id }})" type="button" :class="isToggled ? 'bg-green-500' : 'bg-gray-200'" class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2" role="switch" aria-checked="false">
                                                <span class="sr-only">Use setting</span>
                                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                <span aria-hidden="true" :class="isToggled ? 'translate-x-5' : 'translate-x-0'" class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                            </button>
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
                        <p class="mt-2 text-sm text-gray-700">No nudge at the moment.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('toggles', (initialToggleState = false) => ({
                isToggled: initialToggleState,

                async toggle(nudge) {
                    this.isToggled = !this.isToggled;
                    await axios.get('/sanctum/csrf-cookie')
                        .then(async () => await axios.put(`/api/admin/nudges/${nudge}/validate`));
                }
            }));
        });

    </script>
    @endpush
</x-app-layout>
