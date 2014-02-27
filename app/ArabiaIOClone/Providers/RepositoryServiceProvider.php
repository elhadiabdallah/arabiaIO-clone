<?php



/**
 * Description of RepositoryServiceProvider
 *
 * @author Hichem MHAMED
 */

namespace ArabiaIOClone\Providers;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider 
{
    public function register()
    {
         $this->app->bind(
            'ArabiaIOClone\Repositories\CommunityRepositoryInterface',
            'ArabiaIOClone\Repositories\Eloquent\CommunityRepository'
        );
         
         $this->app->bind(
            'ArabiaIOClone\Repositories\UserRepositoryInterface',
            'ArabiaIOClone\Repositories\Eloquent\UserRepository'
        );
         
         $this->app->bind(
            'ArabiaIOClone\Repositories\PostRepositoryInterface',
            'ArabiaIOClone\Repositories\Eloquent\PostRepository'
        );
    }
}

?>
