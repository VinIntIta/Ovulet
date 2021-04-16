<button {{ $attributes->merge(['type' => 'submit', 'class'=> 'mt-6']) }}>
    {{ $slot }}
</button>
