<?php

namespace App\Providers;

use App\Models\ProductComment;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Repositories\Trademarks\TrademarksRepository;
use App\Repositories\Trademarks\TrademarksRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailService;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryService;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\ProductComment\ProductCommentService;
use App\Services\ProductComment\ProductCommentServiceInterface;
use App\Services\Trademarks\TrademarksService;
use App\Services\Trademarks\TrademarksServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //Product
    $this->app->singleton(
      ProductRepositoryInterface::class,
      ProductRepository::class
    );
    $this->app->singleton(
      ProductServiceInterface::class,
      ProductService::class
    );

    //ProductComment
    $this->app->singleton(
      ProductCommentRepositoryInterface::class,
      ProductCommentRepository::class
    );
    $this->app->singleton(
      ProductCommentServiceInterface::class,
      ProductCommentService::class
    );

    // ProductCategory
    $this->app->singleton(
      ProductCategoryRepositoryInterface::class,
      ProductCategoryRepository::class
    );
    $this->app->singleton(
      ProductCategoryServiceInterface::class,
      ProductCategoryService::class
    );

     // Trademarks
     $this->app->singleton(
      TrademarksRepositoryInterface::class,
      TrademarksRepository::class
    );
    $this->app->singleton(
      TrademarksServiceInterface::class,
      TrademarksService::class
    );

    // Order
    $this->app->singleton(
      OrderRepositoryInterface::class,
      OrderRepository::class
    );
    $this->app->singleton(
      OrderServiceInterface::class,
      OrderService::class
    );

    // Order Detail
    $this->app->singleton(
      OrderDetailRepositoryInterface::class,
      OrderDetailRepository::class
    );
    $this->app->singleton(
      OrderDetailServiceInterface::class,
      OrderDetailService::class
    );

    // User
    $this->app->singleton(
      UserRepositoryInterface::class,
      UserRepository::class
    );
    $this->app->singleton(
      UserServiceInterface::class,
      UserService::class
    );
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
}
