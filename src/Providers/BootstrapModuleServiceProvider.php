<?php namespace Tukecx\Base\Elfinder\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapModuleServiceProvider extends ServiceProvider
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
        /**
         * Register to dashboard menu
         */
        \DashboardMenu::registerItem([
            'id' => 'tukecx-elfinder',
            'priority' => 12,
            'parent_id' => null,
            'heading' => '其它',
            'title' => '媒体&文件',
            'font_icon' => 'icon-doc',
            'link' => route('admin::elfinder.index.get'),
            'css_class' => null,
            'permissions' => ['view-files', 'upload-files', 'edit-files', 'delete-files'],
        ]);
    }
}
