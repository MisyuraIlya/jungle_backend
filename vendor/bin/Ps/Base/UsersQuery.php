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
use Ps\Users as ChildUsers;
use Ps\UsersQuery as ChildUsersQuery;
use Ps\Map\UsersTableMap;

/**
 * Base class that represents a query for the 'users' table.
 *
 *
 *
 * @method     ChildUsersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUsersQuery orderBySiteId($order = Criteria::ASC) Order by the site_id column
 * @method     ChildUsersQuery orderByMail($order = Criteria::ASC) Order by the mail column
 * @method     ChildUsersQuery orderByMailSecond($order = Criteria::ASC) Order by the mail_second column
 * @method     ChildUsersQuery orderByTel($order = Criteria::ASC) Order by the tel column
 * @method     ChildUsersQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     ChildUsersQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildUsersQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildUsersQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildUsersQuery orderByUnpublished($order = Criteria::ASC) Order by the unpublished column
 * @method     ChildUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildUsersQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     ChildUsersQuery orderByPassport($order = Criteria::ASC) Order by the passport column
 * @method     ChildUsersQuery orderByRecovery($order = Criteria::ASC) Order by the recovery column
 * @method     ChildUsersQuery orderByImg($order = Criteria::ASC) Order by the img column
 * @method     ChildUsersQuery orderByFacebookId($order = Criteria::ASC) Order by the facebook_id column
 * @method     ChildUsersQuery orderByGoogleId($order = Criteria::ASC) Order by the google_id column
 * @method     ChildUsersQuery orderByTown($order = Criteria::ASC) Order by the town column
 * @method     ChildUsersQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildUsersQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildUsersQuery orderByAccept($order = Criteria::ASC) Order by the accept column
 *
 * @method     ChildUsersQuery groupById() Group by the id column
 * @method     ChildUsersQuery groupBySiteId() Group by the site_id column
 * @method     ChildUsersQuery groupByMail() Group by the mail column
 * @method     ChildUsersQuery groupByMailSecond() Group by the mail_second column
 * @method     ChildUsersQuery groupByTel() Group by the tel column
 * @method     ChildUsersQuery groupByMobile() Group by the mobile column
 * @method     ChildUsersQuery groupByFirstName() Group by the first_name column
 * @method     ChildUsersQuery groupByLastName() Group by the last_name column
 * @method     ChildUsersQuery groupByType() Group by the type column
 * @method     ChildUsersQuery groupByUnpublished() Group by the unpublished column
 * @method     ChildUsersQuery groupByPassword() Group by the password column
 * @method     ChildUsersQuery groupByToken() Group by the token column
 * @method     ChildUsersQuery groupByPassport() Group by the passport column
 * @method     ChildUsersQuery groupByRecovery() Group by the recovery column
 * @method     ChildUsersQuery groupByImg() Group by the img column
 * @method     ChildUsersQuery groupByFacebookId() Group by the facebook_id column
 * @method     ChildUsersQuery groupByGoogleId() Group by the google_id column
 * @method     ChildUsersQuery groupByTown() Group by the town column
 * @method     ChildUsersQuery groupByAddress() Group by the address column
 * @method     ChildUsersQuery groupByZip() Group by the zip column
 * @method     ChildUsersQuery groupByAccept() Group by the accept column
 *
 * @method     ChildUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsers|null findOne(?ConnectionInterface $con = null) Return the first ChildUsers matching the query
 * @method     ChildUsers findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildUsers matching the query, or a new ChildUsers object populated from the query conditions when no match is found
 *
 * @method     ChildUsers|null findOneById(int $id) Return the first ChildUsers filtered by the id column
 * @method     ChildUsers|null findOneBySiteId(int $site_id) Return the first ChildUsers filtered by the site_id column
 * @method     ChildUsers|null findOneByMail(string $mail) Return the first ChildUsers filtered by the mail column
 * @method     ChildUsers|null findOneByMailSecond(string $mail_second) Return the first ChildUsers filtered by the mail_second column
 * @method     ChildUsers|null findOneByTel(string $tel) Return the first ChildUsers filtered by the tel column
 * @method     ChildUsers|null findOneByMobile(string $mobile) Return the first ChildUsers filtered by the mobile column
 * @method     ChildUsers|null findOneByFirstName(string $first_name) Return the first ChildUsers filtered by the first_name column
 * @method     ChildUsers|null findOneByLastName(string $last_name) Return the first ChildUsers filtered by the last_name column
 * @method     ChildUsers|null findOneByType(int $type) Return the first ChildUsers filtered by the type column
 * @method     ChildUsers|null findOneByUnpublished(int $unpublished) Return the first ChildUsers filtered by the unpublished column
 * @method     ChildUsers|null findOneByPassword(string $password) Return the first ChildUsers filtered by the password column
 * @method     ChildUsers|null findOneByToken(string $token) Return the first ChildUsers filtered by the token column
 * @method     ChildUsers|null findOneByPassport(string $passport) Return the first ChildUsers filtered by the passport column
 * @method     ChildUsers|null findOneByRecovery(string $recovery) Return the first ChildUsers filtered by the recovery column
 * @method     ChildUsers|null findOneByImg(string $img) Return the first ChildUsers filtered by the img column
 * @method     ChildUsers|null findOneByFacebookId(string $facebook_id) Return the first ChildUsers filtered by the facebook_id column
 * @method     ChildUsers|null findOneByGoogleId(string $google_id) Return the first ChildUsers filtered by the google_id column
 * @method     ChildUsers|null findOneByTown(string $town) Return the first ChildUsers filtered by the town column
 * @method     ChildUsers|null findOneByAddress(string $address) Return the first ChildUsers filtered by the address column
 * @method     ChildUsers|null findOneByZip(string $zip) Return the first ChildUsers filtered by the zip column
 * @method     ChildUsers|null findOneByAccept(int $accept) Return the first ChildUsers filtered by the accept column *

 * @method     ChildUsers requirePk($key, ?ConnectionInterface $con = null) Return the ChildUsers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOne(?ConnectionInterface $con = null) Return the first ChildUsers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers requireOneById(int $id) Return the first ChildUsers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneBySiteId(int $site_id) Return the first ChildUsers filtered by the site_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByMail(string $mail) Return the first ChildUsers filtered by the mail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByMailSecond(string $mail_second) Return the first ChildUsers filtered by the mail_second column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByTel(string $tel) Return the first ChildUsers filtered by the tel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByMobile(string $mobile) Return the first ChildUsers filtered by the mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByFirstName(string $first_name) Return the first ChildUsers filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByLastName(string $last_name) Return the first ChildUsers filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByType(int $type) Return the first ChildUsers filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByUnpublished(int $unpublished) Return the first ChildUsers filtered by the unpublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByPassword(string $password) Return the first ChildUsers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByToken(string $token) Return the first ChildUsers filtered by the token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByPassport(string $passport) Return the first ChildUsers filtered by the passport column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByRecovery(string $recovery) Return the first ChildUsers filtered by the recovery column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByImg(string $img) Return the first ChildUsers filtered by the img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByFacebookId(string $facebook_id) Return the first ChildUsers filtered by the facebook_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByGoogleId(string $google_id) Return the first ChildUsers filtered by the google_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByTown(string $town) Return the first ChildUsers filtered by the town column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByAddress(string $address) Return the first ChildUsers filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByZip(string $zip) Return the first ChildUsers filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByAccept(int $accept) Return the first ChildUsers filtered by the accept column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers[]|Collection find(?ConnectionInterface $con = null) Return ChildUsers objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildUsers> find(?ConnectionInterface $con = null) Return ChildUsers objects based on current ModelCriteria
 * @method     ChildUsers[]|Collection findById(int $id) Return ChildUsers objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildUsers> findById(int $id) Return ChildUsers objects filtered by the id column
 * @method     ChildUsers[]|Collection findBySiteId(int $site_id) Return ChildUsers objects filtered by the site_id column
 * @psalm-method Collection&\Traversable<ChildUsers> findBySiteId(int $site_id) Return ChildUsers objects filtered by the site_id column
 * @method     ChildUsers[]|Collection findByMail(string $mail) Return ChildUsers objects filtered by the mail column
 * @psalm-method Collection&\Traversable<ChildUsers> findByMail(string $mail) Return ChildUsers objects filtered by the mail column
 * @method     ChildUsers[]|Collection findByMailSecond(string $mail_second) Return ChildUsers objects filtered by the mail_second column
 * @psalm-method Collection&\Traversable<ChildUsers> findByMailSecond(string $mail_second) Return ChildUsers objects filtered by the mail_second column
 * @method     ChildUsers[]|Collection findByTel(string $tel) Return ChildUsers objects filtered by the tel column
 * @psalm-method Collection&\Traversable<ChildUsers> findByTel(string $tel) Return ChildUsers objects filtered by the tel column
 * @method     ChildUsers[]|Collection findByMobile(string $mobile) Return ChildUsers objects filtered by the mobile column
 * @psalm-method Collection&\Traversable<ChildUsers> findByMobile(string $mobile) Return ChildUsers objects filtered by the mobile column
 * @method     ChildUsers[]|Collection findByFirstName(string $first_name) Return ChildUsers objects filtered by the first_name column
 * @psalm-method Collection&\Traversable<ChildUsers> findByFirstName(string $first_name) Return ChildUsers objects filtered by the first_name column
 * @method     ChildUsers[]|Collection findByLastName(string $last_name) Return ChildUsers objects filtered by the last_name column
 * @psalm-method Collection&\Traversable<ChildUsers> findByLastName(string $last_name) Return ChildUsers objects filtered by the last_name column
 * @method     ChildUsers[]|Collection findByType(int $type) Return ChildUsers objects filtered by the type column
 * @psalm-method Collection&\Traversable<ChildUsers> findByType(int $type) Return ChildUsers objects filtered by the type column
 * @method     ChildUsers[]|Collection findByUnpublished(int $unpublished) Return ChildUsers objects filtered by the unpublished column
 * @psalm-method Collection&\Traversable<ChildUsers> findByUnpublished(int $unpublished) Return ChildUsers objects filtered by the unpublished column
 * @method     ChildUsers[]|Collection findByPassword(string $password) Return ChildUsers objects filtered by the password column
 * @psalm-method Collection&\Traversable<ChildUsers> findByPassword(string $password) Return ChildUsers objects filtered by the password column
 * @method     ChildUsers[]|Collection findByToken(string $token) Return ChildUsers objects filtered by the token column
 * @psalm-method Collection&\Traversable<ChildUsers> findByToken(string $token) Return ChildUsers objects filtered by the token column
 * @method     ChildUsers[]|Collection findByPassport(string $passport) Return ChildUsers objects filtered by the passport column
 * @psalm-method Collection&\Traversable<ChildUsers> findByPassport(string $passport) Return ChildUsers objects filtered by the passport column
 * @method     ChildUsers[]|Collection findByRecovery(string $recovery) Return ChildUsers objects filtered by the recovery column
 * @psalm-method Collection&\Traversable<ChildUsers> findByRecovery(string $recovery) Return ChildUsers objects filtered by the recovery column
 * @method     ChildUsers[]|Collection findByImg(string $img) Return ChildUsers objects filtered by the img column
 * @psalm-method Collection&\Traversable<ChildUsers> findByImg(string $img) Return ChildUsers objects filtered by the img column
 * @method     ChildUsers[]|Collection findByFacebookId(string $facebook_id) Return ChildUsers objects filtered by the facebook_id column
 * @psalm-method Collection&\Traversable<ChildUsers> findByFacebookId(string $facebook_id) Return ChildUsers objects filtered by the facebook_id column
 * @method     ChildUsers[]|Collection findByGoogleId(string $google_id) Return ChildUsers objects filtered by the google_id column
 * @psalm-method Collection&\Traversable<ChildUsers> findByGoogleId(string $google_id) Return ChildUsers objects filtered by the google_id column
 * @method     ChildUsers[]|Collection findByTown(string $town) Return ChildUsers objects filtered by the town column
 * @psalm-method Collection&\Traversable<ChildUsers> findByTown(string $town) Return ChildUsers objects filtered by the town column
 * @method     ChildUsers[]|Collection findByAddress(string $address) Return ChildUsers objects filtered by the address column
 * @psalm-method Collection&\Traversable<ChildUsers> findByAddress(string $address) Return ChildUsers objects filtered by the address column
 * @method     ChildUsers[]|Collection findByZip(string $zip) Return ChildUsers objects filtered by the zip column
 * @psalm-method Collection&\Traversable<ChildUsers> findByZip(string $zip) Return ChildUsers objects filtered by the zip column
 * @method     ChildUsers[]|Collection findByAccept(int $accept) Return ChildUsers objects filtered by the accept column
 * @psalm-method Collection&\Traversable<ChildUsers> findByAccept(int $accept) Return ChildUsers objects filtered by the accept column
 * @method     ChildUsers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildUsers> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\UsersQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Users', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsersQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsersQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildUsersQuery) {
            return $criteria;
        }
        $query = new ChildUsersQuery();
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
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUsers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, site_id, mail, mail_second, tel, mobile, first_name, last_name, type, unpublished, password, token, passport, recovery, img, facebook_id, google_id, town, address, zip, accept FROM users WHERE id = :p0';
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
            /** @var ChildUsers $obj */
            $obj = new ChildUsers();
            $obj->hydrate($row);
            UsersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(UsersTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(UsersTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(UsersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the site_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySiteId(1234); // WHERE site_id = 1234
     * $query->filterBySiteId(array(12, 34)); // WHERE site_id IN (12, 34)
     * $query->filterBySiteId(array('min' => 12)); // WHERE site_id > 12
     * </code>
     *
     * @param mixed $siteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySiteId($siteId = null, ?string $comparison = null)
    {
        if (is_array($siteId)) {
            $useMinMax = false;
            if (isset($siteId['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_SITE_ID, $siteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($siteId['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_SITE_ID, $siteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_SITE_ID, $siteId, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_MAIL, $mail, $comparison);

        return $this;
    }

    /**
     * Filter the query on the mail_second column
     *
     * Example usage:
     * <code>
     * $query->filterByMailSecond('fooValue');   // WHERE mail_second = 'fooValue'
     * $query->filterByMailSecond('%fooValue%', Criteria::LIKE); // WHERE mail_second LIKE '%fooValue%'
     * $query->filterByMailSecond(['foo', 'bar']); // WHERE mail_second IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $mailSecond The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMailSecond($mailSecond = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mailSecond)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_MAIL_SECOND, $mailSecond, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_TEL, $tel, $comparison);

        return $this;
    }

    /**
     * Filter the query on the mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByMobile('fooValue');   // WHERE mobile = 'fooValue'
     * $query->filterByMobile('%fooValue%', Criteria::LIKE); // WHERE mobile LIKE '%fooValue%'
     * $query->filterByMobile(['foo', 'bar']); // WHERE mobile IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $mobile The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_MOBILE, $mobile, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_FIRST_NAME, $firstName, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_LAST_NAME, $lastName, $comparison);

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
                $this->addUsingAlias(UsersTableMap::COL_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_TYPE, $type, $comparison);

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
                $this->addUsingAlias(UsersTableMap::COL_UNPUBLISHED, $unpublished['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpublished['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_UNPUBLISHED, $unpublished['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_UNPUBLISHED, $unpublished, $comparison);

        return $this;
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * $query->filterByPassword(['foo', 'bar']); // WHERE password IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $password The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPassword($password = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_PASSWORD, $password, $comparison);

        return $this;
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%', Criteria::LIKE); // WHERE token LIKE '%fooValue%'
     * $query->filterByToken(['foo', 'bar']); // WHERE token IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $token The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByToken($token = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_TOKEN, $token, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_PASSPORT, $passport, $comparison);

        return $this;
    }

    /**
     * Filter the query on the recovery column
     *
     * Example usage:
     * <code>
     * $query->filterByRecovery('fooValue');   // WHERE recovery = 'fooValue'
     * $query->filterByRecovery('%fooValue%', Criteria::LIKE); // WHERE recovery LIKE '%fooValue%'
     * $query->filterByRecovery(['foo', 'bar']); // WHERE recovery IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $recovery The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRecovery($recovery = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recovery)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_RECOVERY, $recovery, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_IMG, $img, $comparison);

        return $this;
    }

    /**
     * Filter the query on the facebook_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFacebookId('fooValue');   // WHERE facebook_id = 'fooValue'
     * $query->filterByFacebookId('%fooValue%', Criteria::LIKE); // WHERE facebook_id LIKE '%fooValue%'
     * $query->filterByFacebookId(['foo', 'bar']); // WHERE facebook_id IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $facebookId The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFacebookId($facebookId = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($facebookId)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_FACEBOOK_ID, $facebookId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the google_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGoogleId('fooValue');   // WHERE google_id = 'fooValue'
     * $query->filterByGoogleId('%fooValue%', Criteria::LIKE); // WHERE google_id LIKE '%fooValue%'
     * $query->filterByGoogleId(['foo', 'bar']); // WHERE google_id IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $googleId The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByGoogleId($googleId = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($googleId)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_GOOGLE_ID, $googleId, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_TOWN, $town, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_ADDRESS, $address, $comparison);

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

        $this->addUsingAlias(UsersTableMap::COL_ZIP, $zip, $comparison);

        return $this;
    }

    /**
     * Filter the query on the accept column
     *
     * Example usage:
     * <code>
     * $query->filterByAccept(1234); // WHERE accept = 1234
     * $query->filterByAccept(array(12, 34)); // WHERE accept IN (12, 34)
     * $query->filterByAccept(array('min' => 12)); // WHERE accept > 12
     * </code>
     *
     * @param mixed $accept The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAccept($accept = null, ?string $comparison = null)
    {
        if (is_array($accept)) {
            $useMinMax = false;
            if (isset($accept['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_ACCEPT, $accept['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accept['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_ACCEPT, $accept['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_ACCEPT, $accept, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildUsers $users Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($users = null)
    {
        if ($users) {
            $this->addUsingAlias(UsersTableMap::COL_ID, $users->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsersTableMap::clearInstancePool();
            UsersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
