<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="p-4">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                        {{ __('It is all about nudge!') }}
                    </h2>
                    <div class="mt-10">
                        <p>I believe that absorbing knowledge from a tip gives your skills or app a "nudge" to excel even further! 🥤</p>

                        <p>That's why I created <a href="{{ config('app.url') }}" class="underline">laranudge.com</a>, to share our favourite tips on Laravel. It aims to be simple and minimalist.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
