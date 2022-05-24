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
use Ps\Shipping as ChildShipping;
use Ps\ShippingQuery as ChildShippingQuery;
use Ps\Map\ShippingTableMap;

/**
 * Base class that represents a query for the 'shipping' table.
 *
 *
 *
 * @method     ChildShippingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildShippingQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildShippingQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildShippingQuery orderByMakat($order = Criteria::ASC) Order by the makat column
 * @method     ChildShippingQuery orderByOrden($order = Criteria::ASC) Order by the orden column
 * @method     ChildShippingQuery orderByUnpublished($order = Criteria::ASC) Order by the unpublished column
 *
 * @method     ChildShippingQuery groupById() Group by the id column
 * @method     ChildShippingQuery groupByTitle() Group by the title column
 * @method     ChildShippingQuery groupByPrice() Group by the price column
 * @method     ChildShippingQuery groupByMakat() Group by the makat column
 * @method     ChildShippingQuery groupByOrden() Group by the orden column
 * @method     ChildShippingQuery groupByUnpublished() Group by the unpublished column
 *
 * @method     ChildShippingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildShippingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildShippingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildShippingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildShippingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildShippingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildShipping|null findOne(?ConnectionInterface $con = null) Return the first ChildShipping matching the query
 * @method     ChildShipping findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildShipping matching the query, or a new ChildShipping object populated from the query conditions when no match is found
 *
 * @method     ChildShipping|null findOneById(int $id) Return the first ChildShipping filtered by the id column
 * @method     ChildShipping|null findOneByTitle(string $title) Return the first ChildShipping filtered by the title column
 * @method     ChildShipping|null findOneByPrice(string $price) Return the first ChildShipping filtered by the price column
 * @method     ChildShipping|null findOneByMakat(string $makat) Return the first ChildShipping filtered by the makat column
 * @method     ChildShipping|null findOneByOrden(int $orden) Return the first ChildShipping filtered by the orden column
 * @method     ChildShipping|null findOneByUnpublished(int $unpublished) Return the first ChildShipping filtered by the unpublished column *

 * @method     ChildShipping requirePk($key, ?ConnectionInterface $con = null) Return the ChildShipping by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipping requireOne(?ConnectionInterface $con = null) Return the first ChildShipping matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipping requireOneById(int $id) Return the first ChildShipping filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipping requireOneByTitle(string $title) Return the first ChildShipping filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipping requireOneByPrice(string $price) Return the first ChildShipping filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipping requireOneByMakat(string $makat) Return the first ChildShipping filtered by the makat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipping requireOneByOrden(int $orden) Return the first ChildShipping filtered by the orden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipping requireOneByUnpublished(int $unpublished) Return the first ChildShipping filtered by the unpublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipping[]|Collection find(?ConnectionInterface $con = null) Return ChildShipping objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildShipping> find(?ConnectionInterface $con = null) Return ChildShipping objects based on current ModelCriteria
 * @method     ChildShipping[]|Collection findById(int $id) Return ChildShipping objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildShipping> findById(int $id) Return ChildShipping objects filtered by the id column
 * @method     ChildShipping[]|Collection findByTitle(string $title) Return ChildShipping objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildShipping> findByTitle(string $title) Return ChildShipping objects filtered by the title column
 * @method     ChildShipping[]|Collection findByPrice(string $price) Return ChildShipping objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildShipping> findByPrice(string $price) Return ChildShipping objects filtered by the price column
 * @method     ChildShipping[]|Collection findByMakat(string $makat) Return ChildShipping objects filtered by the makat column
 * @psalm-method Collection&\Traversable<ChildShipping> findByMakat(string $makat) Return ChildShipping objects filtered by the makat column
 * @method     ChildShipping[]|Collection findByOrden(int $orden) Return ChildShipping objects filtered by the orden column
 * @psalm-method Collection&\Traversable<ChildShipping> findByOrden(int $orden) Return ChildShipping objects filtered by the orden column
 * @method     ChildShipping[]|Collection findByUnpublished(int $unpublished) Return ChildShipping objects filtered by the unpublished column
 * @psalm-method Collection&\Traversable<ChildShipping> findByUnpublished(int $unpublished) Return ChildShipping objects filtered by the unpublished column
 * @method     ChildShipping[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildShipping> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ShippingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\ShippingQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Shipping', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildShippingQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildShippingQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildShippingQuery) {
            return $criteria;
        }
        $query = new ChildShippingQuery();
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
     * @return ChildShipping|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ShippingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ShippingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildShipping A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, price, makat, orden, unpublished FROM shipping WHERE id = :p0';
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
            /** @var ChildShipping $obj */
            $obj = new ChildShipping();
            $obj->hydrate($row);
            ShippingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildShipping|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(ShippingTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(ShippingTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(ShippingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ShippingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ShippingTableMap::COL_ID, $id, $comparison);

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

        $this->addUsingAlias(ShippingTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice('fooValue');   // WHERE price = 'fooValue'
     * $query->filterByPrice('%fooValue%', Criteria::LIKE); // WHERE price LIKE '%fooValue%'
     * $query->filterByPrice(['foo', 'bar']); // WHERE price IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $price The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrice($price = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($price)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ShippingTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the makat column
     *
     * Example usage:
     * <code>
     * $query->filterByMakat('fooValue');   // WHERE makat = 'fooValue'
     * $query->filterByMakat('%fooValue%', Criteria::LIKE); // WHERE makat LIKE '%fooValue%'
     * $query->filterByMakat(['foo', 'bar']); // WHERE makat IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $makat The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMakat($makat = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($makat)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ShippingTableMap::COL_MAKAT, $makat, $comparison);

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
                $this->addUsingAlias(ShippingTableMap::COL_ORDEN, $orden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orden['max'])) {
                $this->addUsingAlias(ShippingTableMap::COL_ORDEN, $orden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ShippingTableMap::COL_ORDEN, $orden, $comparison);

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
                $this->addUsingAlias(ShippingTableMap::COL_UNPUBLISHED, $unpublished['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpublished['max'])) {
                $this->addUsingAlias(ShippingTableMap::COL_UNPUBLISHED, $unpublished['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ShippingTableMap::COL_UNPUBLISHED, $unpublished, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildShipping $shipping Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($shipping = null)
    {
        if ($shipping) {
            $this->addUsingAlias(ShippingTableMap::COL_ID, $shipping->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the shipping table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShippingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ShippingTableMap::clearInstancePool();
            ShippingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ShippingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ShippingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ShippingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ShippingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
