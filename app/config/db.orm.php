<?php

return [
    'orm.proxies_dir' => 'app/cache',
    'orm.em.options' => [
        'mappings' => [[
            'type' => 'annotation',
            'namespace' => 'App\Entities',
            'path' => 'app/src/App/Entities',
            'use_simple_annotation_reader' => false,
        ]],
    ],
];
