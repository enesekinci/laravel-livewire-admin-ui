@props([
    'paginator',
    'showSummary' => true,
])

@if ($paginator instanceof \Illuminate\Contracts\Pagination\Paginator && ($paginator->hasPages() || ($paginator->total() ?? 0) > 0))
    <div {{ $attributes->class(['mt-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between']) }}>
        @if ($showSummary && $paginator->total() > 0)
            <p class="text-sm text-slate-500">
                {{ __('admin-ui::messages.pagination_summary', [
                    'from' => $paginator->firstItem(),
                    'to' => $paginator->lastItem(),
                    'total' => $paginator->total(),
                ]) }}
            </p>
        @endif

        @if ($paginator->hasPages())
            {{ $paginator->links('admin-ui::pagination.livewire') }}
        @endif
    </div>
@endif
