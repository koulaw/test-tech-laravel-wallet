<?php

declare(strict_types=1);

use App\Exceptions\ApiException;
use App\Http\Middleware\ForceAcceptJson;
use App\Jobs\SendLowBalanceNotificationJob;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(append: [
            ForceAcceptJson::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(function (Throwable $e) {
            if ($e instanceof ApiException) {
                return ! $e->silenced;
            }

            return true;
        });
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->job(new SendLowBalanceNotificationJob)->dailyAt('00:00');
    })
    ->create();
