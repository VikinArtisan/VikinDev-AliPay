<?php

namespace Vikin\AliPay;

use Illuminate\Support\ServiceProvider;

class AliPayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot ()
    {
        $this->publishes([
			__DIR__ . '/config/VikinDevAliPay.php'    => config_path('VikinDevAliPay.php'),
			__DIR__ . '/config/VikinDevWebAliPay.php' => config_path('VikinDevWebAliPay.php'),
			__DIR__ . '/config/VikinDevWapAliPay.php' => config_path('VikinDevWapAliPay.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register ()
    {
		$this->app->singleton('aliPay', function () {
			return new AliPayMain();
		});
    }
}
