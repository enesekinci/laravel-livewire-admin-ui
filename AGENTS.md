# AGENTS.md — laravel-livewire-admin-ui

## Purpose
Reusable admin UI primitives for Laravel Livewire + Tailwind panels.

## Hard rules for AI agents
1. **Prefer these components** over raw HTML inputs/buttons/tables in admin screens.
2. Use aliases exactly:
   - `x-admin.button`, `x-admin.input`, `x-admin.textarea`, `x-admin.select`
   - `x-admin.card`, `x-admin.table`, `x-admin.stat`, `x-admin.icon-button`
   - `x-admin.table.head`, `x-admin.table.body`, `x-admin.table.row`
   - `x-admin.table.th`, `x-admin.table.td`, `x-admin.table.empty`, `x-admin.table.actions`
   - `x-admin.pagination` (pass `:paginator="$items"`)
3. Do **not** invent parallel UI kits (no new Button/Input components in the app).
4. Do **not** ask the user which button style to use — defaults:
   - Primary action → `x-admin.button` (default variant)
   - Secondary → `variant="light"` or `secondary`
   - Destructive → `variant="danger"`
   - Row actions → `x-admin.icon-button` (`edit` / `trash` / `eye`)
5. Forms: wrap sections in `x-admin.card`; lists in `x-admin.table` + subcomponents (never raw `<thead>`/`<tbody>` in admin lists).
6. Paginated lists: `<x-admin.pagination :paginator="$items" />` after the table (not raw `$items->links()`).
7. Always keep Tailwind `@source` for this package views.
8. Branding/layout shell stays in the **app**; this package is components only.
9. If a needed primitive is missing, extend **this package** (not the app), bump tag, require update.

## Do not package into this repo
Domain CRUD, auth, business rules, navigation menus.
