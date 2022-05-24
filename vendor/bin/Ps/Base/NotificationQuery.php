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
use Ps\Notification as ChildNotification;
use Ps\NotificationQuery as ChildNotificationQuery;
use Ps\Map\NotificationTableMap;

/**
 * Base class that represents a query for the 'notification' table.
 *
 *
 *
 * @method     ChildNotificationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNotificationQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildNotificationQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildNotificationQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildNotificationQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildNotificationQuery orderBySendTo($order = Criteria::ASC) Order by the send_to column
 * @method     ChildNotificationQuery orderByImg($order = Criteria::ASC) Order by the img column
 * @method     ChildNotificationQuery orderByVideo($order = Criteria::ASC) Order by the video column
 * @method     ChildNotificationQuery orderByCourseId($order = Criteria::ASC) Order by the course_id column
 * @method     ChildNotificationQuery orderByPriceFor($order = Criteria::ASC) Order by the price_for column
 * @method     ChildNotificationQuery orderByPublic($order = Criteria::ASC) Order by the public column
 * @method     ChildNotificationQuery orderByUnpublished($order = Criteria::ASC) Order by the unpublished column
 * @method     ChildNotificationQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildNotificationQuery orderByIsdeleted($order = Criteria::ASC) Order by the isDeleted column
 * @method     ChildNotificationQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildNotificationQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildNotificationQuery groupById() Group by the id column
 * @method     ChildNotificationQuery groupByTitle() Group by the title column
 * @method     ChildNotificationQuery groupByDescription() Group by the description column
 * @method     ChildNotificationQuery groupByLink() Group by the link column
 * @method     ChildNotificationQuery groupByDate() Group by the date column
 * @method     ChildNotificationQuery groupBySendTo() Group by the send_to column
 * @method     ChildNotificationQuery groupByImg() Group by the img column
 * @method     ChildNotificationQuery groupByVideo() Group by the video column
 * @method     ChildNotificationQuery groupByCourseId() Group by the course_id column
 * @method     ChildNotificationQuery groupByPriceFor() Group by the price_for column
 * @method     ChildNotificationQuery groupByPublic() Group by the public column
 * @method     ChildNotificationQuery groupByUnpublished() Group by the unpublished column
 * @method     ChildNotificationQuery groupByType() Group by the type column
 * @method     ChildNotificationQuery groupByIsdeleted() Group by the isDeleted column
 * @method     ChildNotificationQuery groupByCreated() Group by the created column
 * @method     ChildNotificationQuery groupByModified() Group by the modified column
 *
 * @method     ChildNotificationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNotificationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNotificationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNotificationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNotificationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNotificationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNotification|null findOne(?ConnectionInterface $con = null) Return the first ChildNotification matching the query
 * @method     ChildNotification findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildNotification matching the query, or a new ChildNotification object populated from the query conditions when no match is found
 *
 * @method     ChildNotification|null findOneById(int $id) Return the first ChildNotification filtered by the id column
 * @method     ChildNotification|null findOneByTitle(string $title) Return the first ChildNotification filtered by the title column
 * @method     ChildNotification|null findOneByDescription(string $description) Return the first ChildNotification filtered by the description column
 * @method     ChildNotification|null findOneByLink(string $link) Return the first ChildNotification filtered by the link column
 * @method     ChildNotification|null findOneByDate(string $date) Return the first ChildNotification filtered by the date column
 * @method     ChildNotification|null findOneBySendTo(int $send_to) Return the first ChildNotification filtered by the send_to column
 * @method     ChildNotification|null findOneByImg(string $img) Return the first ChildNotification filtered by the img column
 * @method     ChildNotification|null findOneByVideo(string $video) Return the first ChildNotification filtered by the video column
 * @method     ChildNotification|null findOneByCourseId(string $course_id) Return the first ChildNotification filtered by the course_id column
 * @method     ChildNotification|null findOneByPriceFor(string $price_for) Return the first ChildNotification filtered by the price_for column
 * @method     ChildNotification|null findOneByPublic(int $public) Return the first ChildNotification filtered by the public column
 * @method     ChildNotification|null findOneByUnpublished(int $unpublished) Return the first ChildNotification filtered by the unpublished column
 * @method     ChildNotification|null findOneByType(string $type) Return the first ChildNotification filtered by the type column
 * @method     ChildNotification|null findOneByIsdeleted(boolean $isDeleted) Return the first ChildNotification filtered by the isDeleted column
 * @method     ChildNotification|null findOneByCreated(string $created) Return the first ChildNotification filtered by the created column
 * @method     ChildNotification|null findOneByModified(string $modified) Return the first ChildNotification filtered by the modified column *

 * @method     ChildNotification requirePk($key, ?ConnectionInterface $con = null) Return the ChildNotification by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOne(?ConnectionInterface $con = null) Return the first ChildNotification matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNotification requireOneById(int $id) Return the first ChildNotification filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByTitle(string $title) Return the first ChildNotification filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByDescription(string $description) Return the first ChildNotification filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByLink(string $link) Return the first ChildNotification filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByDate(string $date) Return the first ChildNotification filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneBySendTo(int $send_to) Return the first ChildNotification filtered by the send_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByImg(string $img) Return the first ChildNotification filtered by the img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByVideo(string $video) Return the first ChildNotification filtered by the video column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByCourseId(string $course_id) Return the first ChildNotification filtered by the course_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByPriceFor(string $price_for) Return the first ChildNotification filtered by the price_for column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByPublic(int $public) Return the first ChildNotification filtered by the public column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByUnpublished(int $unpublished) Return the first ChildNotification filtered by the unpublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByType(string $type) Return the first ChildNotification filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByIsdeleted(boolean $isDeleted) Return the first ChildNotification filtered by the isDeleted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByCreated(string $created) Return the first ChildNotification filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotification requireOneByModified(string $modified) Return the first ChildNotification filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNotification[]|Collection find(?ConnectionInterface $con = null) Return ChildNotification objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildNotification> find(?ConnectionInterface $con = null) Return ChildNotification objects based on current ModelCriteria
 * @method     ChildNotification[]|Collection findById(int $id) Return ChildNotification objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildNotification> findById(int $id) Return ChildNotification objects filtered by the id column
 * @method     ChildNotification[]|Collection findByTitle(string $title) Return ChildNotification objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildNotification> findByTitle(string $title) Return ChildNotification objects filtered by the title column
 * @method     ChildNotification[]|Collection findByDescription(string $description) Return ChildNotification objects filtered by the description column
 * @psalm-method Collection&\Traversable<ChildNotification> findByDescription(string $description) Return ChildNotification objects filtered by the description column
 * @method     ChildNotification[]|Collection findByLink(string $link) Return ChildNotification objects filtered by the link column
 * @psalm-method Collection&\Traversable<ChildNotification> findByLink(string $link) Return ChildNotification objects filtered by the link column
 * @method     ChildNotification[]|Collection findByDate(string $date) Return ChildNotification objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildNotification> findByDate(string $date) Return ChildNotification objects filtered by the date column
 * @method     ChildNotification[]|Collection findBySendTo(int $send_to) Return ChildNotification objects filtered by the send_to column
 * @psalm-method Collection&\Traversable<ChildNotification> findBySendTo(int $send_to) Return ChildNotification objects filtered by the send_to column
 * @method     ChildNotification[]|Collection findByImg(string $img) Return ChildNotification objects filtered by the img column
 * @psalm-method Collection&\Traversable<ChildNotification> findByImg(string $img) Return ChildNotification objects filtered by the img column
 * @method     ChildNotification[]|Collection findByVideo(string $video) Return ChildNotification objects filtered by the video column
 * @psalm-method Collection&\Traversable<ChildNotification> findByVideo(string $video) Return ChildNotification objects filtered by the video column
 * @method     ChildNotification[]|Collection findByCourseId(string $course_id) Return ChildNotification objects filtered by the course_id column
 * @psalm-method Collection&\Traversable<ChildNotification> findByCourseId(string $course_id) Return ChildNotification objects filtered by the course_id column
 * @method     ChildNotification[]|Collection findByPriceFor(string $price_for) Return ChildNotification objects filtered by the price_for column
 * @psalm-method Collection&\Traversable<ChildNotification> findByPriceFor(string $price_for) Return ChildNotification objects filtered by the price_for column
 * @method     ChildNotification[]|Collection findByPublic(int $public) Return ChildNotification objects filtered by the public column
 * @psalm-method Collection&\Traversable<ChildNotification> findByPublic(int $public) Return ChildNotification objects filtered by the public column
 * @method     ChildNotification[]|Collection findByUnpublished(int $unpublished) Return ChildNotification objects filtered by the unpublished column
 * @psalm-method Collection&\Traversable<ChildNotification> findByUnpublished(int $unpublished) Return ChildNotification objects filtered by the unpublished column
 * @method     ChildNotification[]|Collection findByType(string $type) Return ChildNotification objects filtered by the type column
 * @psalm-method Collection&\Traversable<ChildNotification> findByType(string $type) Return ChildNotification objects filtered by the type column
 * @method     ChildNotification[]|Collection findByIsdeleted(boolean $isDeleted) Return ChildNotification objects filtered by the isDeleted column
 * @psalm-method Collection&\Traversable<ChildNotification> findByIsdeleted(boolean $isDeleted) Return ChildNotification objects filtered by the isDeleted column
 * @method     ChildNotification[]|Collection findByCreated(string $created) Return ChildNotification objects filtered by the created column
 * @psalm-method Collection&\Traversable<ChildNotification> findByCreated(string $created) Return ChildNotification objects filtered by the created column
 * @method     ChildNotification[]|Collection findByModified(string $modified) Return ChildNotification objects filtered by the modified column
 * @psalm-method Collection&\Traversable<ChildNotification> findByModified(string $modified) Return ChildNotification objects filtered by the modified column
 * @method     ChildNotification[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildNotification> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NotificationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\NotificationQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Notification', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNotificationQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNotificationQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildNotificationQuery) {
            return $criteria;
        }
        $query = new ChildNotificationQuery();
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
     * @return ChildNotification|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NotificationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NotificationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNotification A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, description, link, date, send_to, img, video, course_id, price_for, public, unpublished, type, isDeleted, created, modified FROM notification WHERE id = :p0';
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
            /** @var ChildNotification $obj */
            $obj = new ChildNotification();
            $obj->hydrate($row);
            NotificationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNotification|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(NotificationTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(NotificationTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(NotificationTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NotificationTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_ID, $id, $comparison);

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

        $this->addUsingAlias(NotificationTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * $query->filterByDescription(['foo', 'bar']); // WHERE description IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $description The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDescription($description = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_DESCRIPTION, $description, $comparison);

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

        $this->addUsingAlias(NotificationTableMap::COL_LINK, $link, $comparison);

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

        $this->addUsingAlias(NotificationTableMap::COL_DATE, $date, $comparison);

        return $this;
    }

    /**
     * Filter the query on the send_to column
     *
     * Example usage:
     * <code>
     * $query->filterBySendTo(1234); // WHERE send_to = 1234
     * $query->filterBySendTo(array(12, 34)); // WHERE send_to IN (12, 34)
     * $query->filterBySendTo(array('min' => 12)); // WHERE send_to > 12
     * </code>
     *
     * @param mixed $sendTo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySendTo($sendTo = null, ?string $comparison = null)
    {
        if (is_array($sendTo)) {
            $useMinMax = false;
            if (isset($sendTo['min'])) {
                $this->addUsingAlias(NotificationTableMap::COL_SEND_TO, $sendTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sendTo['max'])) {
                $this->addUsingAlias(NotificationTableMap::COL_SEND_TO, $sendTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_SEND_TO, $sendTo, $comparison);

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

        $this->addUsingAlias(NotificationTableMap::COL_IMG, $img, $comparison);

        return $this;
    }

    /**
     * Filter the query on the video column
     *
     * Example usage:
     * <code>
     * $query->filterByVideo('fooValue');   // WHERE video = 'fooValue'
     * $query->filterByVideo('%fooValue%', Criteria::LIKE); // WHERE video LIKE '%fooValue%'
     * $query->filterByVideo(['foo', 'bar']); // WHERE video IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $video The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVideo($video = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($video)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_VIDEO, $video, $comparison);

        return $this;
    }

    /**
     * Filter the query on the course_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCourseId('fooValue');   // WHERE course_id = 'fooValue'
     * $query->filterByCourseId('%fooValue%', Criteria::LIKE); // WHERE course_id LIKE '%fooValue%'
     * $query->filterByCourseId(['foo', 'bar']); // WHERE course_id IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $courseId The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCourseId($courseId = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($courseId)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_COURSE_ID, $courseId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price_for column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceFor('fooValue');   // WHERE price_for = 'fooValue'
     * $query->filterByPriceFor('%fooValue%', Criteria::LIKE); // WHERE price_for LIKE '%fooValue%'
     * $query->filterByPriceFor(['foo', 'bar']); // WHERE price_for IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $priceFor The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceFor($priceFor = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($priceFor)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_PRICE_FOR, $priceFor, $comparison);

        return $this;
    }

    /**
     * Filter the query on the public column
     *
     * Example usage:
     * <code>
     * $query->filterByPublic(1234); // WHERE public = 1234
     * $query->filterByPublic(array(12, 34)); // WHERE public IN (12, 34)
     * $query->filterByPublic(array('min' => 12)); // WHERE public > 12
     * </code>
     *
     * @param mixed $public The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPublic($public = null, ?string $comparison = null)
    {
        if (is_array($public)) {
            $useMinMax = false;
            if (isset($public['min'])) {
                $this->addUsingAlias(NotificationTableMap::COL_PUBLIC, $public['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($public['max'])) {
                $this->addUsingAlias(NotificationTableMap::COL_PUBLIC, $public['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_PUBLIC, $public, $comparison);

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
                $this->addUsingAlias(NotificationTableMap::COL_UNPUBLISHED, $unpublished['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpublished['max'])) {
                $this->addUsingAlias(NotificationTableMap::COL_UNPUBLISHED, $unpublished['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_UNPUBLISHED, $unpublished, $comparison);

        return $this;
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * $query->filterByType(['foo', 'bar']); // WHERE type IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $type The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByType($type = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_TYPE, $type, $comparison);

        return $this;
    }

    /**
     * Filter the query on the isDeleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsdeleted(true); // WHERE isDeleted = true
     * $query->filterByIsdeleted('yes'); // WHERE isDeleted = true
     * </code>
     *
     * @param bool|string $isdeleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIsdeleted($isdeleted = null, ?string $comparison = null)
    {
        if (is_string($isdeleted)) {
            $isdeleted = in_array(strtolower($isdeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        $this->addUsingAlias(NotificationTableMap::COL_ISDELETED, $isdeleted, $comparison);

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
                $this->addUsingAlias(NotificationTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(NotificationTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_CREATED, $created, $comparison);

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
                $this->addUsingAlias(NotificationTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(NotificationTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NotificationTableMap::COL_MODIFIED, $modified, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildNotification $notification Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($notification = null)
    {
        if ($notification) {
            $this->addUsingAlias(NotificationTableMap::COL_ID, $notification->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the notification table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NotificationTableMap::clearInstancePool();
            NotificationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NotificationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NotificationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NotificationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
