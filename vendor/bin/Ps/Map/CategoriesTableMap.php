<?php

namespace Ps\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Ps\Categories;
use Ps\CategoriesQuery;


/**
 * This class defines the structure of the 'categories' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class CategoriesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.CategoriesTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'categories';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Categories';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Categories';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'categories.id';

    /**
     * the column name for the parent_id field
     */
    public const COL_PARENT_ID = 'categories.parent_id';

    /**
     * the column name for the ex_id field
     */
    public const COL_EX_ID = 'categories.ex_id';

    /**
     * the column name for the code field
     */
    public const COL_CODE = 'categories.code';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'categories.title';

    /**
     * the column name for the inner_title field
     */
    public const COL_INNER_TITLE = 'categories.inner_title';

    /**
     * the column name for the img field
     */
    public const COL_IMG = 'categories.img';

    /**
     * the column name for the img_wide field
     */
    public const COL_IMG_WIDE = 'categories.img_wide';

    /**
     * the column name for the orden field
     */
    public const COL_ORDEN = 'categories.orden';

    /**
     * the column name for the unpublished field
     */
    public const COL_UNPUBLISHED = 'categories.unpublished';

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
        self::TYPE_PHPNAME       => ['Id', 'ParentId', 'ExId', 'Code', 'Title', 'InnerTitle', 'Img', 'ImgWide', 'Orden', 'Unpublished', ],
        self::TYPE_CAMELNAME     => ['id', 'parentId', 'exId', 'code', 'title', 'innerTitle', 'img', 'imgWide', 'orden', 'unpublished', ],
        self::TYPE_COLNAME       => [CategoriesTableMap::COL_ID, CategoriesTableMap::COL_PARENT_ID, CategoriesTableMap::COL_EX_ID, CategoriesTableMap::COL_CODE, CategoriesTableMap::COL_TITLE, CategoriesTableMap::COL_INNER_TITLE, CategoriesTableMap::COL_IMG, CategoriesTableMap::COL_IMG_WIDE, CategoriesTableMap::COL_ORDEN, CategoriesTableMap::COL_UNPUBLISHED, ],
        self::TYPE_FIELDNAME     => ['id', 'parent_id', 'ex_id', 'code', 'title', 'inner_title', 'img', 'img_wide', 'orden', 'unpublished', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'ParentId' => 1, 'ExId' => 2, 'Code' => 3, 'Title' => 4, 'InnerTitle' => 5, 'Img' => 6, 'ImgWide' => 7, 'Orden' => 8, 'Unpublished' => 9, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'parentId' => 1, 'exId' => 2, 'code' => 3, 'title' => 4, 'innerTitle' => 5, 'img' => 6, 'imgWide' => 7, 'orden' => 8, 'unpublished' => 9, ],
        self::TYPE_COLNAME       => [CategoriesTableMap::COL_ID => 0, CategoriesTableMap::COL_PARENT_ID => 1, CategoriesTableMap::COL_EX_ID => 2, CategoriesTableMap::COL_CODE => 3, CategoriesTableMap::COL_TITLE => 4, CategoriesTableMap::COL_INNER_TITLE => 5, CategoriesTableMap::COL_IMG => 6, CategoriesTableMap::COL_IMG_WIDE => 7, CategoriesTableMap::COL_ORDEN => 8, CategoriesTableMap::COL_UNPUBLISHED => 9, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'parent_id' => 1, 'ex_id' => 2, 'code' => 3, 'title' => 4, 'inner_title' => 5, 'img' => 6, 'img_wide' => 7, 'orden' => 8, 'unpublished' => 9, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Categories.Id' => 'ID',
        'id' => 'ID',
        'categories.id' => 'ID',
        'CategoriesTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'ParentId' => 'PARENT_ID',
        'Categories.ParentId' => 'PARENT_ID',
        'parentId' => 'PARENT_ID',
        'categories.parentId' => 'PARENT_ID',
        'CategoriesTableMap::COL_PARENT_ID' => 'PARENT_ID',
        'COL_PARENT_ID' => 'PARENT_ID',
        'parent_id' => 'PARENT_ID',
        'categories.parent_id' => 'PARENT_ID',
        'ExId' => 'EX_ID',
        'Categories.ExId' => 'EX_ID',
        'exId' => 'EX_ID',
        'categories.exId' => 'EX_ID',
        'CategoriesTableMap::COL_EX_ID' => 'EX_ID',
        'COL_EX_ID' => 'EX_ID',
        'ex_id' => 'EX_ID',
        'categories.ex_id' => 'EX_ID',
        'Code' => 'CODE',
        'Categories.Code' => 'CODE',
        'code' => 'CODE',
        'categories.code' => 'CODE',
        'CategoriesTableMap::COL_CODE' => 'CODE',
        'COL_CODE' => 'CODE',
        'Title' => 'TITLE',
        'Categories.Title' => 'TITLE',
        'title' => 'TITLE',
        'categories.title' => 'TITLE',
        'CategoriesTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'InnerTitle' => 'INNER_TITLE',
        'Categories.InnerTitle' => 'INNER_TITLE',
        'innerTitle' => 'INNER_TITLE',
        'categories.innerTitle' => 'INNER_TITLE',
        'CategoriesTableMap::COL_INNER_TITLE' => 'INNER_TITLE',
        'COL_INNER_TITLE' => 'INNER_TITLE',
        'inner_title' => 'INNER_TITLE',
        'categories.inner_title' => 'INNER_TITLE',
        'Img' => 'IMG',
        'Categories.Img' => 'IMG',
        'img' => 'IMG',
        'categories.img' => 'IMG',
        'CategoriesTableMap::COL_IMG' => 'IMG',
        'COL_IMG' => 'IMG',
        'ImgWide' => 'IMG_WIDE',
        'Categories.ImgWide' => 'IMG_WIDE',
        'imgWide' => 'IMG_WIDE',
        'categories.imgWide' => 'IMG_WIDE',
        'CategoriesTableMap::COL_IMG_WIDE' => 'IMG_WIDE',
        'COL_IMG_WIDE' => 'IMG_WIDE',
        'img_wide' => 'IMG_WIDE',
        'categories.img_wide' => 'IMG_WIDE',
        'Orden' => 'ORDEN',
        'Categories.Orden' => 'ORDEN',
        'orden' => 'ORDEN',
        'categories.orden' => 'ORDEN',
        'CategoriesTableMap::COL_ORDEN' => 'ORDEN',
        'COL_ORDEN' => 'ORDEN',
        'Unpublished' => 'UNPUBLISHED',
        'Categories.Unpublished' => 'UNPUBLISHED',
        'unpublished' => 'UNPUBLISHED',
        'categories.unpublished' => 'UNPUBLISHED',
        'CategoriesTableMap::COL_UNPUBLISHED' => 'UNPUBLISHED',
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
        $this->setName('categories');
        $this->setPhpName('Categories');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Categories');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('parent_id', 'ParentId', 'INTEGER', false, null, null);
        $this->addColumn('ex_id', 'ExId', 'VARCHAR', false, 255, null);
        $this->addColumn('code', 'Code', 'VARCHAR', false, 255, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('inner_title', 'InnerTitle', 'VARCHAR', false, 255, null);
        $this->addColumn('img', 'Img', 'VARCHAR', false, 255, null);
        $this->addColumn('img_wide', 'ImgWide', 'VARCHAR', false, 255, null);
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
        return null;
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
        return '';
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
        return $withPrefix ? CategoriesTableMap::CLASS_DEFAULT : CategoriesTableMap::OM_CLASS;
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
     * @return array (Categories object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = CategoriesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CategoriesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CategoriesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CategoriesTableMap::OM_CLASS;
            /** @var Categories $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CategoriesTableMap::addInstanceToPool($obj, $key);
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
            $key = CategoriesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CategoriesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Categories $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CategoriesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CategoriesTableMap::COL_ID);
            $criteria->addSelectColumn(CategoriesTableMap::COL_PARENT_ID);
            $criteria->addSelectColumn(CategoriesTableMap::COL_EX_ID);
            $criteria->addSelectColumn(CategoriesTableMap::COL_CODE);
            $criteria->addSelectColumn(CategoriesTableMap::COL_TITLE);
            $criteria->addSelectColumn(CategoriesTableMap::COL_INNER_TITLE);
            $criteria->addSelectColumn(CategoriesTableMap::COL_IMG);
            $criteria->addSelectColumn(CategoriesTableMap::COL_IMG_WIDE);
            $criteria->addSelectColumn(CategoriesTableMap::COL_ORDEN);
            $criteria->addSelectColumn(CategoriesTableMap::COL_UNPUBLISHED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.parent_id');
            $criteria->addSelectColumn($alias . '.ex_id');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.inner_title');
            $criteria->addSelectColumn($alias . '.img');
            $criteria->addSelectColumn($alias . '.img_wide');
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
            $criteria->removeSelectColumn(CategoriesTableMap::COL_ID);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_PARENT_ID);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_EX_ID);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_CODE);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_TITLE);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_INNER_TITLE);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_IMG);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_IMG_WIDE);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_ORDEN);
            $criteria->removeSelectColumn(CategoriesTableMap::COL_UNPUBLISHED);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.parent_id');
            $criteria->removeSelectColumn($alias . '.ex_id');
            $criteria->removeSelectColumn($alias . '.code');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.inner_title');
            $criteria->removeSelectColumn($alias . '.img');
            $criteria->removeSelectColumn($alias . '.img_wide');
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
        return Propel::getServiceContainer()->getDatabaseMap(CategoriesTableMap::DATABASE_NAME)->getTable(CategoriesTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Categories or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Categories object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Categories) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Categories object has no primary key');
        }

        $query = CategoriesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CategoriesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CategoriesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the categories table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return CategoriesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Categories or Criteria object.
     *
     * @param mixed $criteria Criteria or Categories object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Categories object
        }


        // Set the correct dbName
        $query = CategoriesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
