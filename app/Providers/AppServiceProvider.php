<?php

namespace App\Providers;

use App\Entities\Book;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\DoctrineBookRepository;
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
        $this->app->bind(BookRepositoryInterface::class, function ($app) {
            return new DoctrineBookRepository(
                $app['em'],
                $app['em']->getClassMetaData(Book::class)
            );
        });
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
