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
use Ps\SalesBarcode;
use Ps\SalesBarcodeQuery;


/**
 * This class defines the structure of the 'sales_barcode' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SalesBarcodeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.SalesBarcodeTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'sales_barcode';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\SalesBarcode';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.SalesBarcode';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'sales_barcode.id';

    /**
     * the column name for the ex_id field
     */
    public const COL_EX_ID = 'sales_barcode.ex_id';

    /**
     * the column name for the item_code field
     */
    public const COL_ITEM_CODE = 'sales_barcode.item_code';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'sales_barcode.price';

    /**
     * the column name for the code field
     */
    public const COL_CODE = 'sales_barcode.code';

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
        self::TYPE_PHPNAME       => ['Id', 'ExId', 'ItemCode', 'Price', 'Code', ],
        self::TYPE_CAMELNAME     => ['id', 'exId', 'itemCode', 'price', 'code', ],
        self::TYPE_COLNAME       => [SalesBarcodeTableMap::COL_ID, SalesBarcodeTableMap::COL_EX_ID, SalesBarcodeTableMap::COL_ITEM_CODE, SalesBarcodeTableMap::COL_PRICE, SalesBarcodeTableMap::COL_CODE, ],
        self::TYPE_FIELDNAME     => ['id', 'ex_id', 'item_code', 'price', 'code', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'ExId' => 1, 'ItemCode' => 2, 'Price' => 3, 'Code' => 4, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'exId' => 1, 'itemCode' => 2, 'price' => 3, 'code' => 4, ],
        self::TYPE_COLNAME       => [SalesBarcodeTableMap::COL_ID => 0, SalesBarcodeTableMap::COL_EX_ID => 1, SalesBarcodeTableMap::COL_ITEM_CODE => 2, SalesBarcodeTableMap::COL_PRICE => 3, SalesBarcodeTableMap::COL_CODE => 4, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'ex_id' => 1, 'item_code' => 2, 'price' => 3, 'code' => 4, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'SalesBarcode.Id' => 'ID',
        'id' => 'ID',
        'salesBarcode.id' => 'ID',
        'SalesBarcodeTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'sales_barcode.id' => 'ID',
        'ExId' => 'EX_ID',
        'SalesBarcode.ExId' => 'EX_ID',
        'exId' => 'EX_ID',
        'salesBarcode.exId' => 'EX_ID',
        'SalesBarcodeTableMap::COL_EX_ID' => 'EX_ID',
        'COL_EX_ID' => 'EX_ID',
        'ex_id' => 'EX_ID',
        'sales_barcode.ex_id' => 'EX_ID',
        'ItemCode' => 'ITEM_CODE',
        'SalesBarcode.ItemCode' => 'ITEM_CODE',
        'itemCode' => 'ITEM_CODE',
        'salesBarcode.itemCode' => 'ITEM_CODE',
        'SalesBarcodeTableMap::COL_ITEM_CODE' => 'ITEM_CODE',
        'COL_ITEM_CODE' => 'ITEM_CODE',
        'item_code' => 'ITEM_CODE',
        'sales_barcode.item_code' => 'ITEM_CODE',
        'Price' => 'PRICE',
        'SalesBarcode.Price' => 'PRICE',
        'price' => 'PRICE',
        'salesBarcode.price' => 'PRICE',
        'SalesBarcodeTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'sales_barcode.price' => 'PRICE',
        'Code' => 'CODE',
        'SalesBarcode.Code' => 'CODE',
        'code' => 'CODE',
        'salesBarcode.code' => 'CODE',
        'SalesBarcodeTableMap::COL_CODE' => 'CODE',
        'COL_CODE' => 'CODE',
        'sales_barcode.code' => 'CODE',
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
        $this->setName('sales_barcode');
        $this->setPhpName('SalesBarcode');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\SalesBarcode');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ex_id', 'ExId', 'INTEGER', true, null, null);
        $this->addColumn('item_code', 'ItemCode', 'VARCHAR', true, 255, null);
        $this->addColumn('price', 'Price', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? SalesBarcodeTableMap::CLASS_DEFAULT : SalesBarcodeTableMap::OM_CLASS;
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
     * @return array (SalesBarcode object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SalesBarcodeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SalesBarcodeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SalesBarcodeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SalesBarcodeTableMap::OM_CLASS;
            /** @var SalesBarcode $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SalesBarcodeTableMap::addInstanceToPool($obj, $key);
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
            $key = SalesBarcodeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SalesBarcodeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SalesBarcode $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SalesBarcodeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SalesBarcodeTableMap::COL_ID);
            $criteria->addSelectColumn(SalesBarcodeTableMap::COL_EX_ID);
            $criteria->addSelectColumn(SalesBarcodeTableMap::COL_ITEM_CODE);
            $criteria->addSelectColumn(SalesBarcodeTableMap::COL_PRICE);
            $criteria->addSelectColumn(SalesBarcodeTableMap::COL_CODE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ex_id');
            $criteria->addSelectColumn($alias . '.item_code');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.code');
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
            $criteria->removeSelectColumn(SalesBarcodeTableMap::COL_ID);
            $criteria->removeSelectColumn(SalesBarcodeTableMap::COL_EX_ID);
            $criteria->removeSelectColumn(SalesBarcodeTableMap::COL_ITEM_CODE);
            $criteria->removeSelectColumn(SalesBarcodeTableMap::COL_PRICE);
            $criteria->removeSelectColumn(SalesBarcodeTableMap::COL_CODE);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.ex_id');
            $criteria->removeSelectColumn($alias . '.item_code');
            $criteria->removeSelectColumn($alias . '.price');
            $criteria->removeSelectColumn($alias . '.code');
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
        return Propel::getServiceContainer()->getDatabaseMap(SalesBarcodeTableMap::DATABASE_NAME)->getTable(SalesBarcodeTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a SalesBarcode or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or SalesBarcode object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SalesBarcodeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\SalesBarcode) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SalesBarcodeTableMap::DATABASE_NAME);
            $criteria->add(SalesBarcodeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SalesBarcodeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SalesBarcodeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SalesBarcodeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the sales_barcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SalesBarcodeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SalesBarcode or Criteria object.
     *
     * @param mixed $criteria Criteria or SalesBarcode object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesBarcodeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SalesBarcode object
        }

        if ($criteria->containsKey(SalesBarcodeTableMap::COL_ID) && $criteria->keyContainsValue(SalesBarcodeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SalesBarcodeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SalesBarcodeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
