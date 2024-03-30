<x-app-layout>
    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <x-admin-stats
                    :subscribers-count=$subscribersCount
                    :subscribers-variation-percentage=$subscribersVariationPercentage
                />

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
                                            <div class="text-gray-500">{{ Str::limit($nudge->title, 70) }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <span>{{ $nudge->user->name }}</span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                            <span class="inline-flex items-center rounded-md bg-{{ $nudge->status->colour() }}-50 px-2 py-1 text-xs font-medium text-{{ $nudge->status->colour() }}-700 ring-1 ring-inset ring-{{ $nudge->status->colour() }}-600/20">{{ $nudge->status->label() }}</span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ $nudge->created_at->format('m/d/Y') }}</td>
                                        <td class="flex items-center space-x-5 relative whitespace-nowrap py-5 pl-3 pr-4 text-left text-sm font-medium sm:pr-0">
                                            <a href="{{ route('admin.nudges.edit', $nudge) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 hover:cursor-pointer hover:text-gray-400 transition ease-in-out duration-300">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>
                                            @include('nudges.partials.delete-nudge-form', ['nudgeId' => $nudge->id])
                                            <!-- Enabled: "bg-green-500", Not Enabled: "bg-gray-200" -->
                                            <button x-data="toggles({{ $nudge->validated() }})" @click="toggle({{ $nudge->id }})" type="button" :class="isToggled ? 'bg-green-500' : 'bg-gray-200'" class="relative inline-flex h-3 w-5 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2" role="switch" aria-checked="false">
                                                <span class="sr-only">Use setting</span>
                                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                <span aria-hidden="true" :class="isToggled ? 'translate-x-2' : 'translate-x-0'" class="pointer-events-none inline-block size-2 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
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
