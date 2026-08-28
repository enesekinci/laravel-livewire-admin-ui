@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';

$btnBase = 'relative inline-flex items-center border border-slate-200 bg-white text-sm font-medium text-slate-600 transition hover:bg-slate-50 focus:z-10 focus:outline-none focus:ring-2 focus:ring-brand/30 disabled:opacity-50';
$btnPage = $btnBase.' px-3 py-1.5 -ml-px leading-5';
$btnIcon = $btnBase.' px-2 py-1.5 leading-5';
$btnActive = 'relative inline-flex items-center border border-brand bg-brand px-3 py-1.5 -ml-px text-sm font-semibold text-white';
$btnDisabled = 'relative inline-flex cursor-default items-center border border-slate-200 bg-slate-50 px-2 py-1.5 text-sm font-medium text-slate-400';
@endphp

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('admin-ui::messages.pagination_label') }}" class="flex items-center justify-end">
        <div class="flex w-full justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="{{ $btnDisabled }} rounded-lg px-4">{{ __('admin-ui::messages.pagination_previous') }}</span>
            @else
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="{{ $btnBase }} rounded-lg px-4 py-2">
                    {{ __('admin-ui::messages.pagination_previous') }}
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="{{ $btnBase }} rounded-lg px-4 py-2">
                    {{ __('admin-ui::messages.pagination_next') }}
                </button>
            @else
                <span class="{{ $btnDisabled }} rounded-lg px-4">{{ __('admin-ui::messages.pagination_next') }}</span>
            @endif
        </div>

        <div class="hidden sm:inline-flex sm:rounded-lg sm:shadow-sm">
            @if ($paginator->onFirstPage())
                <span class="{{ $btnDisabled }} rounded-l-lg" aria-hidden="true">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                </span>
            @else
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="{{ $btnIcon }} rounded-l-lg" aria-label="{{ __('admin-ui::messages.pagination_previous') }}">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                </button>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="{{ $btnPage }} cursor-default bg-slate-50 text-slate-400">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page"><span class="{{ $btnActive }}">{{ $page }}</span></span>
                            @else
                                <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="{{ $btnPage }}" aria-label="{{ __('admin-ui::messages.pagination_goto', ['page' => $page]) }}">{{ $page }}</button>
                            @endif
                        </span>
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="{{ $btnIcon }} rounded-r-lg -ml-px" aria-label="{{ __('admin-ui::messages.pagination_next') }}">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                </button>
            @else
                <span class="{{ $btnDisabled }} rounded-r-lg -ml-px" aria-hidden="true">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                </span>
            @endif
        </div>
    </nav>
@endif
