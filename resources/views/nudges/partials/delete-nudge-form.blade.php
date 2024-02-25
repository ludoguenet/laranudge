<section class="space-y-6">
    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-nudge-deletion')">{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-nudge-deletion" :show="$errors->nudgeDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('nudges.destroy', $nudge) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your nudge?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Your nudge will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete nudge') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
