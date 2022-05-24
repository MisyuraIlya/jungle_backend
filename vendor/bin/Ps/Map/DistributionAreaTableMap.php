<?php

namespace Ps\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Ps\DistributionArea;
use Ps\DistributionAreaQuery;


/**
 * This class defines the structure of the 'distribution_area' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class DistributionAreaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.DistributionAreaTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'distribution_area';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\DistributionArea';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.DistributionArea';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the Id field
     */
    public const COL_ID = 'distribution_area.Id';

    /**
     * the column name for the Title field
     */
    public const COL_TITLE = 'distribution_area.Title';

    /**
     * the column name for the Description field
     */
    public const COL_DESCRIPTION = 'distribution_area.Description';

    /**
     * the column name for the Color field
     */
    public const COL_COLOR = 'distribution_area.Color';

    /**
     * the column name for the Price field
     */
    public const COL_PRICE = 'distribution_area.Price';

    /**
     * the column name for the MinOrderPrice field
     */
    public const COL_MINORDERPRICE = 'distribution_area.MinOrderPrice';

    /**
     * the column name for the MinOrderPriceForFreeShipping field
     */
    public const COL_MINORDERPRICEFORFREESHIPPING = 'distribution_area.MinOrderPriceForFreeShipping';

    /**
     * the column name for the IsPublished field
     */
    public const COL_ISPUBLISHED = 'distribution_area.IsPublished';

    /**
     * the column name for the Created field
     */
    public const COL_CREATED = 'distribution_area.Created';

    /**
     * the column name for the Modified field
     */
    public const COL_MODIFIED = 'distribution_area.Modified';

    /**
     * the column name for the Location field
     */
    public const COL_LOCATION = 'distribution_area.Location';

    /**
     * the column name for the IsDeleted field
     */
    public const COL_ISDELETED = 'distribution_area.IsDeleted';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'Title', 'Description', 'Color', 'Price', 'Minorderprice', 'Minorderpriceforfreeshipping', 'Ispublished', 'Created', 'Modified', 'Location', 'Isdeleted', ],
        self::TYPE_CAMELNAME     => ['id', 'title', 'description', 'color', 'price', 'minorderprice', 'minorderpriceforfreeshipping', 'ispublished', 'created', 'modified', 'location', 'isdeleted', ],
        self::TYPE_COLNAME       => [DistributionAreaTableMap::COL_ID, DistributionAreaTableMap::COL_TITLE, DistributionAreaTableMap::COL_DESCRIPTION, DistributionAreaTableMap::COL_COLOR, DistributionAreaTableMap::COL_PRICE, DistributionAreaTableMap::COL_MINORDERPRICE, DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING, DistributionAreaTableMap::COL_ISPUBLISHED, DistributionAreaTableMap::COL_CREATED, DistributionAreaTableMap::COL_MODIFIED, DistributionAreaTableMap::COL_LOCATION, DistributionAreaTableMap::COL_ISDELETED, ],
        self::TYPE_FIELDNAME     => ['Id', 'Title', 'Description', 'Color', 'Price', 'MinOrderPrice', 'MinOrderPriceForFreeShipping', 'IsPublished', 'Created', 'Modified', 'Location', 'IsDeleted', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'Title' => 1, 'Description' => 2, 'Color' => 3, 'Price' => 4, 'Minorderprice' => 5, 'Minorderpriceforfreeshipping' => 6, 'Ispublished' => 7, 'Created' => 8, 'Modified' => 9, 'Location' => 10, 'Isdeleted' => 11, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'title' => 1, 'description' => 2, 'color' => 3, 'price' => 4, 'minorderprice' => 5, 'minorderpriceforfreeshipping' => 6, 'ispublished' => 7, 'created' => 8, 'modified' => 9, 'location' => 10, 'isdeleted' => 11, ],
        self::TYPE_COLNAME       => [DistributionAreaTableMap::COL_ID => 0, DistributionAreaTableMap::COL_TITLE => 1, DistributionAreaTableMap::COL_DESCRIPTION => 2, DistributionAreaTableMap::COL_COLOR => 3, DistributionAreaTableMap::COL_PRICE => 4, DistributionAreaTableMap::COL_MINORDERPRICE => 5, DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING => 6, DistributionAreaTableMap::COL_ISPUBLISHED => 7, DistributionAreaTableMap::COL_CREATED => 8, DistributionAreaTableMap::COL_MODIFIED => 9, DistributionAreaTableMap::COL_LOCATION => 10, DistributionAreaTableMap::COL_ISDELETED => 11, ],
        self::TYPE_FIELDNAME     => ['Id' => 0, 'Title' => 1, 'Description' => 2, 'Color' => 3, 'Price' => 4, 'MinOrderPrice' => 5, 'MinOrderPriceForFreeShipping' => 6, 'IsPublished' => 7, 'Created' => 8, 'Modified' => 9, 'Location' => 10, 'IsDeleted' => 11, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'DistributionArea.Id' => 'ID',
        'id' => 'ID',
        'distributionArea.id' => 'ID',
        'DistributionAreaTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'distribution_area.Id' => 'ID',
        'Title' => 'TITLE',
        'DistributionArea.Title' => 'TITLE',
        'title' => 'TITLE',
        'distributionArea.title' => 'TITLE',
        'DistributionAreaTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'distribution_area.Title' => 'TITLE',
        'Description' => 'DESCRIPTION',
        'DistributionArea.Description' => 'DESCRIPTION',
        'description' => 'DESCRIPTION',
        'distributionArea.description' => 'DESCRIPTION',
        'DistributionAreaTableMap::COL_DESCRIPTION' => 'DESCRIPTION',
        'COL_DESCRIPTION' => 'DESCRIPTION',
        'distribution_area.Description' => 'DESCRIPTION',
        'Color' => 'COLOR',
        'DistributionArea.Color' => 'COLOR',
        'color' => 'COLOR',
        'distributionArea.color' => 'COLOR',
        'DistributionAreaTableMap::COL_COLOR' => 'COLOR',
        'COL_COLOR' => 'COLOR',
        'distribution_area.Color' => 'COLOR',
        'Price' => 'PRICE',
        'DistributionArea.Price' => 'PRICE',
        'price' => 'PRICE',
        'distributionArea.price' => 'PRICE',
        'DistributionAreaTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'distribution_area.Price' => 'PRICE',
        'Minorderprice' => 'MINORDERPRICE',
        'DistributionArea.Minorderprice' => 'MINORDERPRICE',
        'minorderprice' => 'MINORDERPRICE',
        'distributionArea.minorderprice' => 'MINORDERPRICE',
        'DistributionAreaTableMap::COL_MINORDERPRICE' => 'MINORDERPRICE',
        'COL_MINORDERPRICE' => 'MINORDERPRICE',
        'MinOrderPrice' => 'MINORDERPRICE',
        'distribution_area.MinOrderPrice' => 'MINORDERPRICE',
        'Minorderpriceforfreeshipping' => 'MINORDERPRICEFORFREESHIPPING',
        'DistributionArea.Minorderpriceforfreeshipping' => 'MINORDERPRICEFORFREESHIPPING',
        'minorderpriceforfreeshipping' => 'MINORDERPRICEFORFREESHIPPING',
        'distributionArea.minorderpriceforfreeshipping' => 'MINORDERPRICEFORFREESHIPPING',
        'DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING' => 'MINORDERPRICEFORFREESHIPPING',
        'COL_MINORDERPRICEFORFREESHIPPING' => 'MINORDERPRICEFORFREESHIPPING',
        'MinOrderPriceForFreeShipping' => 'MINORDERPRICEFORFREESHIPPING',
        'distribution_area.MinOrderPriceForFreeShipping' => 'MINORDERPRICEFORFREESHIPPING',
        'Ispublished' => 'ISPUBLISHED',
        'DistributionArea.Ispublished' => 'ISPUBLISHED',
        'ispublished' => 'ISPUBLISHED',
        'distributionArea.ispublished' => 'ISPUBLISHED',
        'DistributionAreaTableMap::COL_ISPUBLISHED' => 'ISPUBLISHED',
        'COL_ISPUBLISHED' => 'ISPUBLISHED',
        'IsPublished' => 'ISPUBLISHED',
        'distribution_area.IsPublished' => 'ISPUBLISHED',
        'Created' => 'CREATED',
        'DistributionArea.Created' => 'CREATED',
        'created' => 'CREATED',
        'distributionArea.created' => 'CREATED',
        'DistributionAreaTableMap::COL_CREATED' => 'CREATED',
        'COL_CREATED' => 'CREATED',
        'distribution_area.Created' => 'CREATED',
        'Modified' => 'MODIFIED',
        'DistributionArea.Modified' => 'MODIFIED',
        'modified' => 'MODIFIED',
        'distributionArea.modified' => 'MODIFIED',
        'DistributionAreaTableMap::COL_MODIFIED' => 'MODIFIED',
        'COL_MODIFIED' => 'MODIFIED',
        'distribution_area.Modified' => 'MODIFIED',
        'Location' => 'LOCATION',
        'DistributionArea.Location' => 'LOCATION',
        'location' => 'LOCATION',
        'distributionArea.location' => 'LOCATION',
        'DistributionAreaTableMap::COL_LOCATION' => 'LOCATION',
        'COL_LOCATION' => 'LOCATION',
        'distribution_area.Location' => 'LOCATION',
        'Isdeleted' => 'ISDELETED',
        'DistributionArea.Isdeleted' => 'ISDELETED',
        'isdeleted' => 'ISDELETED',
        'distributionArea.isdeleted' => 'ISDELETED',
        'DistributionAreaTableMap::COL_ISDELETED' => 'ISDELETED',
        'COL_ISDELETED' => 'ISDELETED',
        'IsDeleted' => 'ISDELETED',
        'distribution_area.IsDeleted' => 'ISDELETED',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('distribution_area');
        $this->setPhpName('DistributionArea');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\DistributionArea');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('Id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('Description', 'Description', 'VARCHAR', true, 1023, null);
        $this->addColumn('Color', 'Color', 'VARCHAR', true, 10, null);
        $this->addColumn('Price', 'Price', 'FLOAT', true, null, null);
        $this->addColumn('MinOrderPrice', 'Minorderprice', 'FLOAT', true, null, null);
        $this->addColumn('MinOrderPriceForFreeShipping', 'Minorderpriceforfreeshipping', 'FLOAT', true, null, null);
        $this->addColumn('IsPublished', 'Ispublished', 'BOOLEAN', true, 1, null);
        $this->addColumn('Created', 'Created', 'TIMESTAMP', true, null, null);
        $this->addColumn('Modified', 'Modified', 'TIMESTAMP', true, null, null);
        $this->addColumn('Location', 'Location', 'VARCHAR', true, 1023, null);
        $this->addColumn('IsDeleted', 'Isdeleted', 'BOOLEAN', true, 1, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? DistributionAreaTableMap::CLASS_DEFAULT : DistributionAreaTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (DistributionArea object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = DistributionAreaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DistributionAreaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DistributionAreaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DistributionAreaTableMap::OM_CLASS;
            /** @var DistributionArea $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DistributionAreaTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = DistributionAreaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DistributionAreaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DistributionArea $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DistributionAreaTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_ID);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_TITLE);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_COLOR);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_PRICE);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_MINORDERPRICE);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_ISPUBLISHED);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_CREATED);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_MODIFIED);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_LOCATION);
            $criteria->addSelectColumn(DistributionAreaTableMap::COL_ISDELETED);
        } else {
            $criteria->addSelectColumn($alias . '.Id');
            $criteria->addSelectColumn($alias . '.Title');
            $criteria->addSelectColumn($alias . '.Description');
            $criteria->addSelectColumn($alias . '.Color');
            $criteria->addSelectColumn($alias . '.Price');
            $criteria->addSelectColumn($alias . '.MinOrderPrice');
            $criteria->addSelectColumn($alias . '.MinOrderPriceForFreeShipping');
            $criteria->addSelectColumn($alias . '.IsPublished');
            $criteria->addSelectColumn($alias . '.Created');
            $criteria->addSelectColumn($alias . '.Modified');
            $criteria->addSelectColumn($alias . '.Location');
            $criteria->addSelectColumn($alias . '.IsDeleted');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_ID);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_TITLE);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_DESCRIPTION);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_COLOR);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_PRICE);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_MINORDERPRICE);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_ISPUBLISHED);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_CREATED);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_MODIFIED);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_LOCATION);
            $criteria->removeSelectColumn(DistributionAreaTableMap::COL_ISDELETED);
        } else {
            $criteria->removeSelectColumn($alias . '.Id');
            $criteria->removeSelectColumn($alias . '.Title');
            $criteria->removeSelectColumn($alias . '.Description');
            $criteria->removeSelectColumn($alias . '.Color');
            $criteria->removeSelectColumn($alias . '.Price');
            $criteria->removeSelectColumn($alias . '.MinOrderPrice');
            $criteria->removeSelectColumn($alias . '.MinOrderPriceForFreeShipping');
            $criteria->removeSelectColumn($alias . '.IsPublished');
            $criteria->removeSelectColumn($alias . '.Created');
            $criteria->removeSelectColumn($alias . '.Modified');
            $criteria->removeSelectColumn($alias . '.Location');
            $criteria->removeSelectColumn($alias . '.IsDeleted');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(DistributionAreaTableMap::DATABASE_NAME)->getTable(DistributionAreaTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a DistributionArea or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or DistributionArea object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DistributionAreaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\DistributionArea) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DistributionAreaTableMap::DATABASE_NAME);
            $criteria->add(DistributionAreaTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = DistributionAreaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DistributionAreaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DistributionAreaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the distribution_area table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return DistributionAreaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DistributionArea or Criteria object.
     *
     * @param mixed $criteria Criteria or DistributionArea object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DistributionAreaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DistributionArea object
        }

        if ($criteria->containsKey(DistributionAreaTableMap::COL_ID) && $criteria->keyContainsValue(DistributionAreaTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DistributionAreaTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = DistributionAreaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
