<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\Ps\\Map\\AdministratorsTableMap',
    1 => '\\Ps\\Map\\ArticlesTableMap',
    2 => '\\Ps\\Map\\BannersTableMap',
    3 => '\\Ps\\Map\\CategoriesTableMap',
    4 => '\\Ps\\Map\\DistributionAreaTableMap',
    5 => '\\Ps\\Map\\FilterFamiliesTableMap',
    6 => '\\Ps\\Map\\FiltersTableMap',
    7 => '\\Ps\\Map\\NotificationTableMap',
    8 => '\\Ps\\Map\\OrderPartsTableMap',
    9 => '\\Ps\\Map\\OrdersTableMap',
    10 => '\\Ps\\Map\\ProductsTableMap',
    11 => '\\Ps\\Map\\SalesBarcodeTableMap',
    12 => '\\Ps\\Map\\SalesTableMap',
    13 => '\\Ps\\Map\\ShippingTableMap',
    14 => '\\Ps\\Map\\SliderTableMap',
    15 => '\\Ps\\Map\\UsersTableMap',
  ),
));
