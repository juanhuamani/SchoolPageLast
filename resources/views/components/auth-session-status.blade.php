@props(['status'])


@if ($status = session('success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)"
        x-transition
        {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}
    >
        {{ $status }}
    </div>
@endif

@if ($status = session('info'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)"
        x-transition
        {{ $attributes->merge(['class' => 'font-medium text-sm text-blue-600']) }}
    >
        {{ $status }}
    </div>
    
@endif

@if ($status = session('error'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)"
        x-transition
        {{ $attributes->merge(['class' => 'font-medium text-sm text-red-600']) }}
    >
        {{ $status }}
    </div>
@endif