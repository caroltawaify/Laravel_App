<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}} >
    {{$slot}} 
     {{-- use slot to surround something with the component tags --}}
</div>