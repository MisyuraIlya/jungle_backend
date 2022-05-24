<?php

namespace Ps\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Ps\Slider as ChildSlider;
use Ps\SliderQuery as ChildSliderQuery;
use Ps\Map\SliderTableMap;

/**
 * Base class that represents a query for the 'slider' table.
 *
 *
 *
 * @method     ChildSliderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSliderQuery orderByGridId($order = Criteria::ASC) Order by the grid_id column
 * @method     ChildSliderQuery orderByImg($order = Criteria::ASC) Order by the img column
 * @method     ChildSliderQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildSliderQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildSliderQuery orderByOrden($order = Criteria::ASC) Order by the orden column
 * @method     ChildSliderQuery orderByUnpublished($order = Criteria::ASC) Order by the unpublished column
 *
 * @method     ChildSliderQuery groupById() Group by the id column
 * @method     ChildSliderQuery groupByGridId() Group by the grid_id column
 * @method     ChildSliderQuery groupByImg() Group by the img column
 * @method     ChildSliderQuery groupByLink() Group by the link column
 * @method     ChildSliderQuery groupByTitle() Group by the title column
 * @method     ChildSliderQuery groupByOrden() Group by the orden column
 * @method     ChildSliderQuery groupByUnpublished() Group by the unpublished column
 *
 * @method     ChildSliderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSliderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSliderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSliderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSliderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSliderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSlider|null findOne(?ConnectionInterface $con = null) Return the first ChildSlider matching the query
 * @method     ChildSlider findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSlider matching the query, or a new ChildSlider object populated from the query conditions when no match is found
 *
 * @method     ChildSlider|null findOneById(int $id) Return the first ChildSlider filtered by the id column
 * @method     ChildSlider|null findOneByGridId(int $grid_id) Return the first ChildSlider filtered by the grid_id column
 * @method     ChildSlider|null findOneByImg(string $img) Return the first ChildSlider filtered by the img column
 * @method     ChildSlider|null findOneByLink(string $link) Return the first ChildSlider filtered by the link column
 * @method     ChildSlider|null findOneByTitle(string $title) Return the first ChildSlider filtered by the title column
 * @method     ChildSlider|null findOneByOrden(int $orden) Return the first ChildSlider filtered by the orden column
 * @method     ChildSlider|null findOneByUnpublished(int $unpublished) Return the first ChildSlider filtered by the unpublished column *

 * @method     ChildSlider requirePk($key, ?ConnectionInterface $con = null) Return the ChildSlider by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSlider requireOne(?ConnectionInterface $con = null) Return the first ChildSlider matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSlider requireOneById(int $id) Return the first ChildSlider filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSlider requireOneByGridId(int $grid_id) Return the first ChildSlider filtered by the grid_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSlider requireOneByImg(string $img) Return the first ChildSlider filtered by the img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSlider requireOneByLink(string $link) Return the first ChildSlider filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSlider requireOneByTitle(string $title) Return the first ChildSlider filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSlider requireOneByOrden(int $orden) Return the first ChildSlider filtered by the orden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSlider requireOneByUnpublished(int $unpublished) Return the first ChildSlider filtered by the unpublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSlider[]|Collection find(?ConnectionInterface $con = null) Return ChildSlider objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSlider> find(?ConnectionInterface $con = null) Return ChildSlider objects based on current ModelCriteria
 * @method     ChildSlider[]|Collection findById(int $id) Return ChildSlider objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildSlider> findById(int $id) Return ChildSlider objects filtered by the id column
 * @method     ChildSlider[]|Collection findByGridId(int $grid_id) Return ChildSlider objects filtered by the grid_id column
 * @psalm-method Collection&\Traversable<ChildSlider> findByGridId(int $grid_id) Return ChildSlider objects filtered by the grid_id column
 * @method     ChildSlider[]|Collection findByImg(string $img) Return ChildSlider objects filtered by the img column
 * @psalm-method Collection&\Traversable<ChildSlider> findByImg(string $img) Return ChildSlider objects filtered by the img column
 * @method     ChildSlider[]|Collection findByLink(string $link) Return ChildSlider objects filtered by the link column
 * @psalm-method Collection&\Traversable<ChildSlider> findByLink(string $link) Return ChildSlider objects filtered by the link column
 * @method     ChildSlider[]|Collection findByTitle(string $title) Return ChildSlider objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildSlider> findByTitle(string $title) Return ChildSlider objects filtered by the title column
 * @method     ChildSlider[]|Collection findByOrden(int $orden) Return ChildSlider objects filtered by the orden column
 * @psalm-method Collection&\Traversable<ChildSlider> findByOrden(int $orden) Return ChildSlider objects filtered by the orden column
 * @method     ChildSlider[]|Collection findByUnpublished(int $unpublished) Return ChildSlider objects filtered by the unpublished column
 * @psalm-method Collection&\Traversable<ChildSlider> findByUnpublished(int $unpublished) Return ChildSlider objects filtered by the unpublished column
 * @method     ChildSlider[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSlider> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SliderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\SliderQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Slider', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSliderQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSliderQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSliderQuery) {
            return $criteria;
        }
        $query = new ChildSliderQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSlider|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SliderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SliderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSlider A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, grid_id, img, link, title, orden, unpublished FROM slider WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSlider $obj */
            $obj = new ChildSlider();
            $obj->hydrate($row);
            SliderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildSlider|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(SliderTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(SliderTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SliderTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SliderTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SliderTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the grid_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGridId(1234); // WHERE grid_id = 1234
     * $query->filterByGridId(array(12, 34)); // WHERE grid_id IN (12, 34)
     * $query->filterByGridId(array('min' => 12)); // WHERE grid_id > 12
     * </code>
     *
     * @param mixed $gridId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByGridId($gridId = null, ?string $comparison = null)
    {
        if (is_array($gridId)) {
            $useMinMax = false;
            if (isset($gridId['min'])) {
                $this->addUsingAlias(SliderTableMap::COL_GRID_ID, $gridId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gridId['max'])) {
                $this->addUsingAlias(SliderTableMap::COL_GRID_ID, $gridId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SliderTableMap::COL_GRID_ID, $gridId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the img column
     *
     * Example usage:
     * <code>
     * $query->filterByImg('fooValue');   // WHERE img = 'fooValue'
     * $query->filterByImg('%fooValue%', Criteria::LIKE); // WHERE img LIKE '%fooValue%'
     * $query->filterByImg(['foo', 'bar']); // WHERE img IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $img The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByImg($img = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($img)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SliderTableMap::COL_IMG, $img, $comparison);

        return $this;
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%', Criteria::LIKE); // WHERE link LIKE '%fooValue%'
     * $query->filterByLink(['foo', 'bar']); // WHERE link IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $link The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLink($link = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SliderTableMap::COL_LINK, $link, $comparison);

        return $this;
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * $query->filterByTitle(['foo', 'bar']); // WHERE title IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $title The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTitle($title = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SliderTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the orden column
     *
     * Example usage:
     * <code>
     * $query->filterByOrden(1234); // WHERE orden = 1234
     * $query->filterByOrden(array(12, 34)); // WHERE orden IN (12, 34)
     * $query->filterByOrden(array('min' => 12)); // WHERE orden > 12
     * </code>
     *
     * @param mixed $orden The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrden($orden = null, ?string $comparison = null)
    {
        if (is_array($orden)) {
            $useMinMax = false;
            if (isset($orden['min'])) {
                $this->addUsingAlias(SliderTableMap::COL_ORDEN, $orden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orden['max'])) {
                $this->addUsingAlias(SliderTableMap::COL_ORDEN, $orden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SliderTableMap::COL_ORDEN, $orden, $comparison);

        return $this;
    }

    /**
     * Filter the query on the unpublished column
     *
     * Example usage:
     * <code>
     * $query->filterByUnpublished(1234); // WHERE unpublished = 1234
     * $query->filterByUnpublished(array(12, 34)); // WHERE unpublished IN (12, 34)
     * $query->filterByUnpublished(array('min' => 12)); // WHERE unpublished > 12
     * </code>
     *
     * @param mixed $unpublished The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUnpublished($unpublished = null, ?string $comparison = null)
    {
        if (is_array($unpublished)) {
            $useMinMax = false;
            if (isset($unpublished['min'])) {
                $this->addUsingAlias(SliderTableMap::COL_UNPUBLISHED, $unpublished['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpublished['max'])) {
                $this->addUsingAlias(SliderTableMap::COL_UNPUBLISHED, $unpublished['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SliderTableMap::COL_UNPUBLISHED, $unpublished, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSlider $slider Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($slider = null)
    {
        if ($slider) {
            $this->addUsingAlias(SliderTableMap::COL_ID, $slider->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the slider table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SliderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SliderTableMap::clearInstancePool();
            SliderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SliderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SliderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SliderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SliderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
