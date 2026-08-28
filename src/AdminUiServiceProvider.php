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
            'button' => 'admin.button',
            'input' => 'admin.input',
            'textarea' => 'admin.textarea',
            'select' => 'admin.select',
            'card' => 'admin.card',
            'table' => 'admin.table',
            'stat' => 'admin.stat',
            'icon-button' => 'admin.icon-button',
            'pagination' => 'admin.pagination',
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
        ];

        foreach ($tableMap as $view => $alias) {
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
