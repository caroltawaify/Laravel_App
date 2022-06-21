@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);   // explode('where to split string', 'prop')
@endphp

<ul class="flex">
    @foreach($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
    >
        <a href="/dashboard/project_laravel/public/?tag={{$tag}}">{{$tag}}</a>   
         {{-- ? to pass as a query param tag --}}
    </li>
    @endforeach
</ul>