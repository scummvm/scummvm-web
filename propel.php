<?php
return [
  'propel' => [
    'database' => [
      'connections' => [
        'scummvm' => [
          'adapter' => 'sqlite',
          'dsn' => 'sqlite:' . __DIR__ . '/data/scummvm-web.db',
          'user' => 'admin',
          'password' => 'admin',
          'settings' => [
            'charset' => 'utf8',
          ],
        ],
      ],
    ],
    'runtime' => [
      'defaultConnection' => 'scummvm',
      'connections' => [
        0 => 'scummvm',
      ],
    ],
    'generator' => [
      'defaultConnection' => 'scummvm',
      'namespaceAutoPackage' => false,
      'connections' => [
        0 => 'scummvm',
      ],
    ],
    'paths' => [
      'phpConfDir' => './orm/',
      'sqlDir' => './orm/',
      'phpDir' => './include/OrmObjects/',
    ],
  ],
];
