@props(['title', 'breadcrumbs'])

<div class="flex items-center justify-between">
    <h3 class="inline-block items-center bg-gradient-to-r from-secondary-500 to-primary-500 bg-clip-text text-2xl font-semibold text-transparent">
        {{ $title }}
    </h3>

    <nav class="text-sm font-semibold text-slate-700 dark:text-slate-300" aria-label="breadcrumb">
        <ol class="flex flex-wrap items-center gap-1">
            @foreach ($breadcrumbs as $key => $breadcrumb)
                <li class="{{ $loop->last ? 'text-primary-500' : 'text-secondary-500' }} flex items-center gap-1 font-semibold" aria-current="{{ $loop->last ? 'page' : '' }}">
                    <a href="{{ $key }}">{{ $breadcrumb }}</a>
                    @if (!$loop->last)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" stroke-width="2" stroke="currentColor" class="size-4 text-[#9E9E9E]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
</div>
