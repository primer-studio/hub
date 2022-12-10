<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Models\Publisher;
use App\Models\Service;


use Illuminate\Support\Facades\Response;
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

        /**
         * HELPERS FOR HTTP RESPONSE
         * */
        Response::macro('CustomHttpResponse', function ($code, $message, $type, $etc_should_bind = null) {
            $response = [
                'status' => $code,
                'message' => $message,
                'type' => $type
            ];

            if (!is_null($etc_should_bind) && is_array($etc_should_bind)) {
                foreach ($etc_should_bind as $option => $value) {
                    $response[$option] = $value;
                }
            }

            return Response::make($response);
        });


        $tabset = new HomeController();
        $tabset = $tabset->CreateTabset();
        $last_news = new HomeController();
        $last_news = $last_news->LastFetchedNews();
        $__GLOBAL = [
            'services' => Service::where('active', 1)->get(),
            'publishers' => Publisher::where('active', 1)->get(),
            'sidebar_tabset' => $tabset,
            'last_news' => $last_news
        ];
        View::share(compact(['__GLOBAL']));
    }
}
