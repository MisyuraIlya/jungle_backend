<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => '__root__',
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
        'propel/propel' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'library',
            'install_path' => __DIR__ . '/../propel/propel',
            'aliases' => array(
                0 => '2.0.x-dev',
            ),
            'reference' => 'c70cebf930d0004ebe00954230cc377be2416622',
            'dev_requirement' => false,
        ),
        'psr/container' => array(
            'pretty_version' => '2.0.2',
            'version' => '2.0.2.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/container',
            'aliases' => array(),
            'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
            'dev_requirement' => false,
        ),
        'psr/log' => array(
            'pretty_version' => '3.0.0',
            'version' => '3.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0|2.0|3.0',
            ),
        ),
        'symfony/config' => array(
            'pretty_version' => 'v6.0.8',
            'version' => '6.0.8.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/config',
            'aliases' => array(),
            'reference' => '6ac50d559aa64c8e7b5b17640c46241e4accb487',
            'dev_requirement' => false,
        ),
        'symfony/console' => array(
            'pretty_version' => 'v6.0.8',
            'version' => '6.0.8.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/console',
            'aliases' => array(),
            'reference' => '0d00aa289215353aa8746a31d101f8e60826285c',
            'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => array(
            'pretty_version' => 'v3.0.1',
            'version' => '3.0.1.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/deprecation-contracts',
            'aliases' => array(),
            'reference' => '26954b3d62a6c5fd0ea8a2a00c0353a14978d05c',
            'dev_requirement' => false,
        ),
        'symfony/filesystem' => array(
            'pretty_version' => 'v6.0.7',
            'version' => '6.0.7.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/filesystem',
            'aliases' => array(),
            'reference' => '6c9e4c41f2c51dfde3db298594ed9cba55dbf5ff',
            'dev_requirement' => false,
        ),
        'symfony/finder' => array(
            'pretty_version' => 'v6.0.8',
            'version' => '6.0.8.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/finder',
            'aliases' => array(),
            'reference' => 'af7edab28d17caecd1f40a9219fc646ae751c21f',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => array(
            'pretty_version' => 'v1.25.0',
            'version' => '1.25.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-ctype',
            'aliases' => array(),
            'reference' => '30885182c981ab175d4d034db0f6f469898070ab',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => array(
            'pretty_version' => 'v1.25.0',
            'version' => '1.25.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-grapheme',
            'aliases' => array(),
            'reference' => '81b86b50cf841a64252b439e738e97f4a34e2783',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => array(
            'pretty_version' => 'v1.25.0',
            'version' => '1.25.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-normalizer',
            'aliases' => array(),
            'reference' => '8590a5f561694770bdcd3f9b5c69dde6945028e8',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.25.0',
            'version' => '1.25.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'reference' => '0abb51d2f102e00a4eefcf46ba7fec406d245825',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-php81' => array(
            'pretty_version' => 'v1.25.0',
            'version' => '1.25.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php81',
            'aliases' => array(),
            'reference' => '5de4ba2d41b15f9bd0e19b2ab9674135813ec98f',
            'dev_requirement' => false,
        ),
        'symfony/service-contracts' => array(
            'pretty_version' => 'v3.0.1',
            'version' => '3.0.1.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/service-contracts',
            'aliases' => array(),
            'reference' => 'e517458f278c2131ca9f262f8fbaf01410f2c65c',
            'dev_requirement' => false,
        ),
        'symfony/string' => array(
            'pretty_version' => 'v6.0.8',
            'version' => '6.0.8.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/string',
            'aliases' => array(),
            'reference' => 'ac0aa5c2282e0de624c175b68d13f2c8f2e2649d',
            'dev_requirement' => false,
        ),
        'symfony/translation' => array(
            'pretty_version' => 'v6.0.8',
            'version' => '6.0.8.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/translation',
            'aliases' => array(),
            'reference' => '3d38cf8f8834148c4457681d539bc204de701501',
            'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => array(
            'pretty_version' => 'v3.0.1',
            'version' => '3.0.1.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/translation-contracts',
            'aliases' => array(),
            'reference' => 'c4183fc3ef0f0510893cbeedc7718fb5cafc9ac9',
            'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '2.3|3.0',
            ),
        ),
        'symfony/validator' => array(
            'pretty_version' => 'v6.0.8',
            'version' => '6.0.8.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/validator',
            'aliases' => array(),
            'reference' => 'd8f47eea936014e9e9d1cd3248f8c73d57dc248b',
            'dev_requirement' => false,
        ),
        'symfony/yaml' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/yaml',
            'aliases' => array(),
            'reference' => 'e77f3ea0b21141d771d4a5655faa54f692b34af5',
            'dev_requirement' => false,
        ),
    ),
);
