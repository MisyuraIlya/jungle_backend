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
use Ps\Banners as ChildBanners;
use Ps\BannersQuery as ChildBannersQuery;
use Ps\Map\BannersTableMap;

/**
 * Base class that represents a query for the 'banners' table.
 *
 *
 *
 * @method     ChildBannersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBannersQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildBannersQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildBannersQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ChildBannersQuery orderByImg($order = Criteria::ASC) Order by the img column
 * @method     ChildBannersQuery orderByLink($order = Criteria::ASC) Order by the link column
 *
 * @method     ChildBannersQuery groupById() Group by the id column
 * @method     ChildBannersQuery groupByType() Group by the type column
 * @method     ChildBannersQuery groupByTitle() Group by the title column
 * @method     ChildBannersQuery groupByText() Group by the text column
 * @method     ChildBannersQuery groupByImg() Group by the img column
 * @method     ChildBannersQuery groupByLink() Group by the link column
 *
 * @method     ChildBannersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBannersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBannersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBannersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBannersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBannersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBanners|null findOne(?ConnectionInterface $con = null) Return the first ChildBanners matching the query
 * @method     ChildBanners findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildBanners matching the query, or a new ChildBanners object populated from the query conditions when no match is found
 *
 * @method     ChildBanners|null findOneById(int $id) Return the first ChildBanners filtered by the id column
 * @method     ChildBanners|null findOneByType(int $type) Return the first ChildBanners filtered by the type column
 * @method     ChildBanners|null findOneByTitle(string $title) Return the first ChildBanners filtered by the title column
 * @method     ChildBanners|null findOneByText(string $text) Return the first ChildBanners filtered by the text column
 * @method     ChildBanners|null findOneByImg(string $img) Return the first ChildBanners filtered by the img column
 * @method     ChildBanners|null findOneByLink(string $link) Return the first ChildBanners filtered by the link column *

 * @method     ChildBanners requirePk($key, ?ConnectionInterface $con = null) Return the ChildBanners by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBanners requireOne(?ConnectionInterface $con = null) Return the first ChildBanners matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBanners requireOneById(int $id) Return the first ChildBanners filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBanners requireOneByType(int $type) Return the first ChildBanners filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBanners requireOneByTitle(string $title) Return the first ChildBanners filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBanners requireOneByText(string $text) Return the first ChildBanners filtered by the text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBanners requireOneByImg(string $img) Return the first ChildBanners filtered by the img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBanners requireOneByLink(string $link) Return the first ChildBanners filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBanners[]|Collection find(?ConnectionInterface $con = null) Return ChildBanners objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildBanners> find(?ConnectionInterface $con = null) Return ChildBanners objects based on current ModelCriteria
 * @method     ChildBanners[]|Collection findById(int $id) Return ChildBanners objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildBanners> findById(int $id) Return ChildBanners objects filtered by the id column
 * @method     ChildBanners[]|Collection findByType(int $type) Return ChildBanners objects filtered by the type column
 * @psalm-method Collection&\Traversable<ChildBanners> findByType(int $type) Return ChildBanners objects filtered by the type column
 * @method     ChildBanners[]|Collection findByTitle(string $title) Return ChildBanners objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildBanners> findByTitle(string $title) Return ChildBanners objects filtered by the title column
 * @method     ChildBanners[]|Collection findByText(string $text) Return ChildBanners objects filtered by the text column
 * @psalm-method Collection&\Traversable<ChildBanners> findByText(string $text) Return ChildBanners objects filtered by the text column
 * @method     ChildBanners[]|Collection findByImg(string $img) Return ChildBanners objects filtered by the img column
 * @psalm-method Collection&\Traversable<ChildBanners> findByImg(string $img) Return ChildBanners objects filtered by the img column
 * @method     ChildBanners[]|Collection findByLink(string $link) Return ChildBanners objects filtered by the link column
 * @psalm-method Collection&\Traversable<ChildBanners> findByLink(string $link) Return ChildBanners objects filtered by the link column
 * @method     ChildBanners[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildBanners> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BannersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\BannersQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Banners', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBannersQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBannersQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildBannersQuery) {
            return $criteria;
        }
        $query = new ChildBannersQuery();
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
     * @return ChildBanners|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BannersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BannersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBanners A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, type, title, text, img, link FROM banners WHERE id = :p0';
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
            /** @var ChildBanners $obj */
            $obj = new ChildBanners();
            $obj->hydrate($row);
            BannersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBanners|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(BannersTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(BannersTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(BannersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BannersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BannersTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByType($type = null, ?string $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(BannersTableMap::COL_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(BannersTableMap::COL_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BannersTableMap::COL_TYPE, $type, $comparison);

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

        $this->addUsingAlias(BannersTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%', Criteria::LIKE); // WHERE text LIKE '%fooValue%'
     * $query->filterByText(['foo', 'bar']); // WHERE text IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $text The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByText($text = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BannersTableMap::COL_TEXT, $text, $comparison);

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

        $this->addUsingAlias(BannersTableMap::COL_IMG, $img, $comparison);

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

        $this->addUsingAlias(BannersTableMap::COL_LINK, $link, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildBanners $banners Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($banners = null)
    {
        if ($banners) {
            $this->addUsingAlias(BannersTableMap::COL_ID, $banners->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the banners table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BannersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BannersTableMap::clearInstancePool();
            BannersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BannersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BannersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BannersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BannersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
