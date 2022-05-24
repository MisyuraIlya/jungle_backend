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
use Ps\OrderParts as ChildOrderParts;
use Ps\OrderPartsQuery as ChildOrderPartsQuery;
use Ps\Map\OrderPartsTableMap;

/**
 * Base class that represents a query for the 'order_parts' table.
 *
 *
 *
 * @method     ChildOrderPartsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOrderPartsQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOrderPartsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildOrderPartsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrderPartsQuery orderByMakat($order = Criteria::ASC) Order by the makat column
 * @method     ChildOrderPartsQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method     ChildOrderPartsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildOrderPartsQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOrderPartsQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildOrderPartsQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOrderPartsQuery orderByImg($order = Criteria::ASC) Order by the img column
 *
 * @method     ChildOrderPartsQuery groupById() Group by the id column
 * @method     ChildOrderPartsQuery groupByOrderId() Group by the order_id column
 * @method     ChildOrderPartsQuery groupByUserId() Group by the user_id column
 * @method     ChildOrderPartsQuery groupByDate() Group by the date column
 * @method     ChildOrderPartsQuery groupByMakat() Group by the makat column
 * @method     ChildOrderPartsQuery groupByBarcode() Group by the barcode column
 * @method     ChildOrderPartsQuery groupByTitle() Group by the title column
 * @method     ChildOrderPartsQuery groupByPrice() Group by the price column
 * @method     ChildOrderPartsQuery groupByTotal() Group by the total column
 * @method     ChildOrderPartsQuery groupByQuantity() Group by the quantity column
 * @method     ChildOrderPartsQuery groupByImg() Group by the img column
 *
 * @method     ChildOrderPartsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderPartsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderPartsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderPartsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderPartsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderPartsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrderParts|null findOne(?ConnectionInterface $con = null) Return the first ChildOrderParts matching the query
 * @method     ChildOrderParts findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrderParts matching the query, or a new ChildOrderParts object populated from the query conditions when no match is found
 *
 * @method     ChildOrderParts|null findOneById(int $id) Return the first ChildOrderParts filtered by the id column
 * @method     ChildOrderParts|null findOneByOrderId(int $order_id) Return the first ChildOrderParts filtered by the order_id column
 * @method     ChildOrderParts|null findOneByUserId(int $user_id) Return the first ChildOrderParts filtered by the user_id column
 * @method     ChildOrderParts|null findOneByDate(string $date) Return the first ChildOrderParts filtered by the date column
 * @method     ChildOrderParts|null findOneByMakat(string $makat) Return the first ChildOrderParts filtered by the makat column
 * @method     ChildOrderParts|null findOneByBarcode(string $barcode) Return the first ChildOrderParts filtered by the barcode column
 * @method     ChildOrderParts|null findOneByTitle(string $title) Return the first ChildOrderParts filtered by the title column
 * @method     ChildOrderParts|null findOneByPrice(string $price) Return the first ChildOrderParts filtered by the price column
 * @method     ChildOrderParts|null findOneByTotal(string $total) Return the first ChildOrderParts filtered by the total column
 * @method     ChildOrderParts|null findOneByQuantity(string $quantity) Return the first ChildOrderParts filtered by the quantity column
 * @method     ChildOrderParts|null findOneByImg(string $img) Return the first ChildOrderParts filtered by the img column *

 * @method     ChildOrderParts requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrderParts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOne(?ConnectionInterface $con = null) Return the first ChildOrderParts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderParts requireOneById(int $id) Return the first ChildOrderParts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByOrderId(int $order_id) Return the first ChildOrderParts filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByUserId(int $user_id) Return the first ChildOrderParts filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByDate(string $date) Return the first ChildOrderParts filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByMakat(string $makat) Return the first ChildOrderParts filtered by the makat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByBarcode(string $barcode) Return the first ChildOrderParts filtered by the barcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByTitle(string $title) Return the first ChildOrderParts filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByPrice(string $price) Return the first ChildOrderParts filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByTotal(string $total) Return the first ChildOrderParts filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByQuantity(string $quantity) Return the first ChildOrderParts filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderParts requireOneByImg(string $img) Return the first ChildOrderParts filtered by the img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderParts[]|Collection find(?ConnectionInterface $con = null) Return ChildOrderParts objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrderParts> find(?ConnectionInterface $con = null) Return ChildOrderParts objects based on current ModelCriteria
 * @method     ChildOrderParts[]|Collection findById(int $id) Return ChildOrderParts objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findById(int $id) Return ChildOrderParts objects filtered by the id column
 * @method     ChildOrderParts[]|Collection findByOrderId(int $order_id) Return ChildOrderParts objects filtered by the order_id column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByOrderId(int $order_id) Return ChildOrderParts objects filtered by the order_id column
 * @method     ChildOrderParts[]|Collection findByUserId(int $user_id) Return ChildOrderParts objects filtered by the user_id column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByUserId(int $user_id) Return ChildOrderParts objects filtered by the user_id column
 * @method     ChildOrderParts[]|Collection findByDate(string $date) Return ChildOrderParts objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByDate(string $date) Return ChildOrderParts objects filtered by the date column
 * @method     ChildOrderParts[]|Collection findByMakat(string $makat) Return ChildOrderParts objects filtered by the makat column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByMakat(string $makat) Return ChildOrderParts objects filtered by the makat column
 * @method     ChildOrderParts[]|Collection findByBarcode(string $barcode) Return ChildOrderParts objects filtered by the barcode column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByBarcode(string $barcode) Return ChildOrderParts objects filtered by the barcode column
 * @method     ChildOrderParts[]|Collection findByTitle(string $title) Return ChildOrderParts objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByTitle(string $title) Return ChildOrderParts objects filtered by the title column
 * @method     ChildOrderParts[]|Collection findByPrice(string $price) Return ChildOrderParts objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByPrice(string $price) Return ChildOrderParts objects filtered by the price column
 * @method     ChildOrderParts[]|Collection findByTotal(string $total) Return ChildOrderParts objects filtered by the total column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByTotal(string $total) Return ChildOrderParts objects filtered by the total column
 * @method     ChildOrderParts[]|Collection findByQuantity(string $quantity) Return ChildOrderParts objects filtered by the quantity column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByQuantity(string $quantity) Return ChildOrderParts objects filtered by the quantity column
 * @method     ChildOrderParts[]|Collection findByImg(string $img) Return ChildOrderParts objects filtered by the img column
 * @psalm-method Collection&\Traversable<ChildOrderParts> findByImg(string $img) Return ChildOrderParts objects filtered by the img column
 * @method     ChildOrderParts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrderParts> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrderPartsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\OrderPartsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\OrderParts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrderPartsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrderPartsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildOrderPartsQuery) {
            return $criteria;
        }
        $query = new ChildOrderPartsQuery();
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
     * @return ChildOrderParts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrderPartsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrderPartsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOrderParts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, order_id, user_id, date, makat, barcode, title, price, total, quantity, img FROM order_parts WHERE id = :p0';
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
            /** @var ChildOrderParts $obj */
            $obj = new ChildOrderParts();
            $obj->hydrate($row);
            OrderPartsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOrderParts|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(OrderPartsTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(OrderPartsTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(OrderPartsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrderPartsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrderPartsTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the order_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderId(1234); // WHERE order_id = 1234
     * $query->filterByOrderId(array(12, 34)); // WHERE order_id IN (12, 34)
     * $query->filterByOrderId(array('min' => 12)); // WHERE order_id > 12
     * </code>
     *
     * @param mixed $orderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, ?string $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OrderPartsTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OrderPartsTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrderPartsTableMap::COL_ORDER_ID, $orderId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUserId($userId = null, ?string $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(OrderPartsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(OrderPartsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrderPartsTableMap::COL_USER_ID, $userId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE date = 'fooValue'
     * $query->filterByDate('%fooValue%', Criteria::LIKE); // WHERE date LIKE '%fooValue%'
     * $query->filterByDate(['foo', 'bar']); // WHERE date IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $date The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDate($date = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrderPartsTableMap::COL_DATE, $date, $comparison);

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

        $this->addUsingAlias(OrderPartsTableMap::COL_MAKAT, $makat, $comparison);

        return $this;
    }

    /**
     * Filter the query on the barcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcode('fooValue');   // WHERE barcode = 'fooValue'
     * $query->filterByBarcode('%fooValue%', Criteria::LIKE); // WHERE barcode LIKE '%fooValue%'
     * $query->filterByBarcode(['foo', 'bar']); // WHERE barcode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $barcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBarcode($barcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrderPartsTableMap::COL_BARCODE, $barcode, $comparison);

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

        $this->addUsingAlias(OrderPartsTableMap::COL_TITLE, $title, $comparison);

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

        $this->addUsingAlias(OrderPartsTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal('fooValue');   // WHERE total = 'fooValue'
     * $query->filterByTotal('%fooValue%', Criteria::LIKE); // WHERE total LIKE '%fooValue%'
     * $query->filterByTotal(['foo', 'bar']); // WHERE total IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $total The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTotal($total = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($total)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrderPartsTableMap::COL_TOTAL, $total, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity('fooValue');   // WHERE quantity = 'fooValue'
     * $query->filterByQuantity('%fooValue%', Criteria::LIKE); // WHERE quantity LIKE '%fooValue%'
     * $query->filterByQuantity(['foo', 'bar']); // WHERE quantity IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quantity The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quantity)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrderPartsTableMap::COL_QUANTITY, $quantity, $comparison);

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

        $this->addUsingAlias(OrderPartsTableMap::COL_IMG, $img, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildOrderParts $orderParts Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($orderParts = null)
    {
        if ($orderParts) {
            $this->addUsingAlias(OrderPartsTableMap::COL_ID, $orderParts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the order_parts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderPartsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrderPartsTableMap::clearInstancePool();
            OrderPartsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrderPartsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrderPartsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrderPartsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrderPartsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
