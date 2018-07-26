<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\IptablesClasses;
use Auth;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events) {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (Auth::user()->can('schedule')) {
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
            }
            if (Auth::user()->can('customers')) {
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
                    ]
                ]);
            }
            if (Auth::user()->can('iptables')) {
                $event->menu->add(trans('t_menu.header.text_iptables'));
                $arr[] = [
                    'text' => trans('t_menu.header.text_iptables_class'),
                    'icon' => '',
                    'url' => '/iptables',
                ];
                foreach (IptablesClasses::all() as $iptables) {
                    $arr[] = [
                        'text' => trans(long2ip($iptables->class)),
                        'icon' => '',
                        'url' => '/iptables/node/' . $iptables->id,
                    ];
                }

                $event->menu->add([
                    'text' => trans('t_menu.header.text_iptables_sub'),
                    'icon' => '',
                    'submenu' => $arr,
                ]);
            }
            if (Auth::user()->can('documents')) {
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
                        [
                            'text' => trans('t_menu.text_documents'),
                            'icon' => '',
                            'url' => '/documents',
                        ],
                    ]
                ]);
            }
            if (Auth::user()->can('sms')) {
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
            }
            if (Auth::user()->can('employees')) {
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
            }
            if (Auth::user()->can('administrators')) {
                $event->menu->add(trans('t_menu.header.text_administrators'));
                $event->menu->add([
                    'text' => trans('t_menu.header.text_administrators_sub'),
                    'icon' => 'wrench',
                    'submenu' => [
                        [
                            'text' => trans('t_menu.text_users'),
                            'icon' => '',
                            'url' => '/administrators/users',
                        ],
                        [
                            'text' => trans('t_menu.text_roles'),
                            'icon' => '',
                            'url' => '/administrators/roles',
                        ],
                    ]
                ]);
            }
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
