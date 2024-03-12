@props([
'nudges',
])

<div @click="open = false" class="flex-1 px-4 flex items-center justify-center">
    <div x-data="dropdownSearch({{ Js::from($nudges) }})" x-init="$watch('query', () => selectedNudgeIndex=null)" class="relative w-full">
        <input x-model="query" x-ref="queryInput" x-on:click.outside="reset()" x-on:keyup.escape="reset()" x-on:keyup.down="selectNextNudge" x-on:keyup.up="selectPreviousNudge" x-on:keyup.enter="goToUrl()" placeholder="Search for nudges" id="combobox" type="text" class="w-full rounded-md border-0 bg-white py-1.5 pl-3 pr-8 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-400 sm:text-sm sm:leading-6 placeholder-gray-400" role="combobox" aria-controls="options" aria-expanded="false">
        <a href="{{ route('rss.feed') }}" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none pointer-cursor">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 0 0-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>

        </a>

        <ul x-show="filteredNudges.length > 0" x-transition x-cloak x-ref="nudges" class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
            <!--
        Combobox option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

        Active: "text-white bg-green-600", Not Active: "text-gray-900"
      -->
            <template x-for="(nudge, index) in filteredNudges">
                <li class="relative cursor-pointer select-none py-2 pl-3 pr-9 text-gray-900" :class="{ 'font-semibold bg-gray-100 outline-none': index === selectedNudgeIndex }" id="option-0" role="option" tabindex="-1" x-on:click.prevent="goToUrl(nudge)">
                    <span x-text="nudge.title" class="block truncate" :class="{ 'font-semibold': index === selectedNudgeIndex }"></span>

                    <span x-text="nudge.user.name" class="hidden md:block absolute inset-y-2 right-0 flex items-center pr-4 text-gray-400"></span>
                </li>
            </template>
        </ul>
        <ul x-show="query !== '' && filteredNudges.length === 0" x-transition x-cloak class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
            <li class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" id="option-0" role="option" tabindex="-1">
                <span class="block truncate font-semibold">No nudges found. <a href="{{ route('nudges.create')}}" class="text-green-400">Create it!</a></span>
            </li>
        </ul>
    </div>
</div>

@push('scripts')
<script>
    const dropdownSearch = (nudges) => {
        return {
            query: ""
            , selectedNudgeIndex: null
            , nudges: nudges,

            get filteredNudges() {
                if (this.query.trim() === "") {
                    return [];
                }

                return this.nudges.filter(nudge => nudge.title.toLowerCase().includes(this.query.toLowerCase()));
            },

            reset() {
                this.selectedNudgeIndex = null;
                this.query = "";
                this.$refs.queryInput.blur();
            },

            selectNextNudge() {
                if (this.filteredNudges.length === 0) return;

                if (this.selectedNudgeIndex === null) {
                    this.selectedNudgeIndex = 0;
                } else {
                    this.selectedNudgeIndex++;
                }

                if (this.selectedNudgeIndex === this.filteredNudges.length) {
                    this.selectedNudgeIndex = 0;
                }

                this.focusSelectedNudge();
            },

            selectPreviousNudge() {
                if (this.filteredNudges.length === 0) return;

                if (this.selectedNudgeIndex === null) {
                    this.selectedNudgeIndex = this.filteredNudges.length - 1;
                } else {
                    this.selectedNudgeIndex--;
                }

                if (this.selectedNudgeIndex < 0) {
                    this.selectedNudgeIndex = this.filteredNudges.length - 1;
                }

                this.focusSelectedNudge();
            },

            focusSelectedNudge() {
                this.$refs.nudges.children[this.selectedNudgeIndex + 1].scrollIntoView({
                    block: 'nearest'
                })
            },

            goToUrl(nudge) {
                let currentNudge = nudge ? nudge : this.filteredNudges[this.selectedNudgeIndex];

                if (currentNudge == null) return;

                window.location = `/nudges/${currentNudge.slug}`;
            },

        }
    }

</script>
@endpush
