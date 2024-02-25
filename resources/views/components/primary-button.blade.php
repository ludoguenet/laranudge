<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-200 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
