<?php

namespace Eminos\SetHeaderToggle\Fieldtypes;

use Statamic\Fields\Fieldtype;

class SetHeaderToggleFieldtype extends Fieldtype
{
    protected $icon = 'toggle';

    /**
     * The blank/default value.
     *
     * @return array
     */
    public function defaultValue()
    {
        return null;
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function preProcess($data)
    {
        return $data;
    }

    /**
     * Process the data before it gets saved.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function process($data)
    {
        return $data;
    }

    protected function configFieldItems(): array
    {
        $configFieldItems = [
            'toggle_color' => [
                'display' => 'Toggle Color',
                'instructions' => 'The color of the toggle.',
                'type' => 'color',
                'width' => 50
            ],
            'toggle_size' => [
                'display' => 'Toggle Size',
                'instructions' => 'The size of the toggle.',
                'type' => 'button_group',
                'width' => 50,
                'options' => [
                    'small' => 'Small',
                    'large' => 'Large',
                ],
                'default' => 'small'
            ],
        ];

        return $configFieldItems;
    }
}
