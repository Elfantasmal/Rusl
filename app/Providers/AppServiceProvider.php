<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use App\Models\SalesOrder;
use App\Models\PurchaseOrder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Generator::class, function () {
            return Factory::create("zh_CN");
        });
        Relation::morphMap([
            'sales_order' => SalesOrder::class,
            'purchase_order' => PurchaseOrder::class,
        ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
