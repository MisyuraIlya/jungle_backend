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
use Ps\Orders;
use Ps\OrdersQuery;


/**
 * This class defines the structure of the 'orders' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrdersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.OrdersTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'orders';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Orders';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Orders';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 25;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 25;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'orders.id';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'orders.date';

    /**
     * the column name for the format_date field
     */
    public const COL_FORMAT_DATE = 'orders.format_date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'orders.time';

    /**
     * the column name for the user_id field
     */
    public const COL_USER_ID = 'orders.user_id';

    /**
     * the column name for the delivery_id field
     */
    public const COL_DELIVERY_ID = 'orders.delivery_id';

    /**
     * the column name for the pickup field
     */
    public const COL_PICKUP = 'orders.pickup';

    /**
     * the column name for the total field
     */
    public const COL_TOTAL = 'orders.total';

    /**
     * the column name for the status field
     */
    public const COL_STATUS = 'orders.status';

    /**
     * the column name for the comment field
     */
    public const COL_COMMENT = 'orders.comment';

    /**
     * the column name for the transaction field
     */
    public const COL_TRANSACTION = 'orders.transaction';

    /**
     * the column name for the mail field
     */
    public const COL_MAIL = 'orders.mail';

    /**
     * the column name for the tel field
     */
    public const COL_TEL = 'orders.tel';

    /**
     * the column name for the first_name field
     */
    public const COL_FIRST_NAME = 'orders.first_name';

    /**
     * the column name for the last_name field
     */
    public const COL_LAST_NAME = 'orders.last_name';

    /**
     * the column name for the passport field
     */
    public const COL_PASSPORT = 'orders.passport';

    /**
     * the column name for the town field
     */
    public const COL_TOWN = 'orders.town';

    /**
     * the column name for the address field
     */
    public const COL_ADDRESS = 'orders.address';

    /**
     * the column name for the zip field
     */
    public const COL_ZIP = 'orders.zip';

    /**
     * the column name for the house field
     */
    public const COL_HOUSE = 'orders.house';

    /**
     * the column name for the appartment field
     */
    public const COL_APPARTMENT = 'orders.appartment';

    /**
     * the column name for the floor field
     */
    public const COL_FLOOR = 'orders.floor';

    /**
     * the column name for the entrance field
     */
    public const COL_ENTRANCE = 'orders.entrance';

    /**
     * the column name for the created field
     */
    public const COL_CREATED = 'orders.created';

    /**
     * the column name for the modified field
     */
    public const COL_MODIFIED = 'orders.modified';

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
        self::TYPE_PHPNAME       => ['Id', 'Date', 'FormatDate', 'Time', 'UserId', 'DeliveryId', 'Pickup', 'Total', 'Status', 'Comment', 'Transaction', 'Mail', 'Tel', 'FirstName', 'LastName', 'Passport', 'Town', 'Address', 'Zip', 'House', 'Appartment', 'Floor', 'Entrance', 'Created', 'Modified', ],
        self::TYPE_CAMELNAME     => ['id', 'date', 'formatDate', 'time', 'userId', 'deliveryId', 'pickup', 'total', 'status', 'comment', 'transaction', 'mail', 'tel', 'firstName', 'lastName', 'passport', 'town', 'address', 'zip', 'house', 'appartment', 'floor', 'entrance', 'created', 'modified', ],
        self::TYPE_COLNAME       => [OrdersTableMap::COL_ID, OrdersTableMap::COL_DATE, OrdersTableMap::COL_FORMAT_DATE, OrdersTableMap::COL_TIME, OrdersTableMap::COL_USER_ID, OrdersTableMap::COL_DELIVERY_ID, OrdersTableMap::COL_PICKUP, OrdersTableMap::COL_TOTAL, OrdersTableMap::COL_STATUS, OrdersTableMap::COL_COMMENT, OrdersTableMap::COL_TRANSACTION, OrdersTableMap::COL_MAIL, OrdersTableMap::COL_TEL, OrdersTableMap::COL_FIRST_NAME, OrdersTableMap::COL_LAST_NAME, OrdersTableMap::COL_PASSPORT, OrdersTableMap::COL_TOWN, OrdersTableMap::COL_ADDRESS, OrdersTableMap::COL_ZIP, OrdersTableMap::COL_HOUSE, OrdersTableMap::COL_APPARTMENT, OrdersTableMap::COL_FLOOR, OrdersTableMap::COL_ENTRANCE, OrdersTableMap::COL_CREATED, OrdersTableMap::COL_MODIFIED, ],
        self::TYPE_FIELDNAME     => ['id', 'date', 'format_date', 'time', 'user_id', 'delivery_id', 'pickup', 'total', 'status', 'comment', 'transaction', 'mail', 'tel', 'first_name', 'last_name', 'passport', 'town', 'address', 'zip', 'house', 'appartment', 'floor', 'entrance', 'created', 'modified', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'Date' => 1, 'FormatDate' => 2, 'Time' => 3, 'UserId' => 4, 'DeliveryId' => 5, 'Pickup' => 6, 'Total' => 7, 'Status' => 8, 'Comment' => 9, 'Transaction' => 10, 'Mail' => 11, 'Tel' => 12, 'FirstName' => 13, 'LastName' => 14, 'Passport' => 15, 'Town' => 16, 'Address' => 17, 'Zip' => 18, 'House' => 19, 'Appartment' => 20, 'Floor' => 21, 'Entrance' => 22, 'Created' => 23, 'Modified' => 24, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'date' => 1, 'formatDate' => 2, 'time' => 3, 'userId' => 4, 'deliveryId' => 5, 'pickup' => 6, 'total' => 7, 'status' => 8, 'comment' => 9, 'transaction' => 10, 'mail' => 11, 'tel' => 12, 'firstName' => 13, 'lastName' => 14, 'passport' => 15, 'town' => 16, 'address' => 17, 'zip' => 18, 'house' => 19, 'appartment' => 20, 'floor' => 21, 'entrance' => 22, 'created' => 23, 'modified' => 24, ],
        self::TYPE_COLNAME       => [OrdersTableMap::COL_ID => 0, OrdersTableMap::COL_DATE => 1, OrdersTableMap::COL_FORMAT_DATE => 2, OrdersTableMap::COL_TIME => 3, OrdersTableMap::COL_USER_ID => 4, OrdersTableMap::COL_DELIVERY_ID => 5, OrdersTableMap::COL_PICKUP => 6, OrdersTableMap::COL_TOTAL => 7, OrdersTableMap::COL_STATUS => 8, OrdersTableMap::COL_COMMENT => 9, OrdersTableMap::COL_TRANSACTION => 10, OrdersTableMap::COL_MAIL => 11, OrdersTableMap::COL_TEL => 12, OrdersTableMap::COL_FIRST_NAME => 13, OrdersTableMap::COL_LAST_NAME => 14, OrdersTableMap::COL_PASSPORT => 15, OrdersTableMap::COL_TOWN => 16, OrdersTableMap::COL_ADDRESS => 17, OrdersTableMap::COL_ZIP => 18, OrdersTableMap::COL_HOUSE => 19, OrdersTableMap::COL_APPARTMENT => 20, OrdersTableMap::COL_FLOOR => 21, OrdersTableMap::COL_ENTRANCE => 22, OrdersTableMap::COL_CREATED => 23, OrdersTableMap::COL_MODIFIED => 24, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'date' => 1, 'format_date' => 2, 'time' => 3, 'user_id' => 4, 'delivery_id' => 5, 'pickup' => 6, 'total' => 7, 'status' => 8, 'comment' => 9, 'transaction' => 10, 'mail' => 11, 'tel' => 12, 'first_name' => 13, 'last_name' => 14, 'passport' => 15, 'town' => 16, 'address' => 17, 'zip' => 18, 'house' => 19, 'appartment' => 20, 'floor' => 21, 'entrance' => 22, 'created' => 23, 'modified' => 24, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Orders.Id' => 'ID',
        'id' => 'ID',
        'orders.id' => 'ID',
        'OrdersTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Date' => 'DATE',
        'Orders.Date' => 'DATE',
        'date' => 'DATE',
        'orders.date' => 'DATE',
        'OrdersTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'FormatDate' => 'FORMAT_DATE',
        'Orders.FormatDate' => 'FORMAT_DATE',
        'formatDate' => 'FORMAT_DATE',
        'orders.formatDate' => 'FORMAT_DATE',
        'OrdersTableMap::COL_FORMAT_DATE' => 'FORMAT_DATE',
        'COL_FORMAT_DATE' => 'FORMAT_DATE',
        'format_date' => 'FORMAT_DATE',
        'orders.format_date' => 'FORMAT_DATE',
        'Time' => 'TIME',
        'Orders.Time' => 'TIME',
        'time' => 'TIME',
        'orders.time' => 'TIME',
        'OrdersTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'UserId' => 'USER_ID',
        'Orders.UserId' => 'USER_ID',
        'userId' => 'USER_ID',
        'orders.userId' => 'USER_ID',
        'OrdersTableMap::COL_USER_ID' => 'USER_ID',
        'COL_USER_ID' => 'USER_ID',
        'user_id' => 'USER_ID',
        'orders.user_id' => 'USER_ID',
        'DeliveryId' => 'DELIVERY_ID',
        'Orders.DeliveryId' => 'DELIVERY_ID',
        'deliveryId' => 'DELIVERY_ID',
        'orders.deliveryId' => 'DELIVERY_ID',
        'OrdersTableMap::COL_DELIVERY_ID' => 'DELIVERY_ID',
        'COL_DELIVERY_ID' => 'DELIVERY_ID',
        'delivery_id' => 'DELIVERY_ID',
        'orders.delivery_id' => 'DELIVERY_ID',
        'Pickup' => 'PICKUP',
        'Orders.Pickup' => 'PICKUP',
        'pickup' => 'PICKUP',
        'orders.pickup' => 'PICKUP',
        'OrdersTableMap::COL_PICKUP' => 'PICKUP',
        'COL_PICKUP' => 'PICKUP',
        'Total' => 'TOTAL',
        'Orders.Total' => 'TOTAL',
        'total' => 'TOTAL',
        'orders.total' => 'TOTAL',
        'OrdersTableMap::COL_TOTAL' => 'TOTAL',
        'COL_TOTAL' => 'TOTAL',
        'Status' => 'STATUS',
        'Orders.Status' => 'STATUS',
        'status' => 'STATUS',
        'orders.status' => 'STATUS',
        'OrdersTableMap::COL_STATUS' => 'STATUS',
        'COL_STATUS' => 'STATUS',
        'Comment' => 'COMMENT',
        'Orders.Comment' => 'COMMENT',
        'comment' => 'COMMENT',
        'orders.comment' => 'COMMENT',
        'OrdersTableMap::COL_COMMENT' => 'COMMENT',
        'COL_COMMENT' => 'COMMENT',
        'Transaction' => 'TRANSACTION',
        'Orders.Transaction' => 'TRANSACTION',
        'transaction' => 'TRANSACTION',
        'orders.transaction' => 'TRANSACTION',
        'OrdersTableMap::COL_TRANSACTION' => 'TRANSACTION',
        'COL_TRANSACTION' => 'TRANSACTION',
        'Mail' => 'MAIL',
        'Orders.Mail' => 'MAIL',
        'mail' => 'MAIL',
        'orders.mail' => 'MAIL',
        'OrdersTableMap::COL_MAIL' => 'MAIL',
        'COL_MAIL' => 'MAIL',
        'Tel' => 'TEL',
        'Orders.Tel' => 'TEL',
        'tel' => 'TEL',
        'orders.tel' => 'TEL',
        'OrdersTableMap::COL_TEL' => 'TEL',
        'COL_TEL' => 'TEL',
        'FirstName' => 'FIRST_NAME',
        'Orders.FirstName' => 'FIRST_NAME',
        'firstName' => 'FIRST_NAME',
        'orders.firstName' => 'FIRST_NAME',
        'OrdersTableMap::COL_FIRST_NAME' => 'FIRST_NAME',
        'COL_FIRST_NAME' => 'FIRST_NAME',
        'first_name' => 'FIRST_NAME',
        'orders.first_name' => 'FIRST_NAME',
        'LastName' => 'LAST_NAME',
        'Orders.LastName' => 'LAST_NAME',
        'lastName' => 'LAST_NAME',
        'orders.lastName' => 'LAST_NAME',
        'OrdersTableMap::COL_LAST_NAME' => 'LAST_NAME',
        'COL_LAST_NAME' => 'LAST_NAME',
        'last_name' => 'LAST_NAME',
        'orders.last_name' => 'LAST_NAME',
        'Passport' => 'PASSPORT',
        'Orders.Passport' => 'PASSPORT',
        'passport' => 'PASSPORT',
        'orders.passport' => 'PASSPORT',
        'OrdersTableMap::COL_PASSPORT' => 'PASSPORT',
        'COL_PASSPORT' => 'PASSPORT',
        'Town' => 'TOWN',
        'Orders.Town' => 'TOWN',
        'town' => 'TOWN',
        'orders.town' => 'TOWN',
        'OrdersTableMap::COL_TOWN' => 'TOWN',
        'COL_TOWN' => 'TOWN',
        'Address' => 'ADDRESS',
        'Orders.Address' => 'ADDRESS',
        'address' => 'ADDRESS',
        'orders.address' => 'ADDRESS',
        'OrdersTableMap::COL_ADDRESS' => 'ADDRESS',
        'COL_ADDRESS' => 'ADDRESS',
        'Zip' => 'ZIP',
        'Orders.Zip' => 'ZIP',
        'zip' => 'ZIP',
        'orders.zip' => 'ZIP',
        'OrdersTableMap::COL_ZIP' => 'ZIP',
        'COL_ZIP' => 'ZIP',
        'House' => 'HOUSE',
        'Orders.House' => 'HOUSE',
        'house' => 'HOUSE',
        'orders.house' => 'HOUSE',
        'OrdersTableMap::COL_HOUSE' => 'HOUSE',
        'COL_HOUSE' => 'HOUSE',
        'Appartment' => 'APPARTMENT',
        'Orders.Appartment' => 'APPARTMENT',
        'appartment' => 'APPARTMENT',
        'orders.appartment' => 'APPARTMENT',
        'OrdersTableMap::COL_APPARTMENT' => 'APPARTMENT',
        'COL_APPARTMENT' => 'APPARTMENT',
        'Floor' => 'FLOOR',
        'Orders.Floor' => 'FLOOR',
        'floor' => 'FLOOR',
        'orders.floor' => 'FLOOR',
        'OrdersTableMap::COL_FLOOR' => 'FLOOR',
        'COL_FLOOR' => 'FLOOR',
        'Entrance' => 'ENTRANCE',
        'Orders.Entrance' => 'ENTRANCE',
        'entrance' => 'ENTRANCE',
        'orders.entrance' => 'ENTRANCE',
        'OrdersTableMap::COL_ENTRANCE' => 'ENTRANCE',
        'COL_ENTRANCE' => 'ENTRANCE',
        'Created' => 'CREATED',
        'Orders.Created' => 'CREATED',
        'created' => 'CREATED',
        'orders.created' => 'CREATED',
        'OrdersTableMap::COL_CREATED' => 'CREATED',
        'COL_CREATED' => 'CREATED',
        'Modified' => 'MODIFIED',
        'Orders.Modified' => 'MODIFIED',
        'modified' => 'MODIFIED',
        'orders.modified' => 'MODIFIED',
        'OrdersTableMap::COL_MODIFIED' => 'MODIFIED',
        'COL_MODIFIED' => 'MODIFIED',
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
        $this->setName('orders');
        $this->setPhpName('Orders');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Orders');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'VARCHAR', false, 255, null);
        $this->addColumn('format_date', 'FormatDate', 'VARCHAR', false, 255, null);
        $this->addColumn('time', 'Time', 'VARCHAR', false, 255, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addColumn('delivery_id', 'DeliveryId', 'INTEGER', false, null, null);
        $this->addColumn('pickup', 'Pickup', 'VARCHAR', false, 255, null);
        $this->addColumn('total', 'Total', 'VARCHAR', false, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 255, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', false, 255, null);
        $this->addColumn('transaction', 'Transaction', 'VARCHAR', false, 1023, null);
        $this->addColumn('mail', 'Mail', 'VARCHAR', false, 255, null);
        $this->addColumn('tel', 'Tel', 'VARCHAR', false, 255, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 255, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 255, null);
        $this->addColumn('passport', 'Passport', 'VARCHAR', false, 255, null);
        $this->addColumn('town', 'Town', 'VARCHAR', false, 255, null);
        $this->addColumn('address', 'Address', 'VARCHAR', false, 255, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', false, 255, null);
        $this->addColumn('house', 'House', 'VARCHAR', false, 10, null);
        $this->addColumn('appartment', 'Appartment', 'VARCHAR', false, 10, null);
        $this->addColumn('floor', 'Floor', 'VARCHAR', false, 10, null);
        $this->addColumn('entrance', 'Entrance', 'VARCHAR', false, 10, null);
        $this->addColumn('created', 'Created', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('modified', 'Modified', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        return $withPrefix ? OrdersTableMap::CLASS_DEFAULT : OrdersTableMap::OM_CLASS;
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
     * @return array (Orders object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrdersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrdersTableMap::OM_CLASS;
            /** @var Orders $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrdersTableMap::addInstanceToPool($obj, $key);
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
            $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Orders $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrdersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OrdersTableMap::COL_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_DATE);
            $criteria->addSelectColumn(OrdersTableMap::COL_FORMAT_DATE);
            $criteria->addSelectColumn(OrdersTableMap::COL_TIME);
            $criteria->addSelectColumn(OrdersTableMap::COL_USER_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_DELIVERY_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_PICKUP);
            $criteria->addSelectColumn(OrdersTableMap::COL_TOTAL);
            $criteria->addSelectColumn(OrdersTableMap::COL_STATUS);
            $criteria->addSelectColumn(OrdersTableMap::COL_COMMENT);
            $criteria->addSelectColumn(OrdersTableMap::COL_TRANSACTION);
            $criteria->addSelectColumn(OrdersTableMap::COL_MAIL);
            $criteria->addSelectColumn(OrdersTableMap::COL_TEL);
            $criteria->addSelectColumn(OrdersTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(OrdersTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(OrdersTableMap::COL_PASSPORT);
            $criteria->addSelectColumn(OrdersTableMap::COL_TOWN);
            $criteria->addSelectColumn(OrdersTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(OrdersTableMap::COL_ZIP);
            $criteria->addSelectColumn(OrdersTableMap::COL_HOUSE);
            $criteria->addSelectColumn(OrdersTableMap::COL_APPARTMENT);
            $criteria->addSelectColumn(OrdersTableMap::COL_FLOOR);
            $criteria->addSelectColumn(OrdersTableMap::COL_ENTRANCE);
            $criteria->addSelectColumn(OrdersTableMap::COL_CREATED);
            $criteria->addSelectColumn(OrdersTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.format_date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.delivery_id');
            $criteria->addSelectColumn($alias . '.pickup');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.transaction');
            $criteria->addSelectColumn($alias . '.mail');
            $criteria->addSelectColumn($alias . '.tel');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.passport');
            $criteria->addSelectColumn($alias . '.town');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.house');
            $criteria->addSelectColumn($alias . '.appartment');
            $criteria->addSelectColumn($alias . '.floor');
            $criteria->addSelectColumn($alias . '.entrance');
            $criteria->addSelectColumn($alias . '.created');
            $criteria->addSelectColumn($alias . '.modified');
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
            $criteria->removeSelectColumn(OrdersTableMap::COL_ID);
            $criteria->removeSelectColumn(OrdersTableMap::COL_DATE);
            $criteria->removeSelectColumn(OrdersTableMap::COL_FORMAT_DATE);
            $criteria->removeSelectColumn(OrdersTableMap::COL_TIME);
            $criteria->removeSelectColumn(OrdersTableMap::COL_USER_ID);
            $criteria->removeSelectColumn(OrdersTableMap::COL_DELIVERY_ID);
            $criteria->removeSelectColumn(OrdersTableMap::COL_PICKUP);
            $criteria->removeSelectColumn(OrdersTableMap::COL_TOTAL);
            $criteria->removeSelectColumn(OrdersTableMap::COL_STATUS);
            $criteria->removeSelectColumn(OrdersTableMap::COL_COMMENT);
            $criteria->removeSelectColumn(OrdersTableMap::COL_TRANSACTION);
            $criteria->removeSelectColumn(OrdersTableMap::COL_MAIL);
            $criteria->removeSelectColumn(OrdersTableMap::COL_TEL);
            $criteria->removeSelectColumn(OrdersTableMap::COL_FIRST_NAME);
            $criteria->removeSelectColumn(OrdersTableMap::COL_LAST_NAME);
            $criteria->removeSelectColumn(OrdersTableMap::COL_PASSPORT);
            $criteria->removeSelectColumn(OrdersTableMap::COL_TOWN);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ADDRESS);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ZIP);
            $criteria->removeSelectColumn(OrdersTableMap::COL_HOUSE);
            $criteria->removeSelectColumn(OrdersTableMap::COL_APPARTMENT);
            $criteria->removeSelectColumn(OrdersTableMap::COL_FLOOR);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ENTRANCE);
            $criteria->removeSelectColumn(OrdersTableMap::COL_CREATED);
            $criteria->removeSelectColumn(OrdersTableMap::COL_MODIFIED);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.format_date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.user_id');
            $criteria->removeSelectColumn($alias . '.delivery_id');
            $criteria->removeSelectColumn($alias . '.pickup');
            $criteria->removeSelectColumn($alias . '.total');
            $criteria->removeSelectColumn($alias . '.status');
            $criteria->removeSelectColumn($alias . '.comment');
            $criteria->removeSelectColumn($alias . '.transaction');
            $criteria->removeSelectColumn($alias . '.mail');
            $criteria->removeSelectColumn($alias . '.tel');
            $criteria->removeSelectColumn($alias . '.first_name');
            $criteria->removeSelectColumn($alias . '.last_name');
            $criteria->removeSelectColumn($alias . '.passport');
            $criteria->removeSelectColumn($alias . '.town');
            $criteria->removeSelectColumn($alias . '.address');
            $criteria->removeSelectColumn($alias . '.zip');
            $criteria->removeSelectColumn($alias . '.house');
            $criteria->removeSelectColumn($alias . '.appartment');
            $criteria->removeSelectColumn($alias . '.floor');
            $criteria->removeSelectColumn($alias . '.entrance');
            $criteria->removeSelectColumn($alias . '.created');
            $criteria->removeSelectColumn($alias . '.modified');
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
        return Propel::getServiceContainer()->getDatabaseMap(OrdersTableMap::DATABASE_NAME)->getTable(OrdersTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Orders or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Orders object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Orders) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrdersTableMap::DATABASE_NAME);
            $criteria->add(OrdersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = OrdersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrdersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrdersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return OrdersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Orders or Criteria object.
     *
     * @param mixed $criteria Criteria or Orders object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Orders object
        }

        if ($criteria->containsKey(OrdersTableMap::COL_ID) && $criteria->keyContainsValue(OrdersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrdersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = OrdersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
