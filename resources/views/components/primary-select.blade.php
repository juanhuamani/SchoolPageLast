<select {{ $attributes->merge(['class' => 'input-select']) }}>
    <option disabled>Choose an option</option>
    {{ $slot }}
</select>
