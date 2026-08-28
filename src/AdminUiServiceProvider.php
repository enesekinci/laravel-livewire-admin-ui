<?php

namespace EnesEkinci\AdminUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminUiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-ui');

        $map = [
            'button' => 'admin.button',
            'input' => 'admin.input',
            'textarea' => 'admin.textarea',
            'select' => 'admin.select',
            'card' => 'admin.card',
            'table' => 'admin.table',
            'stat' => 'admin.stat',
            'icon-button' => 'admin.icon-button',
        ];

        foreach ($map as $view => $alias) {
            Blade::component("admin-ui::components.{$view}", $alias);
            // also bare aliases without admin. prefix for flexibility
            Blade::component("admin-ui::components.{$view}", "admin-ui.{$view}");
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/admin-ui'),
            ], 'admin-ui-views');
        }
    }
}
