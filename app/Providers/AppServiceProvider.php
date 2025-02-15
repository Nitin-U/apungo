<?php

namespace App\Providers;

use App\Models\Backend\Setting;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Blueprint::macro('baseColumns', function (){
            $this->boolean('status')->default(0);
            $this->foreignId('created_by')->references('id')->on('users')->cascadeOnUpdate();
            $this->foreignId('updated_by')->nullable()->references('id')->on('users')->cascadeOnUpdate();
            $this->softDeletes();
            $this->timestamps();
        });

        $this->sensitiveBackendComposer();

        Builder::macro('withWhereHas', fn($relation, $constraint)=> $this->whereHas($relation, $constraint)->with([$relation=>$constraint]));
    }

    public function sensitiveBackendComposer(){
        view()->composer([BACKEND.'elements.header',
            BACKEND.'elements.footer',
            BACKEND.'elements.sidebar',
            FRONTEND.'activity.includes.sidebar',
            FRONTEND.'blog.includes.sidebar',
            FRONTEND.'page.includes.map_and_description',
            'error.404',
            'auth.login'], function ($view) {
            $view->with([
                'setting_data' => Setting::first(),
            ]);
        });
    }

}
