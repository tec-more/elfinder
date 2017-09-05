<?php namespace Tukecx\Base\Elfinder\Providers;

use Illuminate\Support\ServiceProvider;

class InstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'Tukecx\Base\Elfinder';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    private function booted()
    {
        acl_permission()
            ->registerPermission('View files', 'view-files', $this->module)
            ->registerPermission('Upload files', 'upload-files', $this->module)
            ->registerPermission('Edit files', 'edit-files', $this->module)
            ->registerPermission('Delete files', 'delete-files', $this->module);
    }
}
