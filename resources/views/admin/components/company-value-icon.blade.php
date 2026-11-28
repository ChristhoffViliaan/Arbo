@props(['icon'])

<svg {{ $attributes->merge(['class' => 'h-7 w-7']) }}
     viewBox="0 0 32 32"
     fill="none"
     stroke="currentColor"
     stroke-linecap="round"
     stroke-linejoin="round"
     stroke-width="1.5">
    @switch(strtolower($icon))
        @case('accountability')
            <circle cx="11" cy="9" r="4"/><path d="M3 27v-2a8 8 0 0 1 8-8h1a8 8 0 0 1 8 8v2M21 19l3 3 6-7"/>
            @break
        @case('reliability')
            <path d="M16 4 25 8v7c0 6-3.8 10.2-9 13-5.2-2.8-9-7-9-13V8l9-4Z"/><path d="m12 16 2.5 2.5L20 13"/>
            @break
        @case('breakthrough')
            <path d="M8 22H6a4 4 0 0 1-.5-8A8 8 0 0 1 21 12a5 5 0 0 1 2 10h-2"/><path d="m12 21 4-5 4 5m-4-5v12"/>
            @break
        @case('ownership')
            <path d="M6 22 21 7a4 4 0 0 1 6 6L12 28H6v-6Z"/><path d="m18 10 6 6M6 22l6 6"/>
            @break
        @default
            <path d="M27 5C16 5 7 8 5 17c-1 5 3 9 8 8 9-2 12-11 14-20ZM5 27c4-7 9-11 16-15"/>
    @endswitch
</svg>
