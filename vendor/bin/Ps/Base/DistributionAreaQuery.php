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
use Ps\DistributionArea as ChildDistributionArea;
use Ps\DistributionAreaQuery as ChildDistributionAreaQuery;
use Ps\Map\DistributionAreaTableMap;

/**
 * Base class that represents a query for the 'distribution_area' table.
 *
 *
 *
 * @method     ChildDistributionAreaQuery orderById($order = Criteria::ASC) Order by the Id column
 * @method     ChildDistributionAreaQuery orderByTitle($order = Criteria::ASC) Order by the Title column
 * @method     ChildDistributionAreaQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method     ChildDistributionAreaQuery orderByColor($order = Criteria::ASC) Order by the Color column
 * @method     ChildDistributionAreaQuery orderByPrice($order = Criteria::ASC) Order by the Price column
 * @method     ChildDistributionAreaQuery orderByMinorderprice($order = Criteria::ASC) Order by the MinOrderPrice column
 * @method     ChildDistributionAreaQuery orderByMinorderpriceforfreeshipping($order = Criteria::ASC) Order by the MinOrderPriceForFreeShipping column
 * @method     ChildDistributionAreaQuery orderByIspublished($order = Criteria::ASC) Order by the IsPublished column
 * @method     ChildDistributionAreaQuery orderByCreated($order = Criteria::ASC) Order by the Created column
 * @method     ChildDistributionAreaQuery orderByModified($order = Criteria::ASC) Order by the Modified column
 * @method     ChildDistributionAreaQuery orderByLocation($order = Criteria::ASC) Order by the Location column
 * @method     ChildDistributionAreaQuery orderByIsdeleted($order = Criteria::ASC) Order by the IsDeleted column
 *
 * @method     ChildDistributionAreaQuery groupById() Group by the Id column
 * @method     ChildDistributionAreaQuery groupByTitle() Group by the Title column
 * @method     ChildDistributionAreaQuery groupByDescription() Group by the Description column
 * @method     ChildDistributionAreaQuery groupByColor() Group by the Color column
 * @method     ChildDistributionAreaQuery groupByPrice() Group by the Price column
 * @method     ChildDistributionAreaQuery groupByMinorderprice() Group by the MinOrderPrice column
 * @method     ChildDistributionAreaQuery groupByMinorderpriceforfreeshipping() Group by the MinOrderPriceForFreeShipping column
 * @method     ChildDistributionAreaQuery groupByIspublished() Group by the IsPublished column
 * @method     ChildDistributionAreaQuery groupByCreated() Group by the Created column
 * @method     ChildDistributionAreaQuery groupByModified() Group by the Modified column
 * @method     ChildDistributionAreaQuery groupByLocation() Group by the Location column
 * @method     ChildDistributionAreaQuery groupByIsdeleted() Group by the IsDeleted column
 *
 * @method     ChildDistributionAreaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDistributionAreaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDistributionAreaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDistributionAreaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDistributionAreaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDistributionAreaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDistributionArea|null findOne(?ConnectionInterface $con = null) Return the first ChildDistributionArea matching the query
 * @method     ChildDistributionArea findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildDistributionArea matching the query, or a new ChildDistributionArea object populated from the query conditions when no match is found
 *
 * @method     ChildDistributionArea|null findOneById(int $Id) Return the first ChildDistributionArea filtered by the Id column
 * @method     ChildDistributionArea|null findOneByTitle(string $Title) Return the first ChildDistributionArea filtered by the Title column
 * @method     ChildDistributionArea|null findOneByDescription(string $Description) Return the first ChildDistributionArea filtered by the Description column
 * @method     ChildDistributionArea|null findOneByColor(string $Color) Return the first ChildDistributionArea filtered by the Color column
 * @method     ChildDistributionArea|null findOneByPrice(double $Price) Return the first ChildDistributionArea filtered by the Price column
 * @method     ChildDistributionArea|null findOneByMinorderprice(double $MinOrderPrice) Return the first ChildDistributionArea filtered by the MinOrderPrice column
 * @method     ChildDistributionArea|null findOneByMinorderpriceforfreeshipping(double $MinOrderPriceForFreeShipping) Return the first ChildDistributionArea filtered by the MinOrderPriceForFreeShipping column
 * @method     ChildDistributionArea|null findOneByIspublished(boolean $IsPublished) Return the first ChildDistributionArea filtered by the IsPublished column
 * @method     ChildDistributionArea|null findOneByCreated(string $Created) Return the first ChildDistributionArea filtered by the Created column
 * @method     ChildDistributionArea|null findOneByModified(string $Modified) Return the first ChildDistributionArea filtered by the Modified column
 * @method     ChildDistributionArea|null findOneByLocation(string $Location) Return the first ChildDistributionArea filtered by the Location column
 * @method     ChildDistributionArea|null findOneByIsdeleted(boolean $IsDeleted) Return the first ChildDistributionArea filtered by the IsDeleted column *

 * @method     ChildDistributionArea requirePk($key, ?ConnectionInterface $con = null) Return the ChildDistributionArea by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOne(?ConnectionInterface $con = null) Return the first ChildDistributionArea matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDistributionArea requireOneById(int $Id) Return the first ChildDistributionArea filtered by the Id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByTitle(string $Title) Return the first ChildDistributionArea filtered by the Title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByDescription(string $Description) Return the first ChildDistributionArea filtered by the Description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByColor(string $Color) Return the first ChildDistributionArea filtered by the Color column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByPrice(double $Price) Return the first ChildDistributionArea filtered by the Price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByMinorderprice(double $MinOrderPrice) Return the first ChildDistributionArea filtered by the MinOrderPrice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByMinorderpriceforfreeshipping(double $MinOrderPriceForFreeShipping) Return the first ChildDistributionArea filtered by the MinOrderPriceForFreeShipping column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByIspublished(boolean $IsPublished) Return the first ChildDistributionArea filtered by the IsPublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByCreated(string $Created) Return the first ChildDistributionArea filtered by the Created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByModified(string $Modified) Return the first ChildDistributionArea filtered by the Modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByLocation(string $Location) Return the first ChildDistributionArea filtered by the Location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDistributionArea requireOneByIsdeleted(boolean $IsDeleted) Return the first ChildDistributionArea filtered by the IsDeleted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDistributionArea[]|Collection find(?ConnectionInterface $con = null) Return ChildDistributionArea objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildDistributionArea> find(?ConnectionInterface $con = null) Return ChildDistributionArea objects based on current ModelCriteria
 * @method     ChildDistributionArea[]|Collection findById(int $Id) Return ChildDistributionArea objects filtered by the Id column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findById(int $Id) Return ChildDistributionArea objects filtered by the Id column
 * @method     ChildDistributionArea[]|Collection findByTitle(string $Title) Return ChildDistributionArea objects filtered by the Title column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByTitle(string $Title) Return ChildDistributionArea objects filtered by the Title column
 * @method     ChildDistributionArea[]|Collection findByDescription(string $Description) Return ChildDistributionArea objects filtered by the Description column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByDescription(string $Description) Return ChildDistributionArea objects filtered by the Description column
 * @method     ChildDistributionArea[]|Collection findByColor(string $Color) Return ChildDistributionArea objects filtered by the Color column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByColor(string $Color) Return ChildDistributionArea objects filtered by the Color column
 * @method     ChildDistributionArea[]|Collection findByPrice(double $Price) Return ChildDistributionArea objects filtered by the Price column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByPrice(double $Price) Return ChildDistributionArea objects filtered by the Price column
 * @method     ChildDistributionArea[]|Collection findByMinorderprice(double $MinOrderPrice) Return ChildDistributionArea objects filtered by the MinOrderPrice column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByMinorderprice(double $MinOrderPrice) Return ChildDistributionArea objects filtered by the MinOrderPrice column
 * @method     ChildDistributionArea[]|Collection findByMinorderpriceforfreeshipping(double $MinOrderPriceForFreeShipping) Return ChildDistributionArea objects filtered by the MinOrderPriceForFreeShipping column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByMinorderpriceforfreeshipping(double $MinOrderPriceForFreeShipping) Return ChildDistributionArea objects filtered by the MinOrderPriceForFreeShipping column
 * @method     ChildDistributionArea[]|Collection findByIspublished(boolean $IsPublished) Return ChildDistributionArea objects filtered by the IsPublished column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByIspublished(boolean $IsPublished) Return ChildDistributionArea objects filtered by the IsPublished column
 * @method     ChildDistributionArea[]|Collection findByCreated(string $Created) Return ChildDistributionArea objects filtered by the Created column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByCreated(string $Created) Return ChildDistributionArea objects filtered by the Created column
 * @method     ChildDistributionArea[]|Collection findByModified(string $Modified) Return ChildDistributionArea objects filtered by the Modified column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByModified(string $Modified) Return ChildDistributionArea objects filtered by the Modified column
 * @method     ChildDistributionArea[]|Collection findByLocation(string $Location) Return ChildDistributionArea objects filtered by the Location column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByLocation(string $Location) Return ChildDistributionArea objects filtered by the Location column
 * @method     ChildDistributionArea[]|Collection findByIsdeleted(boolean $IsDeleted) Return ChildDistributionArea objects filtered by the IsDeleted column
 * @psalm-method Collection&\Traversable<ChildDistributionArea> findByIsdeleted(boolean $IsDeleted) Return ChildDistributionArea objects filtered by the IsDeleted column
 * @method     ChildDistributionArea[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildDistributionArea> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DistributionAreaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\DistributionAreaQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\DistributionArea', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDistributionAreaQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDistributionAreaQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildDistributionAreaQuery) {
            return $criteria;
        }
        $query = new ChildDistributionAreaQuery();
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
     * @return ChildDistributionArea|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DistributionAreaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DistributionAreaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDistributionArea A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Id, Title, Description, Color, Price, MinOrderPrice, MinOrderPriceForFreeShipping, IsPublished, Created, Modified, Location, IsDeleted FROM distribution_area WHERE Id = :p0';
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
            /** @var ChildDistributionArea $obj */
            $obj = new ChildDistributionArea();
            $obj->hydrate($row);
            DistributionAreaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDistributionArea|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(DistributionAreaTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(DistributionAreaTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the Id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE Id = 1234
     * $query->filterById(array(12, 34)); // WHERE Id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE Id > 12
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
                $this->addUsingAlias(DistributionAreaTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the Title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE Title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE Title LIKE '%fooValue%'
     * $query->filterByTitle(['foo', 'bar']); // WHERE Title IN ('foo', 'bar')
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

        $this->addUsingAlias(DistributionAreaTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the Description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE Description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE Description LIKE '%fooValue%'
     * $query->filterByDescription(['foo', 'bar']); // WHERE Description IN ('foo', 'bar')
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

        $this->addUsingAlias(DistributionAreaTableMap::COL_DESCRIPTION, $description, $comparison);

        return $this;
    }

    /**
     * Filter the query on the Color column
     *
     * Example usage:
     * <code>
     * $query->filterByColor('fooValue');   // WHERE Color = 'fooValue'
     * $query->filterByColor('%fooValue%', Criteria::LIKE); // WHERE Color LIKE '%fooValue%'
     * $query->filterByColor(['foo', 'bar']); // WHERE Color IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $color The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByColor($color = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($color)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_COLOR, $color, $comparison);

        return $this;
    }

    /**
     * Filter the query on the Price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE Price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE Price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE Price > 12
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
                $this->addUsingAlias(DistributionAreaTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the MinOrderPrice column
     *
     * Example usage:
     * <code>
     * $query->filterByMinorderprice(1234); // WHERE MinOrderPrice = 1234
     * $query->filterByMinorderprice(array(12, 34)); // WHERE MinOrderPrice IN (12, 34)
     * $query->filterByMinorderprice(array('min' => 12)); // WHERE MinOrderPrice > 12
     * </code>
     *
     * @param mixed $minorderprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMinorderprice($minorderprice = null, ?string $comparison = null)
    {
        if (is_array($minorderprice)) {
            $useMinMax = false;
            if (isset($minorderprice['min'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_MINORDERPRICE, $minorderprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minorderprice['max'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_MINORDERPRICE, $minorderprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_MINORDERPRICE, $minorderprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the MinOrderPriceForFreeShipping column
     *
     * Example usage:
     * <code>
     * $query->filterByMinorderpriceforfreeshipping(1234); // WHERE MinOrderPriceForFreeShipping = 1234
     * $query->filterByMinorderpriceforfreeshipping(array(12, 34)); // WHERE MinOrderPriceForFreeShipping IN (12, 34)
     * $query->filterByMinorderpriceforfreeshipping(array('min' => 12)); // WHERE MinOrderPriceForFreeShipping > 12
     * </code>
     *
     * @param mixed $minorderpriceforfreeshipping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMinorderpriceforfreeshipping($minorderpriceforfreeshipping = null, ?string $comparison = null)
    {
        if (is_array($minorderpriceforfreeshipping)) {
            $useMinMax = false;
            if (isset($minorderpriceforfreeshipping['min'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING, $minorderpriceforfreeshipping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minorderpriceforfreeshipping['max'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING, $minorderpriceforfreeshipping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_MINORDERPRICEFORFREESHIPPING, $minorderpriceforfreeshipping, $comparison);

        return $this;
    }

    /**
     * Filter the query on the IsPublished column
     *
     * Example usage:
     * <code>
     * $query->filterByIspublished(true); // WHERE IsPublished = true
     * $query->filterByIspublished('yes'); // WHERE IsPublished = true
     * </code>
     *
     * @param bool|string $ispublished The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIspublished($ispublished = null, ?string $comparison = null)
    {
        if (is_string($ispublished)) {
            $ispublished = in_array(strtolower($ispublished), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_ISPUBLISHED, $ispublished, $comparison);

        return $this;
    }

    /**
     * Filter the query on the Created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE Created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE Created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE Created > '2011-03-13'
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
                $this->addUsingAlias(DistributionAreaTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_CREATED, $created, $comparison);

        return $this;
    }

    /**
     * Filter the query on the Modified column
     *
     * Example usage:
     * <code>
     * $query->filterByModified('2011-03-14'); // WHERE Modified = '2011-03-14'
     * $query->filterByModified('now'); // WHERE Modified = '2011-03-14'
     * $query->filterByModified(array('max' => 'yesterday')); // WHERE Modified > '2011-03-13'
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
                $this->addUsingAlias(DistributionAreaTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(DistributionAreaTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_MODIFIED, $modified, $comparison);

        return $this;
    }

    /**
     * Filter the query on the Location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE Location = 'fooValue'
     * $query->filterByLocation('%fooValue%', Criteria::LIKE); // WHERE Location LIKE '%fooValue%'
     * $query->filterByLocation(['foo', 'bar']); // WHERE Location IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $location The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLocation($location = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DistributionAreaTableMap::COL_LOCATION, $location, $comparison);

        return $this;
    }

    /**
     * Filter the query on the IsDeleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsdeleted(true); // WHERE IsDeleted = true
     * $query->filterByIsdeleted('yes'); // WHERE IsDeleted = true
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

        $this->addUsingAlias(DistributionAreaTableMap::COL_ISDELETED, $isdeleted, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildDistributionArea $distributionArea Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($distributionArea = null)
    {
        if ($distributionArea) {
            $this->addUsingAlias(DistributionAreaTableMap::COL_ID, $distributionArea->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the distribution_area table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DistributionAreaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DistributionAreaTableMap::clearInstancePool();
            DistributionAreaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DistributionAreaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DistributionAreaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DistributionAreaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DistributionAreaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
