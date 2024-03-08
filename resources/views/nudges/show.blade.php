<x-app-layout>
    <div class="px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-4xl">
            @if ($nudge)
            <div x-data="nudge({{ Js::from(auth()->user()?->isLiked($nudge)) }})">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 mb-5">{{ $nudge->title }}</h1>

                <article class="flex items-center justify-between text-md leading-8 text-gray-500 sm:text-lg mb-2.5">
                    <span class="prose">{!! Str::markdown($nudge->content) !!}</span>
                    <textarea type="text" x-ref="content" class="hidden">{!! $nudge->code !!}</textarea>
                </article>

                <pre>
                    <x-torchlight-code language='php'>{!! $nudge->code !!}</x-torchlight-code>
                </pre>

                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-center gap-1">
                        <div x-ref="likesCount" class="text-gray-400 text-sm">{{ $nudge->likes_count }}</div>
                        @auth
                        <button @click="toggleLike({{ $nudge->id }})" x-cloak class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 transition ease-in-out duration-300" :class="isLiked ? 'text-green-300 hover:text-green-400' : 'text-gray-300 hover:text-gray-400'">
                                <path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                            </svg>
                        </button>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-green-300">
                            <path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                        </svg>
                        @endauth
                    </div>
                    <div class="relative">
                        <div x-show="copySuccess" x-transition x-cloak role="tooltip" class="absolute right-0 z-10 inline-block px-2 py-1 text-xs text-white transition-opacity duration-300 bg-green-500 rounded-md shadow-sm">
                            <span>COPIED!</span>
                        </div>

                        <button @click="copy" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-500 transition ease-in-out duration-150 hover:text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                            </svg>
                        </button>
                    </div>
                </div>

                <figcaption class="mt-6">
                    <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                        <div class="font-semibold text-gray-900">{{ $nudge->user->name }}</div>
                        <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="text-gray-600">This {{ $randomSynonym }} <span class="text-green-500">nudge</span> was posted {{ $nudge->created_at->since() }}</div>
                    </div>
                </figcaption>
            </div>
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

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('nudge', (isLiked = false) => ({
                copySuccess: false,

                isLiked: isLiked,

                copy() {
                    const codeContent = this.$refs.content;

                    this.copySuccess = true;

                    this.copyCode(codeContent);
                },

                copyCode(content) {
                    content.select();
                    content.setSelectionRange(0, 99999);
                    navigator.clipboard.writeText(content.innerText);

                    this.resetCopySuccess();
                },

                resetCopySuccess() {
                    setTimeout(() => this.copySuccess = false, 2000);
                },

                async toggleLike(nudgeId) {
                    const likesCountElement = this.$refs.likesCount;

                    await axios.post(`/api/nudges/toggle-like/${nudgeId}`);

                    this.isLiked = !this.isLiked;

                    if (this.isLiked === true) {
                        this.increaseLikes(likesCountElement);
                    } else {
                        this.decreaseLikes(likesCountElement);
                    }
                },


                increaseLikes(element) {
                    element.innerText = parseInt(element.innerText) + 1;
                },

                decreaseLikes(element) {
                    element.innerText = parseInt(element.innerText) - 1;
                },

            }));
        });

    </script>
    @endpush
</x-app-layout>
