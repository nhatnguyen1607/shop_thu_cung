<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\IAdminRepository;
use App\Repositories\AdminRepository;

use App\Repositories\IProductRepository;
use App\Repositories\ProductRepository;

use App\Repositories\ISanphamRepository;
use App\Repositories\SanphamRepository;

use App\Repositories\IDanhmucRepository;
use App\Repositories\DanhmucRepository;

use App\Repositories\IOrderRepository;
use App\Repositories\OrderRepository;

use App\Repositories\IMemberRepository;
use App\Repositories\MemberRepository;

use App\Repositories\IBannerRepository;
use App\Repositories\BannerRepository;

use App\Repositories\IEvaluateRepository;
use App\Repositories\EvaluateRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(IProductRepository::class, ProductRepository::class);
       $this->app->bind(ISanphamRepository::class, SanphamRepository::class);
       $this->app->bind(IDanhmucRepository::class, DanhmucRepository::class);
       $this->app->bind(IAdminRepository::class, AdminRepository::class);
       $this->app->bind(IOrderRepository::class, OrderRepository::class);
       $this->app->bind(IMemberRepository::class, MemberRepository::class);
       $this->app->bind(IBannerRepository::class, BannerRepository::class);
       $this->app->bind(IEvaluateRepository::class, EvaluateRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
