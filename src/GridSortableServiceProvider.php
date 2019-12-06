<?php

namespace Iamtong\LaravelAdmin\GridSortable;

use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class GridSortableServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(GridSortable $extension)
    {
        if (! GridSortable::boot()) {
            return ;
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/iamtong/laravel-admin-grid-sortable')],
                'laravel-admin-grid-sortable'
            );
        }

        $this->app->booted(function () {
            GridSortable::routes(__DIR__.'/../routes/web.php');
        });

        Admin::booting(function () {
            Admin::headerJs('vendor/iamtong/laravel-admin-grid-sortable/jquery-ui.min.js');
        });

        $extension->install();
    }
}