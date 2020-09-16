<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
        //
    }

    /**
     * Let's check how to use mega menu in backend admin panel
     *
    **/
//    public function boot(Dispatcher $events)
//    {
//        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
//            $event->menu->addAfter('pages', [
//                'key' => 'account_settings',
//                'text' => 'Account Settings',
//            ]);
//            $user = Auth::user();
//            $notifications = $user->unreadNotifications;
//            $event->menu->addIn('account_settings', [
//                'key' => 'account_settings_notifications',
//                'text' => 'Notifications',
//                'icon' => 'fas fa-fw fa-bell',
//                'label' => $notifications->count(),
//                'label_color'   => 'success',
//                'url' => 'account/edit/notifications',
//            ]);
//        });
//    }
}
