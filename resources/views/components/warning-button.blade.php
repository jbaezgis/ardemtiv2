<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-1 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:border-yellow-700 focus:ring focus:ring-yellow-100 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>