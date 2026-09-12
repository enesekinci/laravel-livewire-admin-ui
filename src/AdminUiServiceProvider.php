<?php

namespace EnesEkinci\AdminUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminUiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-ui');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'admin-ui');

        $map = [
            'actions' => 'admin.actions',
            'alert' => 'admin.alert',
            'badge' => 'admin.badge',
            'bulk-bar' => 'admin.bulk-bar',
            'button' => 'admin.button',
            'card' => 'admin.card',
            'checkbox' => 'admin.checkbox',
            'error' => 'admin.error',
            'field' => 'admin.field',
            'fields' => 'admin.fields',
            'file' => 'admin.file',
            'hint' => 'admin.hint',
            'icon-button' => 'admin.icon-button',
            'input' => 'admin.input',
            'link' => 'admin.link',
            'metric' => 'admin.metric',
            'metrics' => 'admin.metrics',
            'page' => 'admin.page',
            'page-header' => 'admin.page-header',
            'pagination' => 'admin.pagination',
            'panel' => 'admin.panel',
            'section-title' => 'admin.section-title',
            'select' => 'admin.select',
            'stat' => 'admin.stat',
            'table' => 'admin.table',
            'textarea' => 'admin.textarea',
            'toolbar' => 'admin.toolbar',
        ];

        foreach ($map as $view => $alias) {
            Blade::component("admin-ui::components.{$view}", $alias);
            Blade::component("admin-ui::components.{$view}", "admin-ui.{$view}");
        }

        $tableMap = [
            'table.head' => 'admin.table.head',
            'table.body' => 'admin.table.body',
            'table.row' => 'admin.table.row',
            'table.th' => 'admin.table.th',
            'table.td' => 'admin.table.td',
            'table.empty' => 'admin.table.empty',
            'table.actions' => 'admin.table.actions',
            'table.select-all' => 'admin.table.select-all',
            'table.select-row' => 'admin.table.select-row',
        ];

        foreach ($tableMap as $view => $alias) {
            Blade::component("admin-ui::components.{$view}", $alias);
            Blade::component("admin-ui::components.{$view}", 'admin-ui.'.str_replace('.', '-', $view));
        }

        $navMap = [
            'nav' => 'admin.nav',
            'nav.item' => 'admin.nav.item',
            'nav.group' => 'admin.nav.group',
        ];

        foreach ($navMap as $view => $alias) {
            Blade::component("admin-ui::components.{$view}", $alias);
            Blade::component("admin-ui::components.{$view}", 'admin-ui.'.str_replace('.', '-', $view));
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/admin-ui'),
            ], 'admin-ui-views');
        }
    }
}
