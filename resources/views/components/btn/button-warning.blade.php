<button {{ $attributes->merge(['type' => $attributes['type'], 'class' => 'inline-flex items-center px-4 py-2 bg-yellow-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 tracking-widest hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
