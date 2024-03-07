<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/tokyo-night-dark.min.css">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit a new nudge') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Form') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("It will be available publicly after validation.") }}
                            </p>
                        </header>


                        <form method="post" action="{{ route('nudges.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="content" :value="__('Short description')" />
                                <x-text-input id="content" name="content" type="text" class="mt-1 block w-full" :value="old('content')" autofocus autocomplete="content" required />
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>

                            {{-- <button id="render">RENDER</button>

                            <pre><code class="language-php"></code></pre>

                            <div>
                                <x-input-label for="code" :value="__('Code')" />
                                <textarea id="code" name="code" class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" rows="15" required autofocus autocomplete="code"></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('code')" />
                            </div> --}}

                            <div x-data="tabs">
                                <div class="flex items-center" aria-orientation="horizontal" role="tablist">
                                    <!-- Selected: "bg-gray-100 text-gray-900 hover:bg-gray-200", Not Selected: "bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900" -->
                                    <button @click="showFirstTab" id="tabs-1-tab-1" :class="currentTab === 1 ? 'bg-gray-100 text-gray-900 hover:bg-gray-200' : 'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900'" class="rounded-md border border-transparent px-3 py-1.5 text-sm font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Write</button>
                                    <!-- Selected: "bg-gray-100 text-gray-900 hover:bg-gray-200", Not Selected: "bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900" -->
                                    <button @click="showSecondTab" id="tabs-1-tab-2" :class="currentTab === 2 ? 'bg-gray-100 text-gray-900 hover:bg-gray-200' : 'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900'" class="ml-2 rounded-md border border-transparent px-3 py-1.5 text-sm font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Preview</button>

                                    <!-- These buttons are here simply as examples and don't actually do anything. -->
                                    {{-- <div class="ml-auto flex items-center space-x-5">
                                        <div class="flex items-center">
                                            <button type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert link</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                                                    <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex items-center">
                                            <button type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert code</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M6.28 5.22a.75.75 0 010 1.06L2.56 10l3.72 3.72a.75.75 0 01-1.06 1.06L.97 10.53a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0zm7.44 0a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06L17.44 10l-3.72-3.72a.75.75 0 010-1.06zM11.377 2.011a.75.75 0 01.612.867l-2.5 14.5a.75.75 0 01-1.478-.255l2.5-14.5a.75.75 0 01.866-.612z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex items-center">
                                            <button type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Mention someone</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M5.404 14.596A6.5 6.5 0 1116.5 10a1.25 1.25 0 01-2.5 0 4 4 0 10-.571 2.06A2.75 2.75 0 0018 10a8 8 0 10-2.343 5.657.75.75 0 00-1.06-1.06 6.5 6.5 0 01-9.193 0zM10 7.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="mt-2">
                                    <div x-show="currentTab === 1" id="tabs-1-panel-1" class="-m-0.5 rounded-lg p-0.5" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                        <label for="code" class="sr-only">code</label>
                                        <div>
                                            <textarea rows="5" name="code" id="code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="Your PHP snippet here"></textarea>
                                        </div>
                                    </div>
                                    <div x-show="currentTab === 2" id="tabs-1-panel-2" class="-m-0.5 rounded-lg p-0.5" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                                        <div class="border-b">
                                            <div class="mx-px mt-px px-3 pb-12 pt-2 text-sm leading-5 text-gray-800">
                                                <pre><code class="language-php"></code></pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Submit') }}</x-primary-button>

                                @if (session('status') === 'nudge-created')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)" class="text-sm text-gray-600">{{ __('Nudge ready! Awaiting validation. Almost there!') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('tabs', () => ({
                currentTab: 1,

                resetHighlight(previewElement) {
                    delete previewElement.dataset.highlighted;
                },

                previewCode() {
                    const preview = document.querySelector('.language-php');
                    const textArea = document.querySelector('#code');

                    this.resetHighlight(preview);

                    preview.innerHTML = textArea.value;
                    hljs.highlightElement(preview);
                },

                showFirstTab() {
                    this.currentTab = 1;
                },

                showSecondTab() {
                    this.currentTab = 2;

                    this.previewCode();
                }
            }));
        });

    </script>
    @endpush
</x-app-layout>
