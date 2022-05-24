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
use Ps\OrderParts;
use Ps\OrderPartsQuery;


/**
 * This class defines the structure of the 'order_parts' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrderPartsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.OrderPartsTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'order_parts';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\OrderParts';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.OrderParts';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'order_parts.id';

    /**
     * the column name for the order_id field
     */
    public const COL_ORDER_ID = 'order_parts.order_id';

    /**
     * the column name for the user_id field
     */
    public const COL_USER_ID = 'order_parts.user_id';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'order_parts.date';

    /**
     * the column name for the makat field
     */
    public const COL_MAKAT = 'order_parts.makat';

    /**
     * the column name for the barcode field
     */
    public const COL_BARCODE = 'order_parts.barcode';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'order_parts.title';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'order_parts.price';

    /**
     * the column name for the total field
     */
    public const COL_TOTAL = 'order_parts.total';

    /**
     * the column name for the quantity field
     */
    public const COL_QUANTITY = 'order_parts.quantity';

    /**
     * the column name for the img field
     */
    public const COL_IMG = 'order_parts.img';

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
        self::TYPE_PHPNAME       => ['Id', 'OrderId', 'UserId', 'Date', 'Makat', 'Barcode', 'Title', 'Price', 'Total', 'Quantity', 'Img', ],
        self::TYPE_CAMELNAME     => ['id', 'orderId', 'userId', 'date', 'makat', 'barcode', 'title', 'price', 'total', 'quantity', 'img', ],
        self::TYPE_COLNAME       => [OrderPartsTableMap::COL_ID, OrderPartsTableMap::COL_ORDER_ID, OrderPartsTableMap::COL_USER_ID, OrderPartsTableMap::COL_DATE, OrderPartsTableMap::COL_MAKAT, OrderPartsTableMap::COL_BARCODE, OrderPartsTableMap::COL_TITLE, OrderPartsTableMap::COL_PRICE, OrderPartsTableMap::COL_TOTAL, OrderPartsTableMap::COL_QUANTITY, OrderPartsTableMap::COL_IMG, ],
        self::TYPE_FIELDNAME     => ['id', 'order_id', 'user_id', 'date', 'makat', 'barcode', 'title', 'price', 'total', 'quantity', 'img', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'OrderId' => 1, 'UserId' => 2, 'Date' => 3, 'Makat' => 4, 'Barcode' => 5, 'Title' => 6, 'Price' => 7, 'Total' => 8, 'Quantity' => 9, 'Img' => 10, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'orderId' => 1, 'userId' => 2, 'date' => 3, 'makat' => 4, 'barcode' => 5, 'title' => 6, 'price' => 7, 'total' => 8, 'quantity' => 9, 'img' => 10, ],
        self::TYPE_COLNAME       => [OrderPartsTableMap::COL_ID => 0, OrderPartsTableMap::COL_ORDER_ID => 1, OrderPartsTableMap::COL_USER_ID => 2, OrderPartsTableMap::COL_DATE => 3, OrderPartsTableMap::COL_MAKAT => 4, OrderPartsTableMap::COL_BARCODE => 5, OrderPartsTableMap::COL_TITLE => 6, OrderPartsTableMap::COL_PRICE => 7, OrderPartsTableMap::COL_TOTAL => 8, OrderPartsTableMap::COL_QUANTITY => 9, OrderPartsTableMap::COL_IMG => 10, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'order_id' => 1, 'user_id' => 2, 'date' => 3, 'makat' => 4, 'barcode' => 5, 'title' => 6, 'price' => 7, 'total' => 8, 'quantity' => 9, 'img' => 10, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'OrderParts.Id' => 'ID',
        'id' => 'ID',
        'orderParts.id' => 'ID',
        'OrderPartsTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'order_parts.id' => 'ID',
        'OrderId' => 'ORDER_ID',
        'OrderParts.OrderId' => 'ORDER_ID',
        'orderId' => 'ORDER_ID',
        'orderParts.orderId' => 'ORDER_ID',
        'OrderPartsTableMap::COL_ORDER_ID' => 'ORDER_ID',
        'COL_ORDER_ID' => 'ORDER_ID',
        'order_id' => 'ORDER_ID',
        'order_parts.order_id' => 'ORDER_ID',
        'UserId' => 'USER_ID',
        'OrderParts.UserId' => 'USER_ID',
        'userId' => 'USER_ID',
        'orderParts.userId' => 'USER_ID',
        'OrderPartsTableMap::COL_USER_ID' => 'USER_ID',
        'COL_USER_ID' => 'USER_ID',
        'user_id' => 'USER_ID',
        'order_parts.user_id' => 'USER_ID',
        'Date' => 'DATE',
        'OrderParts.Date' => 'DATE',
        'date' => 'DATE',
        'orderParts.date' => 'DATE',
        'OrderPartsTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'order_parts.date' => 'DATE',
        'Makat' => 'MAKAT',
        'OrderParts.Makat' => 'MAKAT',
        'makat' => 'MAKAT',
        'orderParts.makat' => 'MAKAT',
        'OrderPartsTableMap::COL_MAKAT' => 'MAKAT',
        'COL_MAKAT' => 'MAKAT',
        'order_parts.makat' => 'MAKAT',
        'Barcode' => 'BARCODE',
        'OrderParts.Barcode' => 'BARCODE',
        'barcode' => 'BARCODE',
        'orderParts.barcode' => 'BARCODE',
        'OrderPartsTableMap::COL_BARCODE' => 'BARCODE',
        'COL_BARCODE' => 'BARCODE',
        'order_parts.barcode' => 'BARCODE',
        'Title' => 'TITLE',
        'OrderParts.Title' => 'TITLE',
        'title' => 'TITLE',
        'orderParts.title' => 'TITLE',
        'OrderPartsTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'order_parts.title' => 'TITLE',
        'Price' => 'PRICE',
        'OrderParts.Price' => 'PRICE',
        'price' => 'PRICE',
        'orderParts.price' => 'PRICE',
        'OrderPartsTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'order_parts.price' => 'PRICE',
        'Total' => 'TOTAL',
        'OrderParts.Total' => 'TOTAL',
        'total' => 'TOTAL',
        'orderParts.total' => 'TOTAL',
        'OrderPartsTableMap::COL_TOTAL' => 'TOTAL',
        'COL_TOTAL' => 'TOTAL',
        'order_parts.total' => 'TOTAL',
        'Quantity' => 'QUANTITY',
        'OrderParts.Quantity' => 'QUANTITY',
        'quantity' => 'QUANTITY',
        'orderParts.quantity' => 'QUANTITY',
        'OrderPartsTableMap::COL_QUANTITY' => 'QUANTITY',
        'COL_QUANTITY' => 'QUANTITY',
        'order_parts.quantity' => 'QUANTITY',
        'Img' => 'IMG',
        'OrderParts.Img' => 'IMG',
        'img' => 'IMG',
        'orderParts.img' => 'IMG',
        'OrderPartsTableMap::COL_IMG' => 'IMG',
        'COL_IMG' => 'IMG',
        'order_parts.img' => 'IMG',
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
        $this->setName('order_parts');
        $this->setPhpName('OrderParts');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\OrderParts');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('order_id', 'OrderId', 'INTEGER', false, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addColumn('date', 'Date', 'VARCHAR', false, 255, null);
        $this->addColumn('makat', 'Makat', 'VARCHAR', false, 255, null);
        $this->addColumn('barcode', 'Barcode', 'VARCHAR', false, 255, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('price', 'Price', 'VARCHAR', false, 255, null);
        $this->addColumn('total', 'Total', 'VARCHAR', false, 255, null);
        $this->addColumn('quantity', 'Quantity', 'VARCHAR', false, 255, null);
        $this->addColumn('img', 'Img', 'VARCHAR', false, 255, null);
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
        return $withPrefix ? OrderPartsTableMap::CLASS_DEFAULT : OrderPartsTableMap::OM_CLASS;
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
     * @return array (OrderParts object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = OrderPartsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrderPartsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrderPartsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrderPartsTableMap::OM_CLASS;
            /** @var OrderParts $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrderPartsTableMap::addInstanceToPool($obj, $key);
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
            $key = OrderPartsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrderPartsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OrderParts $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrderPartsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OrderPartsTableMap::COL_ID);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_USER_ID);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_DATE);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_MAKAT);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_BARCODE);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_TITLE);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_PRICE);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_TOTAL);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(OrderPartsTableMap::COL_IMG);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.makat');
            $criteria->addSelectColumn($alias . '.barcode');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.img');
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
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_ID);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_ORDER_ID);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_USER_ID);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_DATE);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_MAKAT);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_BARCODE);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_TITLE);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_PRICE);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_TOTAL);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_QUANTITY);
            $criteria->removeSelectColumn(OrderPartsTableMap::COL_IMG);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.order_id');
            $criteria->removeSelectColumn($alias . '.user_id');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.makat');
            $criteria->removeSelectColumn($alias . '.barcode');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.price');
            $criteria->removeSelectColumn($alias . '.total');
            $criteria->removeSelectColumn($alias . '.quantity');
            $criteria->removeSelectColumn($alias . '.img');
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
        return Propel::getServiceContainer()->getDatabaseMap(OrderPartsTableMap::DATABASE_NAME)->getTable(OrderPartsTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a OrderParts or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or OrderParts object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrderPartsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\OrderParts) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrderPartsTableMap::DATABASE_NAME);
            $criteria->add(OrderPartsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = OrderPartsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrderPartsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrderPartsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the order_parts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return OrderPartsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OrderParts or Criteria object.
     *
     * @param mixed $criteria Criteria or OrderParts object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderPartsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OrderParts object
        }

        if ($criteria->containsKey(OrderPartsTableMap::COL_ID) && $criteria->keyContainsValue(OrderPartsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrderPartsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = OrderPartsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
