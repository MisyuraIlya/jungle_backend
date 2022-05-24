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
use Ps\Slider;
use Ps\SliderQuery;


/**
 * This class defines the structure of the 'slider' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SliderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.SliderTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'slider';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Slider';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Slider';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'slider.id';

    /**
     * the column name for the grid_id field
     */
    public const COL_GRID_ID = 'slider.grid_id';

    /**
     * the column name for the img field
     */
    public const COL_IMG = 'slider.img';

    /**
     * the column name for the link field
     */
    public const COL_LINK = 'slider.link';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'slider.title';

    /**
     * the column name for the orden field
     */
    public const COL_ORDEN = 'slider.orden';

    /**
     * the column name for the unpublished field
     */
    public const COL_UNPUBLISHED = 'slider.unpublished';

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
        self::TYPE_PHPNAME       => ['Id', 'GridId', 'Img', 'Link', 'Title', 'Orden', 'Unpublished', ],
        self::TYPE_CAMELNAME     => ['id', 'gridId', 'img', 'link', 'title', 'orden', 'unpublished', ],
        self::TYPE_COLNAME       => [SliderTableMap::COL_ID, SliderTableMap::COL_GRID_ID, SliderTableMap::COL_IMG, SliderTableMap::COL_LINK, SliderTableMap::COL_TITLE, SliderTableMap::COL_ORDEN, SliderTableMap::COL_UNPUBLISHED, ],
        self::TYPE_FIELDNAME     => ['id', 'grid_id', 'img', 'link', 'title', 'orden', 'unpublished', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'GridId' => 1, 'Img' => 2, 'Link' => 3, 'Title' => 4, 'Orden' => 5, 'Unpublished' => 6, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'gridId' => 1, 'img' => 2, 'link' => 3, 'title' => 4, 'orden' => 5, 'unpublished' => 6, ],
        self::TYPE_COLNAME       => [SliderTableMap::COL_ID => 0, SliderTableMap::COL_GRID_ID => 1, SliderTableMap::COL_IMG => 2, SliderTableMap::COL_LINK => 3, SliderTableMap::COL_TITLE => 4, SliderTableMap::COL_ORDEN => 5, SliderTableMap::COL_UNPUBLISHED => 6, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'grid_id' => 1, 'img' => 2, 'link' => 3, 'title' => 4, 'orden' => 5, 'unpublished' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Slider.Id' => 'ID',
        'id' => 'ID',
        'slider.id' => 'ID',
        'SliderTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'GridId' => 'GRID_ID',
        'Slider.GridId' => 'GRID_ID',
        'gridId' => 'GRID_ID',
        'slider.gridId' => 'GRID_ID',
        'SliderTableMap::COL_GRID_ID' => 'GRID_ID',
        'COL_GRID_ID' => 'GRID_ID',
        'grid_id' => 'GRID_ID',
        'slider.grid_id' => 'GRID_ID',
        'Img' => 'IMG',
        'Slider.Img' => 'IMG',
        'img' => 'IMG',
        'slider.img' => 'IMG',
        'SliderTableMap::COL_IMG' => 'IMG',
        'COL_IMG' => 'IMG',
        'Link' => 'LINK',
        'Slider.Link' => 'LINK',
        'link' => 'LINK',
        'slider.link' => 'LINK',
        'SliderTableMap::COL_LINK' => 'LINK',
        'COL_LINK' => 'LINK',
        'Title' => 'TITLE',
        'Slider.Title' => 'TITLE',
        'title' => 'TITLE',
        'slider.title' => 'TITLE',
        'SliderTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'Orden' => 'ORDEN',
        'Slider.Orden' => 'ORDEN',
        'orden' => 'ORDEN',
        'slider.orden' => 'ORDEN',
        'SliderTableMap::COL_ORDEN' => 'ORDEN',
        'COL_ORDEN' => 'ORDEN',
        'Unpublished' => 'UNPUBLISHED',
        'Slider.Unpublished' => 'UNPUBLISHED',
        'unpublished' => 'UNPUBLISHED',
        'slider.unpublished' => 'UNPUBLISHED',
        'SliderTableMap::COL_UNPUBLISHED' => 'UNPUBLISHED',
        'COL_UNPUBLISHED' => 'UNPUBLISHED',
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
        $this->setName('slider');
        $this->setPhpName('Slider');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Slider');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('grid_id', 'GridId', 'INTEGER', false, null, null);
        $this->addColumn('img', 'Img', 'VARCHAR', false, 255, null);
        $this->addColumn('link', 'Link', 'VARCHAR', false, 255, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('orden', 'Orden', 'INTEGER', false, null, null);
        $this->addColumn('unpublished', 'Unpublished', 'INTEGER', false, null, null);
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
        return $withPrefix ? SliderTableMap::CLASS_DEFAULT : SliderTableMap::OM_CLASS;
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
     * @return array (Slider object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SliderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SliderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SliderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SliderTableMap::OM_CLASS;
            /** @var Slider $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SliderTableMap::addInstanceToPool($obj, $key);
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
            $key = SliderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SliderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Slider $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SliderTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SliderTableMap::COL_ID);
            $criteria->addSelectColumn(SliderTableMap::COL_GRID_ID);
            $criteria->addSelectColumn(SliderTableMap::COL_IMG);
            $criteria->addSelectColumn(SliderTableMap::COL_LINK);
            $criteria->addSelectColumn(SliderTableMap::COL_TITLE);
            $criteria->addSelectColumn(SliderTableMap::COL_ORDEN);
            $criteria->addSelectColumn(SliderTableMap::COL_UNPUBLISHED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.grid_id');
            $criteria->addSelectColumn($alias . '.img');
            $criteria->addSelectColumn($alias . '.link');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.orden');
            $criteria->addSelectColumn($alias . '.unpublished');
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
            $criteria->removeSelectColumn(SliderTableMap::COL_ID);
            $criteria->removeSelectColumn(SliderTableMap::COL_GRID_ID);
            $criteria->removeSelectColumn(SliderTableMap::COL_IMG);
            $criteria->removeSelectColumn(SliderTableMap::COL_LINK);
            $criteria->removeSelectColumn(SliderTableMap::COL_TITLE);
            $criteria->removeSelectColumn(SliderTableMap::COL_ORDEN);
            $criteria->removeSelectColumn(SliderTableMap::COL_UNPUBLISHED);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.grid_id');
            $criteria->removeSelectColumn($alias . '.img');
            $criteria->removeSelectColumn($alias . '.link');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.orden');
            $criteria->removeSelectColumn($alias . '.unpublished');
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
        return Propel::getServiceContainer()->getDatabaseMap(SliderTableMap::DATABASE_NAME)->getTable(SliderTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Slider or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Slider object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SliderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Slider) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SliderTableMap::DATABASE_NAME);
            $criteria->add(SliderTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SliderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SliderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SliderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the slider table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SliderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Slider or Criteria object.
     *
     * @param mixed $criteria Criteria or Slider object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SliderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Slider object
        }

        if ($criteria->containsKey(SliderTableMap::COL_ID) && $criteria->keyContainsValue(SliderTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SliderTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SliderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
