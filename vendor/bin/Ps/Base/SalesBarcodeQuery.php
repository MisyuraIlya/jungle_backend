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
use Ps\SalesBarcode as ChildSalesBarcode;
use Ps\SalesBarcodeQuery as ChildSalesBarcodeQuery;
use Ps\Map\SalesBarcodeTableMap;

/**
 * Base class that represents a query for the 'sales_barcode' table.
 *
 *
 *
 * @method     ChildSalesBarcodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSalesBarcodeQuery orderByExId($order = Criteria::ASC) Order by the ex_id column
 * @method     ChildSalesBarcodeQuery orderByItemCode($order = Criteria::ASC) Order by the item_code column
 * @method     ChildSalesBarcodeQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildSalesBarcodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method     ChildSalesBarcodeQuery groupById() Group by the id column
 * @method     ChildSalesBarcodeQuery groupByExId() Group by the ex_id column
 * @method     ChildSalesBarcodeQuery groupByItemCode() Group by the item_code column
 * @method     ChildSalesBarcodeQuery groupByPrice() Group by the price column
 * @method     ChildSalesBarcodeQuery groupByCode() Group by the code column
 *
 * @method     ChildSalesBarcodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSalesBarcodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSalesBarcodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSalesBarcodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSalesBarcodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSalesBarcodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSalesBarcode|null findOne(?ConnectionInterface $con = null) Return the first ChildSalesBarcode matching the query
 * @method     ChildSalesBarcode findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSalesBarcode matching the query, or a new ChildSalesBarcode object populated from the query conditions when no match is found
 *
 * @method     ChildSalesBarcode|null findOneById(int $id) Return the first ChildSalesBarcode filtered by the id column
 * @method     ChildSalesBarcode|null findOneByExId(int $ex_id) Return the first ChildSalesBarcode filtered by the ex_id column
 * @method     ChildSalesBarcode|null findOneByItemCode(string $item_code) Return the first ChildSalesBarcode filtered by the item_code column
 * @method     ChildSalesBarcode|null findOneByPrice(int $price) Return the first ChildSalesBarcode filtered by the price column
 * @method     ChildSalesBarcode|null findOneByCode(string $code) Return the first ChildSalesBarcode filtered by the code column *

 * @method     ChildSalesBarcode requirePk($key, ?ConnectionInterface $con = null) Return the ChildSalesBarcode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesBarcode requireOne(?ConnectionInterface $con = null) Return the first ChildSalesBarcode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesBarcode requireOneById(int $id) Return the first ChildSalesBarcode filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesBarcode requireOneByExId(int $ex_id) Return the first ChildSalesBarcode filtered by the ex_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesBarcode requireOneByItemCode(string $item_code) Return the first ChildSalesBarcode filtered by the item_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesBarcode requireOneByPrice(int $price) Return the first ChildSalesBarcode filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesBarcode requireOneByCode(string $code) Return the first ChildSalesBarcode filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesBarcode[]|Collection find(?ConnectionInterface $con = null) Return ChildSalesBarcode objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSalesBarcode> find(?ConnectionInterface $con = null) Return ChildSalesBarcode objects based on current ModelCriteria
 * @method     ChildSalesBarcode[]|Collection findById(int $id) Return ChildSalesBarcode objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildSalesBarcode> findById(int $id) Return ChildSalesBarcode objects filtered by the id column
 * @method     ChildSalesBarcode[]|Collection findByExId(int $ex_id) Return ChildSalesBarcode objects filtered by the ex_id column
 * @psalm-method Collection&\Traversable<ChildSalesBarcode> findByExId(int $ex_id) Return ChildSalesBarcode objects filtered by the ex_id column
 * @method     ChildSalesBarcode[]|Collection findByItemCode(string $item_code) Return ChildSalesBarcode objects filtered by the item_code column
 * @psalm-method Collection&\Traversable<ChildSalesBarcode> findByItemCode(string $item_code) Return ChildSalesBarcode objects filtered by the item_code column
 * @method     ChildSalesBarcode[]|Collection findByPrice(int $price) Return ChildSalesBarcode objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildSalesBarcode> findByPrice(int $price) Return ChildSalesBarcode objects filtered by the price column
 * @method     ChildSalesBarcode[]|Collection findByCode(string $code) Return ChildSalesBarcode objects filtered by the code column
 * @psalm-method Collection&\Traversable<ChildSalesBarcode> findByCode(string $code) Return ChildSalesBarcode objects filtered by the code column
 * @method     ChildSalesBarcode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSalesBarcode> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SalesBarcodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\SalesBarcodeQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\SalesBarcode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSalesBarcodeQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSalesBarcodeQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSalesBarcodeQuery) {
            return $criteria;
        }
        $query = new ChildSalesBarcodeQuery();
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
     * @return ChildSalesBarcode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SalesBarcodeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SalesBarcodeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSalesBarcode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ex_id, item_code, price, code FROM sales_barcode WHERE id = :p0';
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
            /** @var ChildSalesBarcode $obj */
            $obj = new ChildSalesBarcode();
            $obj->hydrate($row);
            SalesBarcodeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSalesBarcode|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(SalesBarcodeTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(SalesBarcodeTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(SalesBarcodeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SalesBarcodeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesBarcodeTableMap::COL_ID, $id, $comparison);

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
                $this->addUsingAlias(SalesBarcodeTableMap::COL_EX_ID, $exId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($exId['max'])) {
                $this->addUsingAlias(SalesBarcodeTableMap::COL_EX_ID, $exId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesBarcodeTableMap::COL_EX_ID, $exId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the item_code column
     *
     * Example usage:
     * <code>
     * $query->filterByItemCode('fooValue');   // WHERE item_code = 'fooValue'
     * $query->filterByItemCode('%fooValue%', Criteria::LIKE); // WHERE item_code LIKE '%fooValue%'
     * $query->filterByItemCode(['foo', 'bar']); // WHERE item_code IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemCode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemCode($itemCode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemCode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesBarcodeTableMap::COL_ITEM_CODE, $itemCode, $comparison);

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
                $this->addUsingAlias(SalesBarcodeTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(SalesBarcodeTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesBarcodeTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * $query->filterByCode(['foo', 'bar']); // WHERE code IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $code The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCode($code = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SalesBarcodeTableMap::COL_CODE, $code, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSalesBarcode $salesBarcode Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($salesBarcode = null)
    {
        if ($salesBarcode) {
            $this->addUsingAlias(SalesBarcodeTableMap::COL_ID, $salesBarcode->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sales_barcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesBarcodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SalesBarcodeTableMap::clearInstancePool();
            SalesBarcodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SalesBarcodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SalesBarcodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SalesBarcodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SalesBarcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
