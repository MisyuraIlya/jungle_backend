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
use Ps\Orders as ChildOrders;
use Ps\OrdersQuery as ChildOrdersQuery;
use Ps\Map\OrdersTableMap;

/**
 * Base class that represents a query for the 'orders' table.
 *
 *
 *
 * @method     ChildOrdersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOrdersQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrdersQuery orderByFormatDate($order = Criteria::ASC) Order by the format_date column
 * @method     ChildOrdersQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildOrdersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildOrdersQuery orderByDeliveryId($order = Criteria::ASC) Order by the delivery_id column
 * @method     ChildOrdersQuery orderByPickup($order = Criteria::ASC) Order by the pickup column
 * @method     ChildOrdersQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildOrdersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOrdersQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildOrdersQuery orderByTransaction($order = Criteria::ASC) Order by the transaction column
 * @method     ChildOrdersQuery orderByMail($order = Criteria::ASC) Order by the mail column
 * @method     ChildOrdersQuery orderByTel($order = Criteria::ASC) Order by the tel column
 * @method     ChildOrdersQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildOrdersQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildOrdersQuery orderByPassport($order = Criteria::ASC) Order by the passport column
 * @method     ChildOrdersQuery orderByTown($order = Criteria::ASC) Order by the town column
 * @method     ChildOrdersQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildOrdersQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildOrdersQuery orderByHouse($order = Criteria::ASC) Order by the house column
 * @method     ChildOrdersQuery orderByAppartment($order = Criteria::ASC) Order by the appartment column
 * @method     ChildOrdersQuery orderByFloor($order = Criteria::ASC) Order by the floor column
 * @method     ChildOrdersQuery orderByEntrance($order = Criteria::ASC) Order by the entrance column
 * @method     ChildOrdersQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildOrdersQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildOrdersQuery groupById() Group by the id column
 * @method     ChildOrdersQuery groupByDate() Group by the date column
 * @method     ChildOrdersQuery groupByFormatDate() Group by the format_date column
 * @method     ChildOrdersQuery groupByTime() Group by the time column
 * @method     ChildOrdersQuery groupByUserId() Group by the user_id column
 * @method     ChildOrdersQuery groupByDeliveryId() Group by the delivery_id column
 * @method     ChildOrdersQuery groupByPickup() Group by the pickup column
 * @method     ChildOrdersQuery groupByTotal() Group by the total column
 * @method     ChildOrdersQuery groupByStatus() Group by the status column
 * @method     ChildOrdersQuery groupByComment() Group by the comment column
 * @method     ChildOrdersQuery groupByTransaction() Group by the transaction column
 * @method     ChildOrdersQuery groupByMail() Group by the mail column
 * @method     ChildOrdersQuery groupByTel() Group by the tel column
 * @method     ChildOrdersQuery groupByFirstName() Group by the first_name column
 * @method     ChildOrdersQuery groupByLastName() Group by the last_name column
 * @method     ChildOrdersQuery groupByPassport() Group by the passport column
 * @method     ChildOrdersQuery groupByTown() Group by the town column
 * @method     ChildOrdersQuery groupByAddress() Group by the address column
 * @method     ChildOrdersQuery groupByZip() Group by the zip column
 * @method     ChildOrdersQuery groupByHouse() Group by the house column
 * @method     ChildOrdersQuery groupByAppartment() Group by the appartment column
 * @method     ChildOrdersQuery groupByFloor() Group by the floor column
 * @method     ChildOrdersQuery groupByEntrance() Group by the entrance column
 * @method     ChildOrdersQuery groupByCreated() Group by the created column
 * @method     ChildOrdersQuery groupByModified() Group by the modified column
 *
 * @method     ChildOrdersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrders|null findOne(?ConnectionInterface $con = null) Return the first ChildOrders matching the query
 * @method     ChildOrders findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrders matching the query, or a new ChildOrders object populated from the query conditions when no match is found
 *
 * @method     ChildOrders|null findOneById(int $id) Return the first ChildOrders filtered by the id column
 * @method     ChildOrders|null findOneByDate(string $date) Return the first ChildOrders filtered by the date column
 * @method     ChildOrders|null findOneByFormatDate(string $format_date) Return the first ChildOrders filtered by the format_date column
 * @method     ChildOrders|null findOneByTime(string $time) Return the first ChildOrders filtered by the time column
 * @method     ChildOrders|null findOneByUserId(int $user_id) Return the first ChildOrders filtered by the user_id column
 * @method     ChildOrders|null findOneByDeliveryId(int $delivery_id) Return the first ChildOrders filtered by the delivery_id column
 * @method     ChildOrders|null findOneByPickup(string $pickup) Return the first ChildOrders filtered by the pickup column
 * @method     ChildOrders|null findOneByTotal(string $total) Return the first ChildOrders filtered by the total column
 * @method     ChildOrders|null findOneByStatus(string $status) Return the first ChildOrders filtered by the status column
 * @method     ChildOrders|null findOneByComment(string $comment) Return the first ChildOrders filtered by the comment column
 * @method     ChildOrders|null findOneByTransaction(string $transaction) Return the first ChildOrders filtered by the transaction column
 * @method     ChildOrders|null findOneByMail(string $mail) Return the first ChildOrders filtered by the mail column
 * @method     ChildOrders|null findOneByTel(string $tel) Return the first ChildOrders filtered by the tel column
 * @method     ChildOrders|null findOneByFirstName(string $first_name) Return the first ChildOrders filtered by the first_name column
 * @method     ChildOrders|null findOneByLastName(string $last_name) Return the first ChildOrders filtered by the last_name column
 * @method     ChildOrders|null findOneByPassport(string $passport) Return the first ChildOrders filtered by the passport column
 * @method     ChildOrders|null findOneByTown(string $town) Return the first ChildOrders filtered by the town column
 * @method     ChildOrders|null findOneByAddress(string $address) Return the first ChildOrders filtered by the address column
 * @method     ChildOrders|null findOneByZip(string $zip) Return the first ChildOrders filtered by the zip column
 * @method     ChildOrders|null findOneByHouse(string $house) Return the first ChildOrders filtered by the house column
 * @method     ChildOrders|null findOneByAppartment(string $appartment) Return the first ChildOrders filtered by the appartment column
 * @method     ChildOrders|null findOneByFloor(string $floor) Return the first ChildOrders filtered by the floor column
 * @method     ChildOrders|null findOneByEntrance(string $entrance) Return the first ChildOrders filtered by the entrance column
 * @method     ChildOrders|null findOneByCreated(string $created) Return the first ChildOrders filtered by the created column
 * @method     ChildOrders|null findOneByModified(string $modified) Return the first ChildOrders filtered by the modified column *

 * @method     ChildOrders requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOne(?ConnectionInterface $con = null) Return the first ChildOrders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders requireOneById(int $id) Return the first ChildOrders filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByDate(string $date) Return the first ChildOrders filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByFormatDate(string $format_date) Return the first ChildOrders filtered by the format_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByTime(string $time) Return the first ChildOrders filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByUserId(int $user_id) Return the first ChildOrders filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByDeliveryId(int $delivery_id) Return the first ChildOrders filtered by the delivery_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByPickup(string $pickup) Return the first ChildOrders filtered by the pickup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByTotal(string $total) Return the first ChildOrders filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByStatus(string $status) Return the first ChildOrders filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByComment(string $comment) Return the first ChildOrders filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByTransaction(string $transaction) Return the first ChildOrders filtered by the transaction column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByMail(string $mail) Return the first ChildOrders filtered by the mail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByTel(string $tel) Return the first ChildOrders filtered by the tel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByFirstName(string $first_name) Return the first ChildOrders filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByLastName(string $last_name) Return the first ChildOrders filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByPassport(string $passport) Return the first ChildOrders filtered by the passport column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByTown(string $town) Return the first ChildOrders filtered by the town column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByAddress(string $address) Return the first ChildOrders filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByZip(string $zip) Return the first ChildOrders filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByHouse(string $house) Return the first ChildOrders filtered by the house column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByAppartment(string $appartment) Return the first ChildOrders filtered by the appartment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByFloor(string $floor) Return the first ChildOrders filtered by the floor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByEntrance(string $entrance) Return the first ChildOrders filtered by the entrance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByCreated(string $created) Return the first ChildOrders filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByModified(string $modified) Return the first ChildOrders filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders[]|Collection find(?ConnectionInterface $con = null) Return ChildOrders objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrders> find(?ConnectionInterface $con = null) Return ChildOrders objects based on current ModelCriteria
 * @method     ChildOrders[]|Collection findById(int $id) Return ChildOrders objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildOrders> findById(int $id) Return ChildOrders objects filtered by the id column
 * @method     ChildOrders[]|Collection findByDate(string $date) Return ChildOrders objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildOrders> findByDate(string $date) Return ChildOrders objects filtered by the date column
 * @method     ChildOrders[]|Collection findByFormatDate(string $format_date) Return ChildOrders objects filtered by the format_date column
 * @psalm-method Collection&\Traversable<ChildOrders> findByFormatDate(string $format_date) Return ChildOrders objects filtered by the format_date column
 * @method     ChildOrders[]|Collection findByTime(string $time) Return ChildOrders objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildOrders> findByTime(string $time) Return ChildOrders objects filtered by the time column
 * @method     ChildOrders[]|Collection findByUserId(int $user_id) Return ChildOrders objects filtered by the user_id column
 * @psalm-method Collection&\Traversable<ChildOrders> findByUserId(int $user_id) Return ChildOrders objects filtered by the user_id column
 * @method     ChildOrders[]|Collection findByDeliveryId(int $delivery_id) Return ChildOrders objects filtered by the delivery_id column
 * @psalm-method Collection&\Traversable<ChildOrders> findByDeliveryId(int $delivery_id) Return ChildOrders objects filtered by the delivery_id column
 * @method     ChildOrders[]|Collection findByPickup(string $pickup) Return ChildOrders objects filtered by the pickup column
 * @psalm-method Collection&\Traversable<ChildOrders> findByPickup(string $pickup) Return ChildOrders objects filtered by the pickup column
 * @method     ChildOrders[]|Collection findByTotal(string $total) Return ChildOrders objects filtered by the total column
 * @psalm-method Collection&\Traversable<ChildOrders> findByTotal(string $total) Return ChildOrders objects filtered by the total column
 * @method     ChildOrders[]|Collection findByStatus(string $status) Return ChildOrders objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildOrders> findByStatus(string $status) Return ChildOrders objects filtered by the status column
 * @method     ChildOrders[]|Collection findByComment(string $comment) Return ChildOrders objects filtered by the comment column
 * @psalm-method Collection&\Traversable<ChildOrders> findByComment(string $comment) Return ChildOrders objects filtered by the comment column
 * @method     ChildOrders[]|Collection findByTransaction(string $transaction) Return ChildOrders objects filtered by the transaction column
 * @psalm-method Collection&\Traversable<ChildOrders> findByTransaction(string $transaction) Return ChildOrders objects filtered by the transaction column
 * @method     ChildOrders[]|Collection findByMail(string $mail) Return ChildOrders objects filtered by the mail column
 * @psalm-method Collection&\Traversable<ChildOrders> findByMail(string $mail) Return ChildOrders objects filtered by the mail column
 * @method     ChildOrders[]|Collection findByTel(string $tel) Return ChildOrders objects filtered by the tel column
 * @psalm-method Collection&\Traversable<ChildOrders> findByTel(string $tel) Return ChildOrders objects filtered by the tel column
 * @method     ChildOrders[]|Collection findByFirstName(string $first_name) Return ChildOrders objects filtered by the first_name column
 * @psalm-method Collection&\Traversable<ChildOrders> findByFirstName(string $first_name) Return ChildOrders objects filtered by the first_name column
 * @method     ChildOrders[]|Collection findByLastName(string $last_name) Return ChildOrders objects filtered by the last_name column
 * @psalm-method Collection&\Traversable<ChildOrders> findByLastName(string $last_name) Return ChildOrders objects filtered by the last_name column
 * @method     ChildOrders[]|Collection findByPassport(string $passport) Return ChildOrders objects filtered by the passport column
 * @psalm-method Collection&\Traversable<ChildOrders> findByPassport(string $passport) Return ChildOrders objects filtered by the passport column
 * @method     ChildOrders[]|Collection findByTown(string $town) Return ChildOrders objects filtered by the town column
 * @psalm-method Collection&\Traversable<ChildOrders> findByTown(string $town) Return ChildOrders objects filtered by the town column
 * @method     ChildOrders[]|Collection findByAddress(string $address) Return ChildOrders objects filtered by the address column
 * @psalm-method Collection&\Traversable<ChildOrders> findByAddress(string $address) Return ChildOrders objects filtered by the address column
 * @method     ChildOrders[]|Collection findByZip(string $zip) Return ChildOrders objects filtered by the zip column
 * @psalm-method Collection&\Traversable<ChildOrders> findByZip(string $zip) Return ChildOrders objects filtered by the zip column
 * @method     ChildOrders[]|Collection findByHouse(string $house) Return ChildOrders objects filtered by the house column
 * @psalm-method Collection&\Traversable<ChildOrders> findByHouse(string $house) Return ChildOrders objects filtered by the house column
 * @method     ChildOrders[]|Collection findByAppartment(string $appartment) Return ChildOrders objects filtered by the appartment column
 * @psalm-method Collection&\Traversable<ChildOrders> findByAppartment(string $appartment) Return ChildOrders objects filtered by the appartment column
 * @method     ChildOrders[]|Collection findByFloor(string $floor) Return ChildOrders objects filtered by the floor column
 * @psalm-method Collection&\Traversable<ChildOrders> findByFloor(string $floor) Return ChildOrders objects filtered by the floor column
 * @method     ChildOrders[]|Collection findByEntrance(string $entrance) Return ChildOrders objects filtered by the entrance column
 * @psalm-method Collection&\Traversable<ChildOrders> findByEntrance(string $entrance) Return ChildOrders objects filtered by the entrance column
 * @method     ChildOrders[]|Collection findByCreated(string $created) Return ChildOrders objects filtered by the created column
 * @psalm-method Collection&\Traversable<ChildOrders> findByCreated(string $created) Return ChildOrders objects filtered by the created column
 * @method     ChildOrders[]|Collection findByModified(string $modified) Return ChildOrders objects filtered by the modified column
 * @psalm-method Collection&\Traversable<ChildOrders> findByModified(string $modified) Return ChildOrders objects filtered by the modified column
 * @method     ChildOrders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrders> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrdersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\OrdersQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Orders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdersQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdersQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildOrdersQuery) {
            return $criteria;
        }
        $query = new ChildOrdersQuery();
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
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOrders A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, date, format_date, time, user_id, delivery_id, pickup, total, status, comment, transaction, mail, tel, first_name, last_name, passport, town, address, zip, house, appartment, floor, entrance, created, modified FROM orders WHERE id = :p0';
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
            /** @var ChildOrders $obj */
            $obj = new ChildOrders();
            $obj->hydrate($row);
            OrdersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(OrdersTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(OrdersTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(OrdersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_ID, $id, $comparison);

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

        $this->addUsingAlias(OrdersTableMap::COL_DATE, $date, $comparison);

        return $this;
    }

    /**
     * Filter the query on the format_date column
     *
     * Example usage:
     * <code>
     * $query->filterByFormatDate('fooValue');   // WHERE format_date = 'fooValue'
     * $query->filterByFormatDate('%fooValue%', Criteria::LIKE); // WHERE format_date LIKE '%fooValue%'
     * $query->filterByFormatDate(['foo', 'bar']); // WHERE format_date IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $formatDate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFormatDate($formatDate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($formatDate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_FORMAT_DATE, $formatDate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('fooValue');   // WHERE time = 'fooValue'
     * $query->filterByTime('%fooValue%', Criteria::LIKE); // WHERE time LIKE '%fooValue%'
     * $query->filterByTime(['foo', 'bar']); // WHERE time IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $time The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTime($time = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($time)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_TIME, $time, $comparison);

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
                $this->addUsingAlias(OrdersTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_USER_ID, $userId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the delivery_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveryId(1234); // WHERE delivery_id = 1234
     * $query->filterByDeliveryId(array(12, 34)); // WHERE delivery_id IN (12, 34)
     * $query->filterByDeliveryId(array('min' => 12)); // WHERE delivery_id > 12
     * </code>
     *
     * @param mixed $deliveryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDeliveryId($deliveryId = null, ?string $comparison = null)
    {
        if (is_array($deliveryId)) {
            $useMinMax = false;
            if (isset($deliveryId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_DELIVERY_ID, $deliveryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deliveryId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_DELIVERY_ID, $deliveryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_DELIVERY_ID, $deliveryId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the pickup column
     *
     * Example usage:
     * <code>
     * $query->filterByPickup('fooValue');   // WHERE pickup = 'fooValue'
     * $query->filterByPickup('%fooValue%', Criteria::LIKE); // WHERE pickup LIKE '%fooValue%'
     * $query->filterByPickup(['foo', 'bar']); // WHERE pickup IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pickup The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPickup($pickup = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pickup)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_PICKUP, $pickup, $comparison);

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

        $this->addUsingAlias(OrdersTableMap::COL_TOTAL, $total, $comparison);

        return $this;
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * $query->filterByStatus(['foo', 'bar']); // WHERE status IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $status The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByStatus($status = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_STATUS, $status, $comparison);

        return $this;
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * $query->filterByComment(['foo', 'bar']); // WHERE comment IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $comment The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByComment($comment = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_COMMENT, $comment, $comparison);

        return $this;
    }

    /**
     * Filter the query on the transaction column
     *
     * Example usage:
     * <code>
     * $query->filterByTransaction('fooValue');   // WHERE transaction = 'fooValue'
     * $query->filterByTransaction('%fooValue%', Criteria::LIKE); // WHERE transaction LIKE '%fooValue%'
     * $query->filterByTransaction(['foo', 'bar']); // WHERE transaction IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $transaction The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTransaction($transaction = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transaction)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_TRANSACTION, $transaction, $comparison);

        return $this;
    }

    /**
     * Filter the query on the mail column
     *
     * Example usage:
     * <code>
     * $query->filterByMail('fooValue');   // WHERE mail = 'fooValue'
     * $query->filterByMail('%fooValue%', Criteria::LIKE); // WHERE mail LIKE '%fooValue%'
     * $query->filterByMail(['foo', 'bar']); // WHERE mail IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $mail The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMail($mail = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mail)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_MAIL, $mail, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tel column
     *
     * Example usage:
     * <code>
     * $query->filterByTel('fooValue');   // WHERE tel = 'fooValue'
     * $query->filterByTel('%fooValue%', Criteria::LIKE); // WHERE tel LIKE '%fooValue%'
     * $query->filterByTel(['foo', 'bar']); // WHERE tel IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tel The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTel($tel = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tel)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_TEL, $tel, $comparison);

        return $this;
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
     * $query->filterByFirstName(['foo', 'bar']); // WHERE first_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $firstName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_FIRST_NAME, $firstName, $comparison);

        return $this;
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
     * $query->filterByLastName(['foo', 'bar']); // WHERE last_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lastName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_LAST_NAME, $lastName, $comparison);

        return $this;
    }

    /**
     * Filter the query on the passport column
     *
     * Example usage:
     * <code>
     * $query->filterByPassport('fooValue');   // WHERE passport = 'fooValue'
     * $query->filterByPassport('%fooValue%', Criteria::LIKE); // WHERE passport LIKE '%fooValue%'
     * $query->filterByPassport(['foo', 'bar']); // WHERE passport IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $passport The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPassport($passport = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($passport)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_PASSPORT, $passport, $comparison);

        return $this;
    }

    /**
     * Filter the query on the town column
     *
     * Example usage:
     * <code>
     * $query->filterByTown('fooValue');   // WHERE town = 'fooValue'
     * $query->filterByTown('%fooValue%', Criteria::LIKE); // WHERE town LIKE '%fooValue%'
     * $query->filterByTown(['foo', 'bar']); // WHERE town IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $town The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTown($town = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($town)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_TOWN, $town, $comparison);

        return $this;
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * $query->filterByAddress(['foo', 'bar']); // WHERE address IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $address The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAddress($address = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_ADDRESS, $address, $comparison);

        return $this;
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * $query->filterByZip(['foo', 'bar']); // WHERE zip IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $zip The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByZip($zip = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_ZIP, $zip, $comparison);

        return $this;
    }

    /**
     * Filter the query on the house column
     *
     * Example usage:
     * <code>
     * $query->filterByHouse('fooValue');   // WHERE house = 'fooValue'
     * $query->filterByHouse('%fooValue%', Criteria::LIKE); // WHERE house LIKE '%fooValue%'
     * $query->filterByHouse(['foo', 'bar']); // WHERE house IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $house The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHouse($house = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($house)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_HOUSE, $house, $comparison);

        return $this;
    }

    /**
     * Filter the query on the appartment column
     *
     * Example usage:
     * <code>
     * $query->filterByAppartment('fooValue');   // WHERE appartment = 'fooValue'
     * $query->filterByAppartment('%fooValue%', Criteria::LIKE); // WHERE appartment LIKE '%fooValue%'
     * $query->filterByAppartment(['foo', 'bar']); // WHERE appartment IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $appartment The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAppartment($appartment = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appartment)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_APPARTMENT, $appartment, $comparison);

        return $this;
    }

    /**
     * Filter the query on the floor column
     *
     * Example usage:
     * <code>
     * $query->filterByFloor('fooValue');   // WHERE floor = 'fooValue'
     * $query->filterByFloor('%fooValue%', Criteria::LIKE); // WHERE floor LIKE '%fooValue%'
     * $query->filterByFloor(['foo', 'bar']); // WHERE floor IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $floor The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFloor($floor = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($floor)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_FLOOR, $floor, $comparison);

        return $this;
    }

    /**
     * Filter the query on the entrance column
     *
     * Example usage:
     * <code>
     * $query->filterByEntrance('fooValue');   // WHERE entrance = 'fooValue'
     * $query->filterByEntrance('%fooValue%', Criteria::LIKE); // WHERE entrance LIKE '%fooValue%'
     * $query->filterByEntrance(['foo', 'bar']); // WHERE entrance IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $entrance The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEntrance($entrance = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($entrance)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_ENTRANCE, $entrance, $comparison);

        return $this;
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCreated($created = null, ?string $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_CREATED, $created, $comparison);

        return $this;
    }

    /**
     * Filter the query on the modified column
     *
     * Example usage:
     * <code>
     * $query->filterByModified('2011-03-14'); // WHERE modified = '2011-03-14'
     * $query->filterByModified('now'); // WHERE modified = '2011-03-14'
     * $query->filterByModified(array('max' => 'yesterday')); // WHERE modified > '2011-03-13'
     * </code>
     *
     * @param mixed $modified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByModified($modified = null, ?string $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(OrdersTableMap::COL_MODIFIED, $modified, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildOrders $orders Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($orders = null)
    {
        if ($orders) {
            $this->addUsingAlias(OrdersTableMap::COL_ID, $orders->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdersTableMap::clearInstancePool();
            OrdersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
