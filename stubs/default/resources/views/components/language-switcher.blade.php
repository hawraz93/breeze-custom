@php
    $locales = [
        'en' => ['label' => 'English', 'flag' => '🇬🇧'],
        'ar' => ['label' => 'العربية', 'flag' => '🇸🇦'],
        'ku' => ['label' => 'کوردی', 'flag' => '🏳'],
    ];
    $current = app()->getLocale();
@endphp

<x-dropdown align="{{ in_array(app()->getLocale(), ['ar', 'ku']) ? 'left' : 'right' }}" width="36">
    <x-slot name="trigger">
        <button class="inline-flex items-center gap-1.5 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            <span>{{ $locales[$current]['flag'] ?? '🌐' }}</span>
            <span>{{ $locales[$current]['label'] ?? strtoupper($current) }}</span>
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </x-slot>

    <x-slot name="content">
        @foreach($locales as $locale => $info)
            @if($locale !== $current)
                <x-dropdown-link href="{{ route('language.switch', $locale) }}">
                    <span class="me-2">{{ $info['flag'] }}</span>
                    {{ $info['label'] }}
                </x-dropdown-link>
            @endif
        @endforeach
    </x-slot>
</x-dropdown>
