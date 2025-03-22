<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repository\IAuthRepository;
use App\Repository\AuthRepository;
use App\Repository\ITypeRepository;
use App\Repository\TypeRepository;
use App\Repository\IDestinationRepository;
use App\Repository\DestinationRepository;
use App\Repository\IPackageRepository;
use App\Repository\PackageRepository;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use App\Repository\IHomeRepository;
use App\Repository\homeRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(ITypeRepository::class, TypeRepository::class);
        $this->app->bind(IDestinationRepository::class, DestinationRepository::class);
        $this->app->bind(IPackageRepository::class, PackageRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IHomeRepository::class, homeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
