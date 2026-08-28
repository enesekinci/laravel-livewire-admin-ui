# Laravel Livewire Admin UI

Tailwind admin Blade components for Livewire panels.

## Install

```bash
composer config repositories.admin-ui vcs https://github.com/enesekinci/laravel-livewire-admin-ui
composer require enesekinci/laravel-livewire-admin-ui:^1.0
```

Ensure Tailwind scans package views:

```css
@source '../../vendor/enesekinci/laravel-livewire-admin-ui/resources/views/**/*.blade.php';
```

## Components

| Alias | Usage |
|---|---|
| `x-admin.button` | Primary/secondary/danger/light buttons or links |
| `x-admin.input` | Labeled text input |
| `x-admin.textarea` | Labeled textarea |
| `x-admin.select` | Labeled select |
| `x-admin.card` | Section card with optional title |
| `x-admin.table` | Scrollable table wrapper |
| `x-admin.stat` | Dashboard stat tile |
| `x-admin.icon-button` | Compact icon actions (edit/trash/eye/…) |

## Examples

```blade
<x-admin.button wire:click="save">Kaydet</x-admin.button>
<x-admin.input wire:model="name" label="Ad" />
<x-admin.card title="Ürünler">...</x-admin.card>
<x-admin.icon-button icon="trash" variant="danger" wire:click="delete" label="Sil" />
```

## Accent

Default brand accent is `#0b5cab`. Override via Tailwind theme or publish views.

## License

MIT
