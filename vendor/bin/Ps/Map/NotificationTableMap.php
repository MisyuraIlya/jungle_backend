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
use Ps\Notification;
use Ps\NotificationQuery;


/**
 * This class defines the structure of the 'notification' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class NotificationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.NotificationTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'notification';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Notification';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Notification';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'notification.id';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'notification.title';

    /**
     * the column name for the description field
     */
    public const COL_DESCRIPTION = 'notification.description';

    /**
     * the column name for the link field
     */
    public const COL_LINK = 'notification.link';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'notification.date';

    /**
     * the column name for the send_to field
     */
    public const COL_SEND_TO = 'notification.send_to';

    /**
     * the column name for the img field
     */
    public const COL_IMG = 'notification.img';

    /**
     * the column name for the video field
     */
    public const COL_VIDEO = 'notification.video';

    /**
     * the column name for the course_id field
     */
    public const COL_COURSE_ID = 'notification.course_id';

    /**
     * the column name for the price_for field
     */
    public const COL_PRICE_FOR = 'notification.price_for';

    /**
     * the column name for the public field
     */
    public const COL_PUBLIC = 'notification.public';

    /**
     * the column name for the unpublished field
     */
    public const COL_UNPUBLISHED = 'notification.unpublished';

    /**
     * the column name for the type field
     */
    public const COL_TYPE = 'notification.type';

    /**
     * the column name for the isDeleted field
     */
    public const COL_ISDELETED = 'notification.isDeleted';

    /**
     * the column name for the created field
     */
    public const COL_CREATED = 'notification.created';

    /**
     * the column name for the modified field
     */
    public const COL_MODIFIED = 'notification.modified';

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
        self::TYPE_PHPNAME       => ['Id', 'Title', 'Description', 'Link', 'Date', 'SendTo', 'Img', 'Video', 'CourseId', 'PriceFor', 'Public', 'Unpublished', 'Type', 'Isdeleted', 'Created', 'Modified', ],
        self::TYPE_CAMELNAME     => ['id', 'title', 'description', 'link', 'date', 'sendTo', 'img', 'video', 'courseId', 'priceFor', 'public', 'unpublished', 'type', 'isdeleted', 'created', 'modified', ],
        self::TYPE_COLNAME       => [NotificationTableMap::COL_ID, NotificationTableMap::COL_TITLE, NotificationTableMap::COL_DESCRIPTION, NotificationTableMap::COL_LINK, NotificationTableMap::COL_DATE, NotificationTableMap::COL_SEND_TO, NotificationTableMap::COL_IMG, NotificationTableMap::COL_VIDEO, NotificationTableMap::COL_COURSE_ID, NotificationTableMap::COL_PRICE_FOR, NotificationTableMap::COL_PUBLIC, NotificationTableMap::COL_UNPUBLISHED, NotificationTableMap::COL_TYPE, NotificationTableMap::COL_ISDELETED, NotificationTableMap::COL_CREATED, NotificationTableMap::COL_MODIFIED, ],
        self::TYPE_FIELDNAME     => ['id', 'title', 'description', 'link', 'date', 'send_to', 'img', 'video', 'course_id', 'price_for', 'public', 'unpublished', 'type', 'isDeleted', 'created', 'modified', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'Title' => 1, 'Description' => 2, 'Link' => 3, 'Date' => 4, 'SendTo' => 5, 'Img' => 6, 'Video' => 7, 'CourseId' => 8, 'PriceFor' => 9, 'Public' => 10, 'Unpublished' => 11, 'Type' => 12, 'Isdeleted' => 13, 'Created' => 14, 'Modified' => 15, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'title' => 1, 'description' => 2, 'link' => 3, 'date' => 4, 'sendTo' => 5, 'img' => 6, 'video' => 7, 'courseId' => 8, 'priceFor' => 9, 'public' => 10, 'unpublished' => 11, 'type' => 12, 'isdeleted' => 13, 'created' => 14, 'modified' => 15, ],
        self::TYPE_COLNAME       => [NotificationTableMap::COL_ID => 0, NotificationTableMap::COL_TITLE => 1, NotificationTableMap::COL_DESCRIPTION => 2, NotificationTableMap::COL_LINK => 3, NotificationTableMap::COL_DATE => 4, NotificationTableMap::COL_SEND_TO => 5, NotificationTableMap::COL_IMG => 6, NotificationTableMap::COL_VIDEO => 7, NotificationTableMap::COL_COURSE_ID => 8, NotificationTableMap::COL_PRICE_FOR => 9, NotificationTableMap::COL_PUBLIC => 10, NotificationTableMap::COL_UNPUBLISHED => 11, NotificationTableMap::COL_TYPE => 12, NotificationTableMap::COL_ISDELETED => 13, NotificationTableMap::COL_CREATED => 14, NotificationTableMap::COL_MODIFIED => 15, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'title' => 1, 'description' => 2, 'link' => 3, 'date' => 4, 'send_to' => 5, 'img' => 6, 'video' => 7, 'course_id' => 8, 'price_for' => 9, 'public' => 10, 'unpublished' => 11, 'type' => 12, 'isDeleted' => 13, 'created' => 14, 'modified' => 15, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Notification.Id' => 'ID',
        'id' => 'ID',
        'notification.id' => 'ID',
        'NotificationTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Title' => 'TITLE',
        'Notification.Title' => 'TITLE',
        'title' => 'TITLE',
        'notification.title' => 'TITLE',
        'NotificationTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'Description' => 'DESCRIPTION',
        'Notification.Description' => 'DESCRIPTION',
        'description' => 'DESCRIPTION',
        'notification.description' => 'DESCRIPTION',
        'NotificationTableMap::COL_DESCRIPTION' => 'DESCRIPTION',
        'COL_DESCRIPTION' => 'DESCRIPTION',
        'Link' => 'LINK',
        'Notification.Link' => 'LINK',
        'link' => 'LINK',
        'notification.link' => 'LINK',
        'NotificationTableMap::COL_LINK' => 'LINK',
        'COL_LINK' => 'LINK',
        'Date' => 'DATE',
        'Notification.Date' => 'DATE',
        'date' => 'DATE',
        'notification.date' => 'DATE',
        'NotificationTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'SendTo' => 'SEND_TO',
        'Notification.SendTo' => 'SEND_TO',
        'sendTo' => 'SEND_TO',
        'notification.sendTo' => 'SEND_TO',
        'NotificationTableMap::COL_SEND_TO' => 'SEND_TO',
        'COL_SEND_TO' => 'SEND_TO',
        'send_to' => 'SEND_TO',
        'notification.send_to' => 'SEND_TO',
        'Img' => 'IMG',
        'Notification.Img' => 'IMG',
        'img' => 'IMG',
        'notification.img' => 'IMG',
        'NotificationTableMap::COL_IMG' => 'IMG',
        'COL_IMG' => 'IMG',
        'Video' => 'VIDEO',
        'Notification.Video' => 'VIDEO',
        'video' => 'VIDEO',
        'notification.video' => 'VIDEO',
        'NotificationTableMap::COL_VIDEO' => 'VIDEO',
        'COL_VIDEO' => 'VIDEO',
        'CourseId' => 'COURSE_ID',
        'Notification.CourseId' => 'COURSE_ID',
        'courseId' => 'COURSE_ID',
        'notification.courseId' => 'COURSE_ID',
        'NotificationTableMap::COL_COURSE_ID' => 'COURSE_ID',
        'COL_COURSE_ID' => 'COURSE_ID',
        'course_id' => 'COURSE_ID',
        'notification.course_id' => 'COURSE_ID',
        'PriceFor' => 'PRICE_FOR',
        'Notification.PriceFor' => 'PRICE_FOR',
        'priceFor' => 'PRICE_FOR',
        'notification.priceFor' => 'PRICE_FOR',
        'NotificationTableMap::COL_PRICE_FOR' => 'PRICE_FOR',
        'COL_PRICE_FOR' => 'PRICE_FOR',
        'price_for' => 'PRICE_FOR',
        'notification.price_for' => 'PRICE_FOR',
        'Public' => 'PUBLIC',
        'Notification.Public' => 'PUBLIC',
        'public' => 'PUBLIC',
        'notification.public' => 'PUBLIC',
        'NotificationTableMap::COL_PUBLIC' => 'PUBLIC',
        'COL_PUBLIC' => 'PUBLIC',
        'Unpublished' => 'UNPUBLISHED',
        'Notification.Unpublished' => 'UNPUBLISHED',
        'unpublished' => 'UNPUBLISHED',
        'notification.unpublished' => 'UNPUBLISHED',
        'NotificationTableMap::COL_UNPUBLISHED' => 'UNPUBLISHED',
        'COL_UNPUBLISHED' => 'UNPUBLISHED',
        'Type' => 'TYPE',
        'Notification.Type' => 'TYPE',
        'type' => 'TYPE',
        'notification.type' => 'TYPE',
        'NotificationTableMap::COL_TYPE' => 'TYPE',
        'COL_TYPE' => 'TYPE',
        'Isdeleted' => 'ISDELETED',
        'Notification.Isdeleted' => 'ISDELETED',
        'isdeleted' => 'ISDELETED',
        'notification.isdeleted' => 'ISDELETED',
        'NotificationTableMap::COL_ISDELETED' => 'ISDELETED',
        'COL_ISDELETED' => 'ISDELETED',
        'isDeleted' => 'ISDELETED',
        'notification.isDeleted' => 'ISDELETED',
        'Created' => 'CREATED',
        'Notification.Created' => 'CREATED',
        'created' => 'CREATED',
        'notification.created' => 'CREATED',
        'NotificationTableMap::COL_CREATED' => 'CREATED',
        'COL_CREATED' => 'CREATED',
        'Modified' => 'MODIFIED',
        'Notification.Modified' => 'MODIFIED',
        'modified' => 'MODIFIED',
        'notification.modified' => 'MODIFIED',
        'NotificationTableMap::COL_MODIFIED' => 'MODIFIED',
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
        $this->setName('notification');
        $this->setPhpName('Notification');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Notification');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('link', 'Link', 'VARCHAR', false, 255, null);
        $this->addColumn('date', 'Date', 'VARCHAR', false, 255, null);
        $this->addColumn('send_to', 'SendTo', 'INTEGER', false, null, 1);
        $this->addColumn('img', 'Img', 'VARCHAR', false, 255, null);
        $this->addColumn('video', 'Video', 'VARCHAR', false, 255, null);
        $this->addColumn('course_id', 'CourseId', 'VARCHAR', false, 255, null);
        $this->addColumn('price_for', 'PriceFor', 'VARCHAR', false, 255, null);
        $this->addColumn('public', 'Public', 'INTEGER', false, null, null);
        $this->addColumn('unpublished', 'Unpublished', 'INTEGER', false, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 1, null);
        $this->addColumn('isDeleted', 'Isdeleted', 'BOOLEAN', true, 1, false);
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
        return $withPrefix ? NotificationTableMap::CLASS_DEFAULT : NotificationTableMap::OM_CLASS;
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
     * @return array (Notification object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = NotificationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = NotificationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + NotificationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NotificationTableMap::OM_CLASS;
            /** @var Notification $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            NotificationTableMap::addInstanceToPool($obj, $key);
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
            $key = NotificationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = NotificationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Notification $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NotificationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(NotificationTableMap::COL_ID);
            $criteria->addSelectColumn(NotificationTableMap::COL_TITLE);
            $criteria->addSelectColumn(NotificationTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(NotificationTableMap::COL_LINK);
            $criteria->addSelectColumn(NotificationTableMap::COL_DATE);
            $criteria->addSelectColumn(NotificationTableMap::COL_SEND_TO);
            $criteria->addSelectColumn(NotificationTableMap::COL_IMG);
            $criteria->addSelectColumn(NotificationTableMap::COL_VIDEO);
            $criteria->addSelectColumn(NotificationTableMap::COL_COURSE_ID);
            $criteria->addSelectColumn(NotificationTableMap::COL_PRICE_FOR);
            $criteria->addSelectColumn(NotificationTableMap::COL_PUBLIC);
            $criteria->addSelectColumn(NotificationTableMap::COL_UNPUBLISHED);
            $criteria->addSelectColumn(NotificationTableMap::COL_TYPE);
            $criteria->addSelectColumn(NotificationTableMap::COL_ISDELETED);
            $criteria->addSelectColumn(NotificationTableMap::COL_CREATED);
            $criteria->addSelectColumn(NotificationTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.link');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.send_to');
            $criteria->addSelectColumn($alias . '.img');
            $criteria->addSelectColumn($alias . '.video');
            $criteria->addSelectColumn($alias . '.course_id');
            $criteria->addSelectColumn($alias . '.price_for');
            $criteria->addSelectColumn($alias . '.public');
            $criteria->addSelectColumn($alias . '.unpublished');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.isDeleted');
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
            $criteria->removeSelectColumn(NotificationTableMap::COL_ID);
            $criteria->removeSelectColumn(NotificationTableMap::COL_TITLE);
            $criteria->removeSelectColumn(NotificationTableMap::COL_DESCRIPTION);
            $criteria->removeSelectColumn(NotificationTableMap::COL_LINK);
            $criteria->removeSelectColumn(NotificationTableMap::COL_DATE);
            $criteria->removeSelectColumn(NotificationTableMap::COL_SEND_TO);
            $criteria->removeSelectColumn(NotificationTableMap::COL_IMG);
            $criteria->removeSelectColumn(NotificationTableMap::COL_VIDEO);
            $criteria->removeSelectColumn(NotificationTableMap::COL_COURSE_ID);
            $criteria->removeSelectColumn(NotificationTableMap::COL_PRICE_FOR);
            $criteria->removeSelectColumn(NotificationTableMap::COL_PUBLIC);
            $criteria->removeSelectColumn(NotificationTableMap::COL_UNPUBLISHED);
            $criteria->removeSelectColumn(NotificationTableMap::COL_TYPE);
            $criteria->removeSelectColumn(NotificationTableMap::COL_ISDELETED);
            $criteria->removeSelectColumn(NotificationTableMap::COL_CREATED);
            $criteria->removeSelectColumn(NotificationTableMap::COL_MODIFIED);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.description');
            $criteria->removeSelectColumn($alias . '.link');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.send_to');
            $criteria->removeSelectColumn($alias . '.img');
            $criteria->removeSelectColumn($alias . '.video');
            $criteria->removeSelectColumn($alias . '.course_id');
            $criteria->removeSelectColumn($alias . '.price_for');
            $criteria->removeSelectColumn($alias . '.public');
            $criteria->removeSelectColumn($alias . '.unpublished');
            $criteria->removeSelectColumn($alias . '.type');
            $criteria->removeSelectColumn($alias . '.isDeleted');
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
        return Propel::getServiceContainer()->getDatabaseMap(NotificationTableMap::DATABASE_NAME)->getTable(NotificationTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Notification or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Notification object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Notification) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NotificationTableMap::DATABASE_NAME);
            $criteria->add(NotificationTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = NotificationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            NotificationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                NotificationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the notification table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return NotificationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Notification or Criteria object.
     *
     * @param mixed $criteria Criteria or Notification object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Notification object
        }

        if ($criteria->containsKey(NotificationTableMap::COL_ID) && $criteria->keyContainsValue(NotificationTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NotificationTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = NotificationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
