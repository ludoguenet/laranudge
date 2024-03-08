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
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex items-center">
                                            <button @click.stop="parseToBoldMarkdown()" type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert bold markdown</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex items-center">
                                            <button @click.stop="parseToLinkMarkdown()" type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Insert link markdown</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <textarea rows="7" name="content" id="content" class="block w-full rounded-md border-0 py-1.5 mt-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="Your content goes here!">{{ old('content', $nudge ?? null) }}</textarea>
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
                                            <textarea rows="7" name="code" id="code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="Your PHP snippet goes here!">{{ old('code', $nudge ?? null) }}</textarea>
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
