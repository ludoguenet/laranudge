<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Privacy Policy') }}
        </h2>
    </x-slot>

    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="p-4">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                        {{ __('Privacy Policy') }}
                    </h2>
                    <div class="mt-10">
                        <h2 class="text-xl font-semibold">Cookie</h2>
                        <p class="mt-2">If you have an account and you log in to the site, a temporary cookie will be created to persist your login state. This cookie will be automatically destroyed when you log out of the site.</p>
                    </div>

                    <div class="mt-4">
                        <h2 class="text-xl font-semibold">Data Storage</h2>
                        <p class="mt-2">For users who register on the site, we store the personal data indicated in their profile. All users can view, modify, or delete their personal information at any time. Only the site manager can also view and modify this information. Your data is not shared with a third party.</p>
                        <p class="mt-2">If you have an account on the site, you can request the deletion of personal data concerning you. This does not include data stored for administrative, legal, or security purposes.</p>
                        <p class="mt-2">In accordance with the procedure provided by the General Data Protection Regulation in case of a breach or anomaly concerning personal data in our possession, we will notify you of the nature of the leaked data and the nature of the risk that may arise, if it may affect your rights and freedoms (sensitive data) within a maximum period of 72 hours after the problem is detected.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
