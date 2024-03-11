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


                        <form method="post" action="{{ isset($nudge) ? route('admin.nudges.update', $nudge) : route('nudges.store') }}" class="mt-6 space-y-6">
                            @csrf

                            @isset($nudge) @method('PUT') @endisset

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full placeholder:text-gray-400 sm:text-sm" :value="old('title', $nudge ?? null)" autofocus autocomplete="title" required placeholder="Your title goes here!" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div x-data>
                                <div class="flex items-end">
                                    <div>
                                        <x-input-label for="content" :value="__('Short description')" />
                                        <p class="text-xs leading-6 text-gray-600">Markdow is accepted.</p>
                                    </div>
                                    <div class="ml-auto flex items-center space-x-5">
                                        <div class="flex items-center">
                                            <button @click.stop="parseToHeadingMarkdown()" type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert heading markdown</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-4">
                                                    <path d="M2.007,12.526l3.156,0l0,7.363l3.155,0l0,-7.363l3.156,0l0,-3.156l-9.467,0m6.311,-5.259l0,3.155l5.26,0l0,12.623l3.156,0l0,-12.623l5.259,0l0,-3.155l-13.675,0Z" style="fill-rule: nonzero;"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="flex items-center">
                                            <button @click.stop="parseToItalicMarkdown()" type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert bold markdown</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-4">
                                                    <path d="M8.617,3.658l0,3.575l2.633,0l-2.075,9.534l-3.325,0l0,3.575l9.533,0l0,-3.575l-2.633,0l2.075,-9.534l3.325,0l0,-3.575l-9.533,0Z" style="fill-rule: nonzero;"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="flex items-center">
                                            <button @click.stop="parseToBoldMarkdown()" type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert bold markdown</span>
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M13.35,17.401l-4.201,0l0,-3.601l4.201,0c0.997,0 1.801,0.805 1.801,1.801c0,0.996 -0.804,1.8 -1.801,1.8m-4.201,-10.802l3.601,0c0.996,0 1.801,0.804 1.801,1.8c0,0.996 -0.805,1.801 -1.801,1.801l-3.601,0m6.722,1.548c1.164,-0.816 1.98,-2.149 1.98,-3.349c0,-2.712 -2.1,-4.801 -4.801,-4.801l-7.502,0l0,16.804l8.45,0c2.521,0 4.454,-2.04 4.454,-4.549c0,-1.825 -1.033,-3.385 -2.581,-4.105Z" style="fill-rule: nonzero;"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex items-center">
                                            <button @click.stop="parseToLinkMarkdown()" type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert link markdown</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-4">
                                                    <path d="M 10.5858,13.4142C 10.9763,13.8047 10.9763,14.4379 10.5858,14.8284C 10.1952,15.2189 9.56207,15.2189 9.17154,14.8284C 7.21892,12.8758 7.21892,9.70995 9.17154,7.75733L 9.17157,7.75736L 12.707,4.2219C 14.6596,2.26928 17.8255,2.26929 19.7781,4.2219C 21.7307,6.17452 21.7307,9.34034 19.7781,11.293L 18.2925,12.7785C 18.3008,11.9583 18.1659,11.1368 17.8876,10.355L 18.3639,9.87865C 19.5355,8.70708 19.5355,6.80759 18.3639,5.63602C 17.1923,4.46445 15.2929,4.46445 14.1213,5.63602L 10.5858,9.17155C 9.41419,10.3431 9.41419,12.2426 10.5858,13.4142 Z M 13.4142,9.17155C 13.8047,8.78103 14.4379,8.78103 14.8284,9.17155C 16.781,11.1242 16.781,14.29 14.8284,16.2426L 14.8284,16.2426L 11.2929,19.7782C 9.34026,21.7308 6.17444,21.7308 4.22182,19.7782C 2.26921,17.8255 2.2692,14.6597 4.22182,12.7071L 5.70744,11.2215C 5.69913,12.0417 5.8341,12.8631 6.11234,13.645L 5.63601,14.1213C 4.46444,15.2929 4.46444,17.1924 5.63601,18.3639C 6.80758,19.5355 8.70708,19.5355 9.87865,18.3639L 13.4142,14.8284C 14.5858,13.6568 14.5858,11.7573 13.4142,10.5858C 13.0237,10.1952 13.0237,9.56207 13.4142,9.17155 Z "></path>
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <textarea rows="7" name="content" id="content" class="block w-full rounded-md border-0 py-1.5 mt-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-500 sm:text-sm sm:leading-6" placeholder="Your content goes here!">{{ old('content', $nudge ?? null) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>

                            <div x-data="tabs">
                                <div class="flex items-center" aria-orientation="horizontal" role="tablist">
                                    <!-- Selected: "bg-gray-100 text-gray-900 hover:bg-gray-200", Not Selected: "bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900" -->
                                    <button @click="showFirstTab" id="tabs-1-tab-1" :class="currentTab === 1 ? 'bg-gray-100 text-gray-900 hover:bg-gray-200' : 'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900'" class="rounded-md border border-transparent px-3 py-1.5 text-sm font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Write</button>
                                    <!-- Selected: "bg-gray-100 text-gray-900 hover:bg-gray-200", Not Selected: "bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900" -->
                                    <button @click="showSecondTab" id="tabs-1-tab-2" :class="currentTab === 2 ? 'bg-gray-100 text-gray-900 hover:bg-gray-200' : 'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-900'" class="ml-2 rounded-md border border-transparent px-3 py-1.5 text-sm font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Preview</button>
                                </div>
                                <div class="mt-2">
                                    <div x-show="currentTab === 1" id="tabs-1-panel-1" class="-m-0.5 rounded-lg p-0.5" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                        <label for="code" class="sr-only">code</label>
                                        <div>
                                            <textarea rows="7" name="code" id="code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-500 sm:text-sm sm:leading-6" placeholder="Your PHP snippet goes here!">{{ old('code', $nudge ?? null) }}</textarea>
                                            <x-input-error class="mt-2" :messages="$errors->get('code')" />
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

                                @isset($nudge)
                                @if (session('status') === 'nudge-edited')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)" class="text-sm text-gray-600">{{ __('Nudge edited! Awaiting validation. Almost there again!') }}</p>
                                @endif
                                @else
                                @if (session('status') === 'nudge-created')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)" class="text-sm text-gray-600">{{ __('Nudge ready! Awaiting validation. Almost there!') }}</p>
                                @endif
                                @endisset
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

        const parseToHeadingMarkdown = () => {
            const textarea = document.getElementById('content');
            const startSelection = textarea.selectionStart;
            const endSelection = textarea.selectionEnd;
            const textareaValue = textarea.value;

            const selectedText = textareaValue.substring(startSelection, endSelection);
            const parsedText = textareaValue.substring(0, startSelection) + '## ' + selectedText + textareaValue.substring(endSelection);

            textarea.value = parsedText;
            textarea.focus();
        }

        const parseToBoldMarkdown = () => {
            const textarea = document.getElementById('content');
            const startSelection = textarea.selectionStart;
            const endSelection = textarea.selectionEnd;
            const textareaValue = textarea.value;

            const selectedText = textareaValue.substring(startSelection, endSelection);
            const parsedText = textareaValue.substring(0, startSelection) + '**' + selectedText + '**' + textareaValue.substring(endSelection);

            textarea.value = parsedText;
            textarea.focus();
        }

        const parseToItalicMarkdown = () => {
            const textarea = document.getElementById('content');
            const startSelection = textarea.selectionStart;
            const endSelection = textarea.selectionEnd;
            const textareaValue = textarea.value;

            const selectedText = textareaValue.substring(startSelection, endSelection);
            const parsedText = textareaValue.substring(0, startSelection) + '*' + selectedText + '*' + textareaValue.substring(endSelection);

            textarea.value = parsedText;
            textarea.focus();
        }

        const parseToLinkMarkdown = () => {
            const textarea = document.getElementById('content');
            const startSelection = textarea.selectionStart;
            const endSelection = textarea.selectionEnd;
            const textareaValue = textarea.value;

            const selectedText = textareaValue.substring(startSelection, endSelection);
            const linkURL = prompt('Submit your link please.');

            if (linkURL) {
                const parsedText = textareaValue.substring(0, startSelection) + '[' + selectedText + '](' + linkURL + ')' + textareaValue.substring(endSelection);
                textarea.value = parsedText;
            }

            textarea.focus();
        }

    </script>
    @endpush
</x-app-layout>
