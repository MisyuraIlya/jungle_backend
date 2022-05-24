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
use Ps\Articles;
use Ps\ArticlesQuery;


/**
 * This class defines the structure of the 'articles' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ArticlesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.ArticlesTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'articles';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Articles';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Articles';

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
    public const COL_ID = 'articles.id';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'articles.title';

    /**
     * the column name for the description field
     */
    public const COL_DESCRIPTION = 'articles.description';

    /**
     * the column name for the text field
     */
    public const COL_TEXT = 'articles.text';

    /**
     * the column name for the img field
     */
    public const COL_IMG = 'articles.img';

    /**
     * the column name for the unpublished field
     */
    public const COL_UNPUBLISHED = 'articles.unpublished';

    /**
     * the column name for the orden field
     */
    public const COL_ORDEN = 'articles.orden';

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
        self::TYPE_PHPNAME       => ['Id', 'Title', 'Description', 'Text', 'Img', 'Unpublished', 'Orden', ],
        self::TYPE_CAMELNAME     => ['id', 'title', 'description', 'text', 'img', 'unpublished', 'orden', ],
        self::TYPE_COLNAME       => [ArticlesTableMap::COL_ID, ArticlesTableMap::COL_TITLE, ArticlesTableMap::COL_DESCRIPTION, ArticlesTableMap::COL_TEXT, ArticlesTableMap::COL_IMG, ArticlesTableMap::COL_UNPUBLISHED, ArticlesTableMap::COL_ORDEN, ],
        self::TYPE_FIELDNAME     => ['id', 'title', 'description', 'text', 'img', 'unpublished', 'orden', ],
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'Title' => 1, 'Description' => 2, 'Text' => 3, 'Img' => 4, 'Unpublished' => 5, 'Orden' => 6, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'title' => 1, 'description' => 2, 'text' => 3, 'img' => 4, 'unpublished' => 5, 'orden' => 6, ],
        self::TYPE_COLNAME       => [ArticlesTableMap::COL_ID => 0, ArticlesTableMap::COL_TITLE => 1, ArticlesTableMap::COL_DESCRIPTION => 2, ArticlesTableMap::COL_TEXT => 3, ArticlesTableMap::COL_IMG => 4, ArticlesTableMap::COL_UNPUBLISHED => 5, ArticlesTableMap::COL_ORDEN => 6, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'title' => 1, 'description' => 2, 'text' => 3, 'img' => 4, 'unpublished' => 5, 'orden' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Articles.Id' => 'ID',
        'id' => 'ID',
        'articles.id' => 'ID',
        'ArticlesTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Title' => 'TITLE',
        'Articles.Title' => 'TITLE',
        'title' => 'TITLE',
        'articles.title' => 'TITLE',
        'ArticlesTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'Description' => 'DESCRIPTION',
        'Articles.Description' => 'DESCRIPTION',
        'description' => 'DESCRIPTION',
        'articles.description' => 'DESCRIPTION',
        'ArticlesTableMap::COL_DESCRIPTION' => 'DESCRIPTION',
        'COL_DESCRIPTION' => 'DESCRIPTION',
        'Text' => 'TEXT',
        'Articles.Text' => 'TEXT',
        'text' => 'TEXT',
        'articles.text' => 'TEXT',
        'ArticlesTableMap::COL_TEXT' => 'TEXT',
        'COL_TEXT' => 'TEXT',
        'Img' => 'IMG',
        'Articles.Img' => 'IMG',
        'img' => 'IMG',
        'articles.img' => 'IMG',
        'ArticlesTableMap::COL_IMG' => 'IMG',
        'COL_IMG' => 'IMG',
        'Unpublished' => 'UNPUBLISHED',
        'Articles.Unpublished' => 'UNPUBLISHED',
        'unpublished' => 'UNPUBLISHED',
        'articles.unpublished' => 'UNPUBLISHED',
        'ArticlesTableMap::COL_UNPUBLISHED' => 'UNPUBLISHED',
        'COL_UNPUBLISHED' => 'UNPUBLISHED',
        'Orden' => 'ORDEN',
        'Articles.Orden' => 'ORDEN',
        'orden' => 'ORDEN',
        'articles.orden' => 'ORDEN',
        'ArticlesTableMap::COL_ORDEN' => 'ORDEN',
        'COL_ORDEN' => 'ORDEN',
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
        $this->setName('articles');
        $this->setPhpName('Articles');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Articles');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 500, null);
        $this->addColumn('text', 'Text', 'LONGVARCHAR', false, null, null);
        $this->addColumn('img', 'Img', 'VARCHAR', false, 255, null);
        $this->addColumn('unpublished', 'Unpublished', 'INTEGER', false, null, null);
        $this->addColumn('orden', 'Orden', 'INTEGER', false, null, null);
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
        return $withPrefix ? ArticlesTableMap::CLASS_DEFAULT : ArticlesTableMap::OM_CLASS;
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
     * @return array (Articles object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = ArticlesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ArticlesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ArticlesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ArticlesTableMap::OM_CLASS;
            /** @var Articles $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ArticlesTableMap::addInstanceToPool($obj, $key);
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
            $key = ArticlesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ArticlesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Articles $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ArticlesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ArticlesTableMap::COL_ID);
            $criteria->addSelectColumn(ArticlesTableMap::COL_TITLE);
            $criteria->addSelectColumn(ArticlesTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ArticlesTableMap::COL_TEXT);
            $criteria->addSelectColumn(ArticlesTableMap::COL_IMG);
            $criteria->addSelectColumn(ArticlesTableMap::COL_UNPUBLISHED);
            $criteria->addSelectColumn(ArticlesTableMap::COL_ORDEN);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.text');
            $criteria->addSelectColumn($alias . '.img');
            $criteria->addSelectColumn($alias . '.unpublished');
            $criteria->addSelectColumn($alias . '.orden');
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
            $criteria->removeSelectColumn(ArticlesTableMap::COL_ID);
            $criteria->removeSelectColumn(ArticlesTableMap::COL_TITLE);
            $criteria->removeSelectColumn(ArticlesTableMap::COL_DESCRIPTION);
            $criteria->removeSelectColumn(ArticlesTableMap::COL_TEXT);
            $criteria->removeSelectColumn(ArticlesTableMap::COL_IMG);
            $criteria->removeSelectColumn(ArticlesTableMap::COL_UNPUBLISHED);
            $criteria->removeSelectColumn(ArticlesTableMap::COL_ORDEN);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.description');
            $criteria->removeSelectColumn($alias . '.text');
            $criteria->removeSelectColumn($alias . '.img');
            $criteria->removeSelectColumn($alias . '.unpublished');
            $criteria->removeSelectColumn($alias . '.orden');
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
        return Propel::getServiceContainer()->getDatabaseMap(ArticlesTableMap::DATABASE_NAME)->getTable(ArticlesTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Articles or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Articles object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ArticlesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Articles) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ArticlesTableMap::DATABASE_NAME);
            $criteria->add(ArticlesTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ArticlesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ArticlesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ArticlesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the articles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return ArticlesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Articles or Criteria object.
     *
     * @param mixed $criteria Criteria or Articles object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArticlesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Articles object
        }

        if ($criteria->containsKey(ArticlesTableMap::COL_ID) && $criteria->keyContainsValue(ArticlesTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ArticlesTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ArticlesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
