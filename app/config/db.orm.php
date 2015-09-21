<?php

return [
    'orm.proxies_dir' => 'app/cache',
    'orm.em.options' => [
        'mappings' => [[
            'type' => 'annotation',
            'namespace' => 'Ninja\Entities',
            'path' => 'app/src/Ninja/Entities',
        ]],
    ],
];