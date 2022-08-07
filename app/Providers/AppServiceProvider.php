<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Models\Service;

use http\Env\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;


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
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        
        Blade::directive('jdate_timestamp', function ($expression) {
            $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $date = str_replace($en, $fa, $expression);

            return "<?php echo \Morilog\Jalali\Jalalian::forge($date)->ago(); ?>";
        });

        $tabset = new HomeController();
        $tabset = $tabset->CreateTabset();
        $__GLOBAL = [
            'services' => Service::where('active', 1)->get(),
            'sidebar_tabset' => $tabset
        ];

        View::share(compact(['__GLOBAL']));
    }
}
