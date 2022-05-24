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
use Ps\Administrators as ChildAdministrators;
use Ps\AdministratorsQuery as ChildAdministratorsQuery;
use Ps\Map\AdministratorsTableMap;

/**
 * Base class that represents a query for the 'administrators' table.
 *
 *
 *
 * @method     ChildAdministratorsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAdministratorsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildAdministratorsQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildAdministratorsQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     ChildAdministratorsQuery orderByRole($order = Criteria::ASC) Order by the role column
 * @method     ChildAdministratorsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildAdministratorsQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildAdministratorsQuery orderByAppId($order = Criteria::ASC) Order by the app_id column
 *
 * @method     ChildAdministratorsQuery groupById() Group by the id column
 * @method     ChildAdministratorsQuery groupByName() Group by the name column
 * @method     ChildAdministratorsQuery groupByPassword() Group by the password column
 * @method     ChildAdministratorsQuery groupByToken() Group by the token column
 * @method     ChildAdministratorsQuery groupByRole() Group by the role column
 * @method     ChildAdministratorsQuery groupByEmail() Group by the email column
 * @method     ChildAdministratorsQuery groupByPhone() Group by the phone column
 * @method     ChildAdministratorsQuery groupByAppId() Group by the app_id column
 *
 * @method     ChildAdministratorsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdministratorsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdministratorsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdministratorsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdministratorsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdministratorsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdministrators|null findOne(?ConnectionInterface $con = null) Return the first ChildAdministrators matching the query
 * @method     ChildAdministrators findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildAdministrators matching the query, or a new ChildAdministrators object populated from the query conditions when no match is found
 *
 * @method     ChildAdministrators|null findOneById(int $id) Return the first ChildAdministrators filtered by the id column
 * @method     ChildAdministrators|null findOneByName(string $name) Return the first ChildAdministrators filtered by the name column
 * @method     ChildAdministrators|null findOneByPassword(string $password) Return the first ChildAdministrators filtered by the password column
 * @method     ChildAdministrators|null findOneByToken(string $token) Return the first ChildAdministrators filtered by the token column
 * @method     ChildAdministrators|null findOneByRole(string $role) Return the first ChildAdministrators filtered by the role column
 * @method     ChildAdministrators|null findOneByEmail(string $email) Return the first ChildAdministrators filtered by the email column
 * @method     ChildAdministrators|null findOneByPhone(string $phone) Return the first ChildAdministrators filtered by the phone column
 * @method     ChildAdministrators|null findOneByAppId(string $app_id) Return the first ChildAdministrators filtered by the app_id column *

 * @method     ChildAdministrators requirePk($key, ?ConnectionInterface $con = null) Return the ChildAdministrators by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOne(?ConnectionInterface $con = null) Return the first ChildAdministrators matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdministrators requireOneById(int $id) Return the first ChildAdministrators filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOneByName(string $name) Return the first ChildAdministrators filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOneByPassword(string $password) Return the first ChildAdministrators filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOneByToken(string $token) Return the first ChildAdministrators filtered by the token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOneByRole(string $role) Return the first ChildAdministrators filtered by the role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOneByEmail(string $email) Return the first ChildAdministrators filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOneByPhone(string $phone) Return the first ChildAdministrators filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrators requireOneByAppId(string $app_id) Return the first ChildAdministrators filtered by the app_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdministrators[]|Collection find(?ConnectionInterface $con = null) Return ChildAdministrators objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildAdministrators> find(?ConnectionInterface $con = null) Return ChildAdministrators objects based on current ModelCriteria
 * @method     ChildAdministrators[]|Collection findById(int $id) Return ChildAdministrators objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findById(int $id) Return ChildAdministrators objects filtered by the id column
 * @method     ChildAdministrators[]|Collection findByName(string $name) Return ChildAdministrators objects filtered by the name column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findByName(string $name) Return ChildAdministrators objects filtered by the name column
 * @method     ChildAdministrators[]|Collection findByPassword(string $password) Return ChildAdministrators objects filtered by the password column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findByPassword(string $password) Return ChildAdministrators objects filtered by the password column
 * @method     ChildAdministrators[]|Collection findByToken(string $token) Return ChildAdministrators objects filtered by the token column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findByToken(string $token) Return ChildAdministrators objects filtered by the token column
 * @method     ChildAdministrators[]|Collection findByRole(string $role) Return ChildAdministrators objects filtered by the role column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findByRole(string $role) Return ChildAdministrators objects filtered by the role column
 * @method     ChildAdministrators[]|Collection findByEmail(string $email) Return ChildAdministrators objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findByEmail(string $email) Return ChildAdministrators objects filtered by the email column
 * @method     ChildAdministrators[]|Collection findByPhone(string $phone) Return ChildAdministrators objects filtered by the phone column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findByPhone(string $phone) Return ChildAdministrators objects filtered by the phone column
 * @method     ChildAdministrators[]|Collection findByAppId(string $app_id) Return ChildAdministrators objects filtered by the app_id column
 * @psalm-method Collection&\Traversable<ChildAdministrators> findByAppId(string $app_id) Return ChildAdministrators objects filtered by the app_id column
 * @method     ChildAdministrators[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildAdministrators> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AdministratorsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\AdministratorsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Administrators', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdministratorsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdministratorsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildAdministratorsQuery) {
            return $criteria;
        }
        $query = new ChildAdministratorsQuery();
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
     * @return ChildAdministrators|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdministratorsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdministratorsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAdministrators A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, password, token, role, email, phone, app_id FROM administrators WHERE id = :p0';
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
            /** @var ChildAdministrators $obj */
            $obj = new ChildAdministrators();
            $obj->hydrate($row);
            AdministratorsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAdministrators|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(AdministratorsTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(AdministratorsTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(AdministratorsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AdministratorsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdministratorsTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * $query->filterByName(['foo', 'bar']); // WHERE name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $name The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByName($name = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdministratorsTableMap::COL_NAME, $name, $comparison);

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

        $this->addUsingAlias(AdministratorsTableMap::COL_PASSWORD, $password, $comparison);

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

        $this->addUsingAlias(AdministratorsTableMap::COL_TOKEN, $token, $comparison);

        return $this;
    }

    /**
     * Filter the query on the role column
     *
     * Example usage:
     * <code>
     * $query->filterByRole('fooValue');   // WHERE role = 'fooValue'
     * $query->filterByRole('%fooValue%', Criteria::LIKE); // WHERE role LIKE '%fooValue%'
     * $query->filterByRole(['foo', 'bar']); // WHERE role IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $role The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRole($role = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($role)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdministratorsTableMap::COL_ROLE, $role, $comparison);

        return $this;
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * $query->filterByEmail(['foo', 'bar']); // WHERE email IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $email The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEmail($email = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdministratorsTableMap::COL_EMAIL, $email, $comparison);

        return $this;
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * $query->filterByPhone(['foo', 'bar']); // WHERE phone IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $phone The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPhone($phone = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdministratorsTableMap::COL_PHONE, $phone, $comparison);

        return $this;
    }

    /**
     * Filter the query on the app_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAppId('fooValue');   // WHERE app_id = 'fooValue'
     * $query->filterByAppId('%fooValue%', Criteria::LIKE); // WHERE app_id LIKE '%fooValue%'
     * $query->filterByAppId(['foo', 'bar']); // WHERE app_id IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $appId The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAppId($appId = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appId)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdministratorsTableMap::COL_APP_ID, $appId, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildAdministrators $administrators Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($administrators = null)
    {
        if ($administrators) {
            $this->addUsingAlias(AdministratorsTableMap::COL_ID, $administrators->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the administrators table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdministratorsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdministratorsTableMap::clearInstancePool();
            AdministratorsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdministratorsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdministratorsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdministratorsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdministratorsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
