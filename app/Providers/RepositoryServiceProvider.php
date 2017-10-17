<?php

namespace Sysproject\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind(
          \Sysproject\Repositories\ClientRepository::class,
          \Sysproject\Repositories\ClientRepositoryEloquent::class
      );

      $this->app->bind(
          \Sysproject\Repositories\ProjectRepository::class,
          \Sysproject\Repositories\ProjectRepositoryEloquent::class
      );

      $this->app->bind(
          \Sysproject\Repositories\ProjectNoteRepository::class,
          \Sysproject\Repositories\ProjectNoteRepositoryEloquent::class
      );

      $this->app->bind(
        \Sysproject\Repositories\ProjectTaskRepository::class,
        \Sysproject\Repositories\ProjectTaskRepositoryEloquent::class
      );

      $this->app->bind(
        \Sysproject\Repositories\ProjectMembersRepository::class,
        \Sysproject\Repositories\ProjectMembersRepositoryEloquent::class
      );
        //:end-bindings:

    }
}
