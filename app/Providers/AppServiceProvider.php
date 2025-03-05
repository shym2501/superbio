<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Database\Console\WipeCommand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
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
        // Below are settings adapted from https://planetscale.com/blog/laravels-safety-mechanisms
        // As these are concerned with application correctness,
        // leave them enabled all the time.
        Model::preventAccessingMissingAttributes();
        Model::preventSilentlyDiscardingAttributes();

        // Prohibit destructive commands in production
        WipeCommand::prohibit($this->app->isProduction());
        FreshCommand::prohibit($this->app->isProduction());
        ResetCommand::prohibit($this->app->isProduction());
        RefreshCommand::prohibit($this->app->isProduction());
        RollbackCommand::prohibit($this->app->isProduction());
        DB::prohibitDestructiveCommands($this->app->isProduction());

        // Set default timezone to Europe/Copenhagen
        date_default_timezone_set(config('app.timezone'));

        // Use immutable dates
        Date::use(CarbonImmutable::class);

        // Since this is a performance concern only, don't halt
        // production for violations.
        Model::preventLazyLoading(! $this->app->isProduction());
    }
}
