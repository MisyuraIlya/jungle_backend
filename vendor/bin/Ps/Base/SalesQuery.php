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
use Ps\Sales as ChildSales;
use Ps\SalesQuery as ChildSalesQuery;
use Ps\Map\SalesTableMap;

/**
 * Base class that represents a query for the 'sales' table.
 *
 *
 *
 * @method     ChildSalesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSalesQuery orderByExId($order = Criteria::ASC) Order by the ex_id column
 * @method     ChildSalesQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildSalesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildSalesQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildSalesQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     ChildSalesQuery orderByRemarks($order = Criteria::ASC) Order by the remarks column
 * @method     ChildSalesQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildSalesQuery orderByUnpublished($order = Criteria::ASC) Order by the unpublished column
 * @method     ChildSalesQuery orderByPrice2($order = Criteria::ASC) Order by the price2 column
 * @method     ChildSalesQuery orderByQuantity2($order = Criteria::ASC) Order by the quantity2 column
 * @method     ChildSalesQuery orderByPrice3($order = Criteria::ASC) Order by the price3 column
 * @method     ChildSalesQuery orderByQuantity3($order = Criteria::ASC) Order by the quantity3 column
 *
 * @method     ChildSalesQuery groupById() Group by the id column
 * @method     ChildSalesQuery groupByExId() Group by the ex_id column
 * @method     ChildSalesQuery groupByQuantity() Group by the quantity column
 * @method     ChildSalesQuery groupByTitle() Group by the title column
 * @method     ChildSalesQuery groupByPrice() Group by the price column
 * @method     ChildSalesQuery groupByEndDate() Group by the end_date column
 * @method     ChildSalesQuery groupByRemarks() Group by the remarks column
 * @method     ChildSalesQuery groupByCode() Group by the code column
 * @method     ChildSalesQuery groupByUnpublished() Group by the unpublished column
 * @method     ChildSalesQuery groupByPrice2() Group by the price2 column
 * @method     ChildSalesQuery groupByQuantity2() Group by the quantity2 column
 * @method     ChildSalesQuery groupByPrice3() Group by the price3 column
 * @method     ChildSalesQuery groupByQuantity3() Group by the quantity3 column
 *
 * @method     ChildSalesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSalesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSalesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSalesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSalesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSalesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSales|null findOne(?ConnectionInterface $con = null) Return the first ChildSales matching the query
 * @method     ChildSales findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSales matching the query, or a new ChildSales object populated from the query conditions when no match is found
 *
 * @method     ChildSales|null findOneById(int $id) Return the first ChildSales filtered by the id column
 * @method     ChildSales|null findOneByExId(int $ex_id) Return the first ChildSales filtered by the ex_id column
 * @method     ChildSales|null findOneByQuantity(int $quantity) Return the first ChildSales filtered by the quantity column
 * @method     ChildSales|null findOneByTitle(string $title) Return the first ChildSales filtered by the title column
 * @method     ChildSales|null findOneByPrice(int $price) Return the first ChildSales filtered by the price column
 * @method     ChildSales|null findOneByEndDate(string $end_date) Return the first ChildSales filtered by the end_date column
 * @method     ChildSales|null findOneByRemarks(string $remarks) Return the first ChildSales filtered by the remarks column
 * @method     ChildSales|null findOneByCode(int $code) Return the first ChildSales filtered by the code column
 * @method     ChildSales|null findOneByUnpublished(int $unpublished) Return the first ChildSales filtered by the unpublished column
 * @method     ChildSales|null findOneByPrice2(int $price2) Return the first ChildSales filtered by the price2 column
 * @method     ChildSales|null findOneByQuantity2(int $quantity2) Return the first ChildSales filtered by the quantity2 column
 * @method     ChildSales|null findOneByPrice3(int $price3) Return the first ChildSales filtered by the price3 column
 * @method     ChildSales|null findOneByQuantity3(int $quantity3) Return the first ChildSales filtered by the quantity3 column *

 * @method     ChildSales requirePk($key, ?ConnectionInterface $con = null) Return the ChildSales by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOne(?ConnectionInterface $con = null) Return the first ChildSales matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSales requireOneById(int $id) Return the first ChildSales filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByExId(int $ex_id) Return the first ChildSales filtered by the ex_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByQuantity(int $quantity) Return the first ChildSales filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByTitle(string $title) Return the first ChildSales filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByPrice(int $price) Return the first ChildSales filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByEndDate(string $end_date) Return the first ChildSales filtered by the end_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByRemarks(string $remarks) Return the first ChildSales filtered by the remarks column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByCode(int $code) Return the first ChildSales filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByUnpublished(int $unpublished) Return the first ChildSales filtered by the unpublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByPrice2(int $price2) Return the first ChildSales filtered by the price2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByQuantity2(int $quantity2) Return the first ChildSales filtered by the quantity2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByPrice3(int $price3) Return the first ChildSales filtered by the price3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSales requireOneByQuantity3(int $quantity3) Return the first ChildSales filtered by the quantity3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSales[]|Collection find(?ConnectionInterface $con = null) Return ChildSales objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSales> find(?ConnectionInterface $con = null) Return ChildSales objects based on current ModelCriteria
 * @method     ChildSales[]|Collection findById(int $id) Return ChildSales objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildSales> findById(int $id) Return ChildSales objects filtered by the id column
 * @method     ChildSales[]|Collection findByExId(int $ex_id) Return ChildSales objects filtered by the ex_id column
 * @psalm-method Collection&\Traversable<ChildSales> findByExId(int $ex_id) Return ChildSales objects filtered by the ex_id column
 * @method     ChildSales[]|Collection findByQuantity(int $quantity) Return ChildSales objects filtered by the quantity column
 * @psalm-method Collection&\Traversable<ChildSales> findByQuantity(int $quantity) Return ChildSales objects filtered by the quantity column
 * @method     ChildSales[]|Collection findByTitle(string $title) Return ChildSales objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildSales> findByTitle(string $title) Return ChildSales objects filtered by the title column
 * @method     ChildSales[]|Collection findByPrice(int $price) Return ChildSales objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildSales> findByPrice(int $price) Return ChildSales objects filtered by the price column
 * @method     ChildSales[]|Collection findByEndDate(string $end_date) Return ChildSales objects filtered by the end_date column
 * @psalm-method Collection&\Traversable<ChildSales> findByEndDate(string $end_date) Return ChildSales objects filtered by the end_date column
 * @method     ChildSales[]|Collection findByRemarks(string $remarks) Return ChildSales objects filtered by the remarks column
 * @psalm-method Collection&\Traversable<ChildSales> findByRemarks(string $remarks) Return ChildSales objects filtered by the remarks column
 * @method     ChildSales[]|Collection findByCode(int $code) Return ChildSales objects filtered by the code column
 * @psalm-method Collection&\Traversable<ChildSales> findByCode(int $code) Return ChildSales objects filtered by the code column
 * @method     ChildSales[]|Collection findByUnpublished(int $unpublished) Return ChildSales objects filtered by the unpublished column
 * @psalm-method Collection&\Traversable<ChildSales> findByUnpublished(int $unpublished) Return ChildSales objects filtered by the unpublished column
 * @method     ChildSales[]|Collection findByPrice2(int $price2) Return ChildSales objects filtered by the price2 column
 * @psalm-method Collection&\Traversable<ChildSales> findByPrice2(int $price2) Return ChildSales objects filtered by the price2 column
 * @method     ChildSales[]|Collection findByQuantity2(int $quantity2) Return ChildSales objects filtered by the quantity2 column
 * @psalm-method Collection&\Traversable<ChildSales> findByQuantity2(int $quantity2) Return ChildSales objects filtered by the quantity2 column
 * @method     ChildSales[]|Collection findByPrice3(int $price3) Return ChildSales objects filtered by the price3 column
 * @psalm-method Collection&\Traversable<ChildSales> findByPrice3(int $price3) Return ChildSales objects filtered by the price3 column
 * @method     ChildSales[]|Collection findByQuantity3(int $quantity3) Return ChildSales objects filtered by the quantity3 column
 * @psalm-method Collection&\Traversable<ChildSales> findByQuantity3(int $quantity3) Return ChildSales objects filtered by the quantity3 column
 * @method     ChildSales[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSales> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SalesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\SalesQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Sales', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSalesQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSalesQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSalesQuery) {
            return $criteria;
        }
        $query = new ChildSalesQuery();
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
     * @return ChildSales|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SalesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SalesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSales A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ex_id, quantity, title, price, end_date, remarks, code, unpublished, price2, quantity2, price3, quantity3 FROM sales WHERE id = :p0';
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
            /** @var ChildSales $obj */
            $obj = new ChildSales();
            $obj->hydrate($row);
            SalesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSales|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(SalesTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(SalesTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(SalesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ex_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExId(1234); // WHERE ex_id = 1234
     * $query->filterByExId(array(12, 34)); // WHERE ex_id IN (12, 34)
     * $query->filterByExId(array('min' => 12)); // WHERE ex_id > 12
     * </code>
     *
     * @param mixed $exId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByExId($exId = null, ?string $comparison = null)
    {
        if (is_array($exId)) {
            $useMinMax = false;
            if (isset($exId['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_EX_ID, $exId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($exId['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_EX_ID, $exId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_EX_ID, $exId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
     * </code>
     *
     * @param mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, ?string $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_QUANTITY, $quantity, $comparison);

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

        $this->addUsingAlias(SalesTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrice($price = null, ?string $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('fooValue');   // WHERE end_date = 'fooValue'
     * $query->filterByEndDate('%fooValue%', Criteria::LIKE); // WHERE end_date LIKE '%fooValue%'
     * $query->filterByEndDate(['foo', 'bar']); // WHERE end_date IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $endDate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($endDate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_END_DATE, $endDate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the remarks column
     *
     * Example usage:
     * <code>
     * $query->filterByRemarks('fooValue');   // WHERE remarks = 'fooValue'
     * $query->filterByRemarks('%fooValue%', Criteria::LIKE); // WHERE remarks LIKE '%fooValue%'
     * $query->filterByRemarks(['foo', 'bar']); // WHERE remarks IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $remarks The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRemarks($remarks = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remarks)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_REMARKS, $remarks, $comparison);

        return $this;
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode(1234); // WHERE code = 1234
     * $query->filterByCode(array(12, 34)); // WHERE code IN (12, 34)
     * $query->filterByCode(array('min' => 12)); // WHERE code > 12
     * </code>
     *
     * @param mixed $code The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCode($code = null, ?string $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_CODE, $code, $comparison);

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
                $this->addUsingAlias(SalesTableMap::COL_UNPUBLISHED, $unpublished['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpublished['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_UNPUBLISHED, $unpublished['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_UNPUBLISHED, $unpublished, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice2(1234); // WHERE price2 = 1234
     * $query->filterByPrice2(array(12, 34)); // WHERE price2 IN (12, 34)
     * $query->filterByPrice2(array('min' => 12)); // WHERE price2 > 12
     * </code>
     *
     * @param mixed $price2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrice2($price2 = null, ?string $comparison = null)
    {
        if (is_array($price2)) {
            $useMinMax = false;
            if (isset($price2['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_PRICE2, $price2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price2['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_PRICE2, $price2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_PRICE2, $price2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quantity2 column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity2(1234); // WHERE quantity2 = 1234
     * $query->filterByQuantity2(array(12, 34)); // WHERE quantity2 IN (12, 34)
     * $query->filterByQuantity2(array('min' => 12)); // WHERE quantity2 > 12
     * </code>
     *
     * @param mixed $quantity2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuantity2($quantity2 = null, ?string $comparison = null)
    {
        if (is_array($quantity2)) {
            $useMinMax = false;
            if (isset($quantity2['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_QUANTITY2, $quantity2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity2['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_QUANTITY2, $quantity2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_QUANTITY2, $quantity2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice3(1234); // WHERE price3 = 1234
     * $query->filterByPrice3(array(12, 34)); // WHERE price3 IN (12, 34)
     * $query->filterByPrice3(array('min' => 12)); // WHERE price3 > 12
     * </code>
     *
     * @param mixed $price3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrice3($price3 = null, ?string $comparison = null)
    {
        if (is_array($price3)) {
            $useMinMax = false;
            if (isset($price3['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_PRICE3, $price3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price3['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_PRICE3, $price3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_PRICE3, $price3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quantity3 column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity3(1234); // WHERE quantity3 = 1234
     * $query->filterByQuantity3(array(12, 34)); // WHERE quantity3 IN (12, 34)
     * $query->filterByQuantity3(array('min' => 12)); // WHERE quantity3 > 12
     * </code>
     *
     * @param mixed $quantity3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuantity3($quantity3 = null, ?string $comparison = null)
    {
        if (is_array($quantity3)) {
            $useMinMax = false;
            if (isset($quantity3['min'])) {
                $this->addUsingAlias(SalesTableMap::COL_QUANTITY3, $quantity3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity3['max'])) {
                $this->addUsingAlias(SalesTableMap::COL_QUANTITY3, $quantity3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesTableMap::COL_QUANTITY3, $quantity3, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSales $sales Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($sales = null)
    {
        if ($sales) {
            $this->addUsingAlias(SalesTableMap::COL_ID, $sales->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sales table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SalesTableMap::clearInstancePool();
            SalesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SalesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SalesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SalesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SalesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
