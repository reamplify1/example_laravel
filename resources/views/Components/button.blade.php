<a {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-1 transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</a>
