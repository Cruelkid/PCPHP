<?php
 
return [
    'title' => 'Upload your file',
 
    'attributes' => [
        'enctype' => 'multipart/form-data',
    ],
 
    'elements' => [
        'file' => [
            'type' => 'file',
        ],
    ],
 
    'buttons' => [
        'reset' => [
            'type' => 'reset',
            'label' => 'Reset',
        ],
        'submit' => [
            'type' => 'submit',
            'label' => 'Upload',
        ],
    ],
];
