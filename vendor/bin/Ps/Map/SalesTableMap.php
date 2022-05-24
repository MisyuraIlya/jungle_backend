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
use Ps\Sales;
use Ps\SalesQuery;


/**
 * This class defines the structure of the 'sales' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SalesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.SalesTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'sales';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Sales';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Sales';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'sales.id';

    /**
     * the column name for the ex_id field
     */
    public const COL_EX_ID = 'sales.ex_id';

    /**
     * the column name for the quantity field
     */
    public const COL_QUANTITY = 'sales.quantity';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'sales.title';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'sales.price';

    /**
     * the column name for the end_date field
     */
    public const COL_END_DATE = 'sales.end_date';

    /**
     * the column name for the remarks field
     */
    public const COL_REMARKS = 'sales.remarks';

    /**
     * the column name for the code field
     */
    public const COL_CODE = 'sales.code';

    /**
     * the column name for the unpublished field
     */
    public const COL_UNPUBLISHED = 'sales.unpublished';

    /**
     * the column name for the price2 field
     */
    public const COL_PRICE2 = 'sales.price2';

    /**
     * the column name for the quantity2 field
     */
    public const COL_QUANTITY2 = 'sales.quantity2';

    /**
     * the column name for the price3 field
     */
    public const COL_PRICE3 = 'sales.price3';

    /**
     * the column name for the quantity3 field
     */
    public const COL_QUANTITY3 = 'sales.quantity3';

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
        self::TYPE_PHPNAME       => ['Id', 'ExId', 'Quantity', 'Title', 'Price', 'EndDate', 'Remarks', 'Code', 'Unpublished', 'Price2', 'Quantity2', 'Price3', 'Quantity3', ],
        self::TYPE_CAMELNAME     => ['id', 'exId', 'quantity', 'title', 'price', 'endDate', 'remarks', 'code', 'unpublished', 'price2', 'quantity2', 'price3', 'quantity3', ],
        self::TYPE_COLNAME       => [SalesTableMap::COL_ID, SalesTableMap::COL_EX_ID, SalesTableMap::COL_QUANTITY, SalesTableMap::COL_TITLE, SalesTableMap::COL_PRICE, SalesTableMap::COL_END_DATE, SalesTableMap::COL_REMARKS, SalesTableMap::COL_CODE, SalesTableMap::COL_UNPUBLISHED, SalesTableMap::COL_PRICE2, SalesTableMap::COL_QUANTITY2, SalesTableMap::COL_PRICE3, SalesTableMap::COL_QUANTITY3, ],
        self::TYPE_FIELDNAME     => ['id', 'ex_id', 'quantity', 'title', 'price', 'end_date', 'remarks', 'code', 'unpublished', 'price2', 'quantity2', 'price3', 'quantity3', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'ExId' => 1, 'Quantity' => 2, 'Title' => 3, 'Price' => 4, 'EndDate' => 5, 'Remarks' => 6, 'Code' => 7, 'Unpublished' => 8, 'Price2' => 9, 'Quantity2' => 10, 'Price3' => 11, 'Quantity3' => 12, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'exId' => 1, 'quantity' => 2, 'title' => 3, 'price' => 4, 'endDate' => 5, 'remarks' => 6, 'code' => 7, 'unpublished' => 8, 'price2' => 9, 'quantity2' => 10, 'price3' => 11, 'quantity3' => 12, ],
        self::TYPE_COLNAME       => [SalesTableMap::COL_ID => 0, SalesTableMap::COL_EX_ID => 1, SalesTableMap::COL_QUANTITY => 2, SalesTableMap::COL_TITLE => 3, SalesTableMap::COL_PRICE => 4, SalesTableMap::COL_END_DATE => 5, SalesTableMap::COL_REMARKS => 6, SalesTableMap::COL_CODE => 7, SalesTableMap::COL_UNPUBLISHED => 8, SalesTableMap::COL_PRICE2 => 9, SalesTableMap::COL_QUANTITY2 => 10, SalesTableMap::COL_PRICE3 => 11, SalesTableMap::COL_QUANTITY3 => 12, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'ex_id' => 1, 'quantity' => 2, 'title' => 3, 'price' => 4, 'end_date' => 5, 'remarks' => 6, 'code' => 7, 'unpublished' => 8, 'price2' => 9, 'quantity2' => 10, 'price3' => 11, 'quantity3' => 12, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Sales.Id' => 'ID',
        'id' => 'ID',
        'sales.id' => 'ID',
        'SalesTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'ExId' => 'EX_ID',
        'Sales.ExId' => 'EX_ID',
        'exId' => 'EX_ID',
        'sales.exId' => 'EX_ID',
        'SalesTableMap::COL_EX_ID' => 'EX_ID',
        'COL_EX_ID' => 'EX_ID',
        'ex_id' => 'EX_ID',
        'sales.ex_id' => 'EX_ID',
        'Quantity' => 'QUANTITY',
        'Sales.Quantity' => 'QUANTITY',
        'quantity' => 'QUANTITY',
        'sales.quantity' => 'QUANTITY',
        'SalesTableMap::COL_QUANTITY' => 'QUANTITY',
        'COL_QUANTITY' => 'QUANTITY',
        'Title' => 'TITLE',
        'Sales.Title' => 'TITLE',
        'title' => 'TITLE',
        'sales.title' => 'TITLE',
        'SalesTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'Price' => 'PRICE',
        'Sales.Price' => 'PRICE',
        'price' => 'PRICE',
        'sales.price' => 'PRICE',
        'SalesTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'EndDate' => 'END_DATE',
        'Sales.EndDate' => 'END_DATE',
        'endDate' => 'END_DATE',
        'sales.endDate' => 'END_DATE',
        'SalesTableMap::COL_END_DATE' => 'END_DATE',
        'COL_END_DATE' => 'END_DATE',
        'end_date' => 'END_DATE',
        'sales.end_date' => 'END_DATE',
        'Remarks' => 'REMARKS',
        'Sales.Remarks' => 'REMARKS',
        'remarks' => 'REMARKS',
        'sales.remarks' => 'REMARKS',
        'SalesTableMap::COL_REMARKS' => 'REMARKS',
        'COL_REMARKS' => 'REMARKS',
        'Code' => 'CODE',
        'Sales.Code' => 'CODE',
        'code' => 'CODE',
        'sales.code' => 'CODE',
        'SalesTableMap::COL_CODE' => 'CODE',
        'COL_CODE' => 'CODE',
        'Unpublished' => 'UNPUBLISHED',
        'Sales.Unpublished' => 'UNPUBLISHED',
        'unpublished' => 'UNPUBLISHED',
        'sales.unpublished' => 'UNPUBLISHED',
        'SalesTableMap::COL_UNPUBLISHED' => 'UNPUBLISHED',
        'COL_UNPUBLISHED' => 'UNPUBLISHED',
        'Price2' => 'PRICE2',
        'Sales.Price2' => 'PRICE2',
        'price2' => 'PRICE2',
        'sales.price2' => 'PRICE2',
        'SalesTableMap::COL_PRICE2' => 'PRICE2',
        'COL_PRICE2' => 'PRICE2',
        'Quantity2' => 'QUANTITY2',
        'Sales.Quantity2' => 'QUANTITY2',
        'quantity2' => 'QUANTITY2',
        'sales.quantity2' => 'QUANTITY2',
        'SalesTableMap::COL_QUANTITY2' => 'QUANTITY2',
        'COL_QUANTITY2' => 'QUANTITY2',
        'Price3' => 'PRICE3',
        'Sales.Price3' => 'PRICE3',
        'price3' => 'PRICE3',
        'sales.price3' => 'PRICE3',
        'SalesTableMap::COL_PRICE3' => 'PRICE3',
        'COL_PRICE3' => 'PRICE3',
        'Quantity3' => 'QUANTITY3',
        'Sales.Quantity3' => 'QUANTITY3',
        'quantity3' => 'QUANTITY3',
        'sales.quantity3' => 'QUANTITY3',
        'SalesTableMap::COL_QUANTITY3' => 'QUANTITY3',
        'COL_QUANTITY3' => 'QUANTITY3',
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
        $this->setName('sales');
        $this->setPhpName('Sales');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Sales');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ex_id', 'ExId', 'INTEGER', true, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('price', 'Price', 'INTEGER', true, null, null);
        $this->addColumn('end_date', 'EndDate', 'VARCHAR', true, 255, null);
        $this->addColumn('remarks', 'Remarks', 'VARCHAR', true, 255, null);
        $this->addColumn('code', 'Code', 'INTEGER', true, null, null);
        $this->addColumn('unpublished', 'Unpublished', 'INTEGER', true, null, null);
        $this->addColumn('price2', 'Price2', 'INTEGER', true, null, null);
        $this->addColumn('quantity2', 'Quantity2', 'INTEGER', true, null, null);
        $this->addColumn('price3', 'Price3', 'INTEGER', true, null, null);
        $this->addColumn('quantity3', 'Quantity3', 'INTEGER', true, null, null);
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
        return $withPrefix ? SalesTableMap::CLASS_DEFAULT : SalesTableMap::OM_CLASS;
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
     * @return array (Sales object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SalesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SalesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SalesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SalesTableMap::OM_CLASS;
            /** @var Sales $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SalesTableMap::addInstanceToPool($obj, $key);
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
            $key = SalesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SalesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Sales $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SalesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SalesTableMap::COL_ID);
            $criteria->addSelectColumn(SalesTableMap::COL_EX_ID);
            $criteria->addSelectColumn(SalesTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(SalesTableMap::COL_TITLE);
            $criteria->addSelectColumn(SalesTableMap::COL_PRICE);
            $criteria->addSelectColumn(SalesTableMap::COL_END_DATE);
            $criteria->addSelectColumn(SalesTableMap::COL_REMARKS);
            $criteria->addSelectColumn(SalesTableMap::COL_CODE);
            $criteria->addSelectColumn(SalesTableMap::COL_UNPUBLISHED);
            $criteria->addSelectColumn(SalesTableMap::COL_PRICE2);
            $criteria->addSelectColumn(SalesTableMap::COL_QUANTITY2);
            $criteria->addSelectColumn(SalesTableMap::COL_PRICE3);
            $criteria->addSelectColumn(SalesTableMap::COL_QUANTITY3);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ex_id');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.end_date');
            $criteria->addSelectColumn($alias . '.remarks');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.unpublished');
            $criteria->addSelectColumn($alias . '.price2');
            $criteria->addSelectColumn($alias . '.quantity2');
            $criteria->addSelectColumn($alias . '.price3');
            $criteria->addSelectColumn($alias . '.quantity3');
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
            $criteria->removeSelectColumn(SalesTableMap::COL_ID);
            $criteria->removeSelectColumn(SalesTableMap::COL_EX_ID);
            $criteria->removeSelectColumn(SalesTableMap::COL_QUANTITY);
            $criteria->removeSelectColumn(SalesTableMap::COL_TITLE);
            $criteria->removeSelectColumn(SalesTableMap::COL_PRICE);
            $criteria->removeSelectColumn(SalesTableMap::COL_END_DATE);
            $criteria->removeSelectColumn(SalesTableMap::COL_REMARKS);
            $criteria->removeSelectColumn(SalesTableMap::COL_CODE);
            $criteria->removeSelectColumn(SalesTableMap::COL_UNPUBLISHED);
            $criteria->removeSelectColumn(SalesTableMap::COL_PRICE2);
            $criteria->removeSelectColumn(SalesTableMap::COL_QUANTITY2);
            $criteria->removeSelectColumn(SalesTableMap::COL_PRICE3);
            $criteria->removeSelectColumn(SalesTableMap::COL_QUANTITY3);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.ex_id');
            $criteria->removeSelectColumn($alias . '.quantity');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.price');
            $criteria->removeSelectColumn($alias . '.end_date');
            $criteria->removeSelectColumn($alias . '.remarks');
            $criteria->removeSelectColumn($alias . '.code');
            $criteria->removeSelectColumn($alias . '.unpublished');
            $criteria->removeSelectColumn($alias . '.price2');
            $criteria->removeSelectColumn($alias . '.quantity2');
            $criteria->removeSelectColumn($alias . '.price3');
            $criteria->removeSelectColumn($alias . '.quantity3');
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
        return Propel::getServiceContainer()->getDatabaseMap(SalesTableMap::DATABASE_NAME)->getTable(SalesTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Sales or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Sales object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SalesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Sales) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SalesTableMap::DATABASE_NAME);
            $criteria->add(SalesTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SalesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SalesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SalesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the sales table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SalesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Sales or Criteria object.
     *
     * @param mixed $criteria Criteria or Sales object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Sales object
        }

        if ($criteria->containsKey(SalesTableMap::COL_ID) && $criteria->keyContainsValue(SalesTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SalesTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SalesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
