<?php

namespace App\Providers\Filament;

use App\Filament\Resources\Activities\ActivitiesResource;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Contacts\ContactResource;
use App\Filament\Resources\Employees\EmployeeResource;
use App\Filament\Resources\Galleries\GalleryResource;
use App\Filament\Resources\GalleryImages\GalleryImageResource;
use App\Filament\Resources\News\NewsResource;
use App\Filament\Resources\Products\ProductResource;
use App\Filament\Resources\Quotes\QuoteResource;
use App\Filament\Resources\SecurityLogs\SecurityLogResource;
use App\Filament\Resources\TimeSlots\TimeSlotResource;
use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Visits\VisitResource;
use App\Filament\Widgets\ContactInformationWidget;
use App\Filament\Widgets\LatestNewsWidget;
use App\Filament\Widgets\RecentActivitiesWidget;
use App\Filament\Widgets\RecentProductsWidget;
use App\Filament\Widgets\RecentVisitsWidget;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName(__('sidebar.idrizovo'))
            ->brandLogo(asset('icons/rsm_color.svg'))
            ->favicon(asset('icons/rsm_color.svg'))
            ->defaultThemeMode(ThemeMode::Light)
            ->colors([
                'primary' => '#2E589E',
            ])
            ->databaseNotifications()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                RecentVisitsWidget::class,
                ContactInformationWidget::class,
                LatestNewsWidget::class,
                RecentActivitiesWidget::class,
                RecentProductsWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([

                    NavigationGroup::make()
                        ->items([
                            ...Dashboard::getNavigationItems(),
                        ]),
                    // 1. Users (Ungrouped)
                    NavigationGroup::make()
                        ->items([
                            ...UserResource::getNavigationItems(),
                        ]),

                    // 2. Visits Group
                    NavigationGroup::make(__('sidebar.visits'))
                        ->items([
                            ...VisitResource::getNavigationItems(),
                            ...TimeSlotResource::getNavigationItems(),
                            ...ContactResource::getNavigationItems(),
                        ]),

                    // 3. News (Ungrouped)
                    NavigationGroup::make()
                        ->items([
                            ...NewsResource::getNavigationItems(),
                        ]),

                    // 4. Crafts Group
                    NavigationGroup::make(__('sidebar.crafts'))
                        ->items([
                            ...ProductResource::getNavigationItems(),
                            ...CategoryResource::getNavigationItems(),
                            ...QuoteResource::getNavigationItems(),
                        ]),

                    // 5. Remaining Ungrouped Items
                    NavigationGroup::make()
                        ->items([
                            ...ActivitiesResource::getNavigationItems(),
                            ...EmployeeResource::getNavigationItems(),
                            ...GalleryResource::getNavigationItems(),
                            ...GalleryImageResource::getNavigationItems(),
                        ]),

                    NavigationGroup::make(__('sidebar.protection'))
                        ->collapsible()
                        ->collapsed()
                        ->items([
                            ...SecurityLogResource::getNavigationItems(),
                        ]),
                ]);
            });
    }
}
