<?php

namespace Eminos\SetHeaderToggle;

use Statamic\Providers\AddonServiceProvider;
use Eminos\SetHeaderToggle\Fieldtypes\SetHeaderToggleFieldtype;
 
class ServiceProvider extends AddonServiceProvider
{

    public function __construct()
    {
        $this->vite['hotFile'] = base_path('vendor/eminos/statamic-set-header-toggle/dist/vite.hot');

        parent::__construct(app());
    }

    protected $fieldtypes = [
        SetHeaderToggleFieldtype::class,
    ];

    // protected $tags = [
    //     IconifyTag::class,
    // ];

    protected $vite = [
        'hotFile' => null, // set in the constructor for reasons
        'publicDirectory' => 'dist',
        'input' => [
            'resources/js/statamic-set-header-toggle.js'
        ],
    ];

    public function bootAddon()
    {

        // 
        
    }
}