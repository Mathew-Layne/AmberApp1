<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-center bg-gray-800 text-white py-3 my-2 rounded-md']) }}>
    {{ $slot }}
</button>
