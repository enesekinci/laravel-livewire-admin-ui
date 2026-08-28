@props([
    'colspan' => 1,
    'message' => null,
])

<tr>
    <td colspan="{{ $colspan }}" class="px-3 py-8 text-center text-sm text-slate-500">
        {{ $message ?? __('admin-ui::messages.table_empty') }}
    </td>
</tr>
