<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events) {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('t_menu.header.text_schedule'));
            $event->menu->add([
                'text' => trans('t_menu.header.text_schedule_sub'),
                'icon' => 'calendar',
                'submenu' => [
                    [
                        'text' => trans('t_menu.text_schedule'),
                        'icon' => '',
                        'url' => '/schedule',
                    ],
                ]
            ]);
        });
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('t_menu.header.text_customers'));
            $event->menu->add([
                'text' => trans('t_menu.header.text_customers_sub'),
                'icon' => 'users',
                'submenu' => [
                    [
                        'text' => trans('t_menu.text_customers'),
                        'icon' => '',
                        'url' => '/customers',
                    ],
                    [
                        'text' => trans('t_menu.text_iptables'),
                        'icon' => '',
                        'url' => '/iptables',
                    ],
                ]
            ]);
        });
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('t_menu.header.text_tariffs'));
            $event->menu->add([
                'text' => trans('t_menu.header.text_tariffs_sub'),
                'icon' => 'bars',
                'submenu' => [
                    [
                        'text' => trans('t_menu.text_tariffs'),
                        'icon' => '',
                        'url' => '/tariffs',
                    ],
                ]
            ]);
        });
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('t_menu.header.text_sms'));
            $event->menu->add([
                'text' => trans('t_menu.header.text_sms_sub'),
                'icon' => 'calendar',
                'submenu' => [
                    [
                        'text' => trans('t_menu.text_serwersms'),
                        'icon' => '',
                        'url' => '/serwersms',
                    ],
                    [
                        'text' => trans('t_menu.text_smsapi'),
                        'icon' => '',
                        'url' => '/smsapi',
                    ],
                ]
            ]);
        });
         $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('t_menu.header.text_employees'));
            $event->menu->add([
                'text' => trans('t_menu.header.text_employees_sub'),
                'icon' => 'male',
                'submenu' => [
                    [
                        'text' => trans('t_menu.text_employees'),
                        'icon' => '',
                        'url' => '/employees',
                    ],
                ]
            ]);
        });
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('t_menu.header.text_admin'));
            $event->menu->add([
                'text' => trans('t_menu.header.text_admin_sub'),
                'icon' => 'wrench',
                'submenu' => [
                    [
                        'text' => trans('t_menu.text_admin'),
                        'icon' => '',
                        'url' => '/admin',
                    ],
                ]
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
