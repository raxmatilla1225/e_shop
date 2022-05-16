<?php

namespace App\Providers;

use App\Models\Category;
use App\View\Components\ALInput;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('a-l-input', ALInput::class);
        $categories = Category::query()->where('status', '=', true)->orderBy('order')->with('child_categories')->get();
        View::share('categories', $categories);
    }
}
