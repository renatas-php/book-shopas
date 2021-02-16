<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\User;


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
        Schema::defaultStringLength(191);

        View::composer(['vartotojas.dashboard', 'partials.notifications'], function($view) {
            $user_id = auth()->user()->id;

            $userUnreadNotes = User::where('id', $user_id)
            ->first()->unreadNotifications()
            ->where('type', 'App\Notifications\BookApproved')->get();
    
            $view->with('userUnreadNotes', $userUnreadNotes);
        });
        
        View::composer(['admin.dashboard'], function($view) {
            $view->with('books', Book::all());
        });

        View::composer(['knygos.ideti'], function($view) {
            $view->with('booksModelObject', new Book());
        });
        View::composer(['vartotojas.profilis', 'admin.profilis'], function($view) {
            $months = ['1' => 'Sausis', '2' => 'Vasaris', '3' => 'Kovas', '4' => 'Balandis'];
            $view->with('months', $months);
        });
        View::composer(['knygos.ideti'], function($view) {
            $view->with('authors', Author::all())->with('genres', Genre::all());
        });
        
    }
}
