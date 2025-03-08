<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Field Type Settings
    |--------------------------------------------------------------------------
    |
    | Here you can set default field group and field type configuration that
    | is then merged with your field groups when they are composed.
    |
    | This allows you to avoid the repetitive process of setting common field
    | configuration such as `ui` on every `trueFalse` field or your
    | preferred `instruction_placement` on every `fieldGroup`.
    |
    */

    'defaults' => [
        'trueFalse'     => ['ui' => 1],
        'select'        => ['ui' => 1],
        'range'         => ['ui' => 1],
        'image'         => ['return_format' => 'id','preview_size'=>'medium'],
        'gallery'       => ['return_format' => 'id','preview_size'=>'medium'],
        'file'          => ['return_format' => 'id'],
        'relationship'  => ['return_format' => 'id'],                
        'wysiwyg'       => ['tabs'=>'both','media_upload'=>1],
        'textarea'      => ['rows'=>2],
        'repeater'      => ['layout'=>'row'],
        'group'         => ['layout'=>'row'],
        'color_picker'  => ['enable_opacity'=>1]
    ],
];
