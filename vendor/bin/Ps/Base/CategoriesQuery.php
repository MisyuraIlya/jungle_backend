<?php

namespace Ps\Base;

use \Exception;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Ps\Categories as ChildCategories;
use Ps\CategoriesQuery as ChildCategoriesQuery;
use Ps\Map\CategoriesTableMap;

/**
 * Base class that represents a query for the 'categories' table.
 *
 *
 *
 * @method     ChildCategoriesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCategoriesQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     ChildCategoriesQuery orderByExId($order = Criteria::ASC) Order by the ex_id column
 * @method     ChildCategoriesQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildCategoriesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildCategoriesQuery orderByInnerTitle($order = Criteria::ASC) Order by the inner_title column
 * @method     ChildCategoriesQuery orderByImg($order = Criteria::ASC) Order by the img column
 * @method     ChildCategoriesQuery orderByImgWide($order = Criteria::ASC) Order by the img_wide column
 * @method     ChildCategoriesQuery orderByOrden($order = Criteria::ASC) Order by the orden column
 * @method     ChildCategoriesQuery orderByUnpublished($order = Criteria::ASC) Order by the unpublished column
 *
 * @method     ChildCategoriesQuery groupById() Group by the id column
 * @method     ChildCategoriesQuery groupByParentId() Group by the parent_id column
 * @method     ChildCategoriesQuery groupByExId() Group by the ex_id column
 * @method     ChildCategoriesQuery groupByCode() Group by the code column
 * @method     ChildCategoriesQuery groupByTitle() Group by the title column
 * @method     ChildCategoriesQuery groupByInnerTitle() Group by the inner_title column
 * @method     ChildCategoriesQuery groupByImg() Group by the img column
 * @method     ChildCategoriesQuery groupByImgWide() Group by the img_wide column
 * @method     ChildCategoriesQuery groupByOrden() Group by the orden column
 * @method     ChildCategoriesQuery groupByUnpublished() Group by the unpublished column
 *
 * @method     ChildCategoriesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategoriesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategoriesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategoriesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCategoriesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCategoriesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCategories|null findOne(?ConnectionInterface $con = null) Return the first ChildCategories matching the query
 * @method     ChildCategories findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCategories matching the query, or a new ChildCategories object populated from the query conditions when no match is found
 *
 * @method     ChildCategories|null findOneById(int $id) Return the first ChildCategories filtered by the id column
 * @method     ChildCategories|null findOneByParentId(int $parent_id) Return the first ChildCategories filtered by the parent_id column
 * @method     ChildCategories|null findOneByExId(string $ex_id) Return the first ChildCategories filtered by the ex_id column
 * @method     ChildCategories|null findOneByCode(string $code) Return the first ChildCategories filtered by the code column
 * @method     ChildCategories|null findOneByTitle(string $title) Return the first ChildCategories filtered by the title column
 * @method     ChildCategories|null findOneByInnerTitle(string $inner_title) Return the first ChildCategories filtered by the inner_title column
 * @method     ChildCategories|null findOneByImg(string $img) Return the first ChildCategories filtered by the img column
 * @method     ChildCategories|null findOneByImgWide(string $img_wide) Return the first ChildCategories filtered by the img_wide column
 * @method     ChildCategories|null findOneByOrden(int $orden) Return the first ChildCategories filtered by the orden column
 * @method     ChildCategories|null findOneByUnpublished(int $unpublished) Return the first ChildCategories filtered by the unpublished column *

 * @method     ChildCategories requirePk($key, ?ConnectionInterface $con = null) Return the ChildCategories by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOne(?ConnectionInterface $con = null) Return the first ChildCategories matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategories requireOneById(int $id) Return the first ChildCategories filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByParentId(int $parent_id) Return the first ChildCategories filtered by the parent_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByExId(string $ex_id) Return the first ChildCategories filtered by the ex_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByCode(string $code) Return the first ChildCategories filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByTitle(string $title) Return the first ChildCategories filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByInnerTitle(string $inner_title) Return the first ChildCategories filtered by the inner_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByImg(string $img) Return the first ChildCategories filtered by the img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByImgWide(string $img_wide) Return the first ChildCategories filtered by the img_wide column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByOrden(int $orden) Return the first ChildCategories filtered by the orden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByUnpublished(int $unpublished) Return the first ChildCategories filtered by the unpublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategories[]|Collection find(?ConnectionInterface $con = null) Return ChildCategories objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCategories> find(?ConnectionInterface $con = null) Return ChildCategories objects based on current ModelCriteria
 * @method     ChildCategories[]|Collection findById(int $id) Return ChildCategories objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildCategories> findById(int $id) Return ChildCategories objects filtered by the id column
 * @method     ChildCategories[]|Collection findByParentId(int $parent_id) Return ChildCategories objects filtered by the parent_id column
 * @psalm-method Collection&\Traversable<ChildCategories> findByParentId(int $parent_id) Return ChildCategories objects filtered by the parent_id column
 * @method     ChildCategories[]|Collection findByExId(string $ex_id) Return ChildCategories objects filtered by the ex_id column
 * @psalm-method Collection&\Traversable<ChildCategories> findByExId(string $ex_id) Return ChildCategories objects filtered by the ex_id column
 * @method     ChildCategories[]|Collection findByCode(string $code) Return ChildCategories objects filtered by the code column
 * @psalm-method Collection&\Traversable<ChildCategories> findByCode(string $code) Return ChildCategories objects filtered by the code column
 * @method     ChildCategories[]|Collection findByTitle(string $title) Return ChildCategories objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildCategories> findByTitle(string $title) Return ChildCategories objects filtered by the title column
 * @method     ChildCategories[]|Collection findByInnerTitle(string $inner_title) Return ChildCategories objects filtered by the inner_title column
 * @psalm-method Collection&\Traversable<ChildCategories> findByInnerTitle(string $inner_title) Return ChildCategories objects filtered by the inner_title column
 * @method     ChildCategories[]|Collection findByImg(string $img) Return ChildCategories objects filtered by the img column
 * @psalm-method Collection&\Traversable<ChildCategories> findByImg(string $img) Return ChildCategories objects filtered by the img column
 * @method     ChildCategories[]|Collection findByImgWide(string $img_wide) Return ChildCategories objects filtered by the img_wide column
 * @psalm-method Collection&\Traversable<ChildCategories> findByImgWide(string $img_wide) Return ChildCategories objects filtered by the img_wide column
 * @method     ChildCategories[]|Collection findByOrden(int $orden) Return ChildCategories objects filtered by the orden column
 * @psalm-method Collection&\Traversable<ChildCategories> findByOrden(int $orden) Return ChildCategories objects filtered by the orden column
 * @method     ChildCategories[]|Collection findByUnpublished(int $unpublished) Return ChildCategories objects filtered by the unpublished column
 * @psalm-method Collection&\Traversable<ChildCategories> findByUnpublished(int $unpublished) Return ChildCategories objects filtered by the unpublished column
 * @method     ChildCategories[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCategories> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CategoriesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\CategoriesQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Categories', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategoriesQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategoriesQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCategoriesQuery) {
            return $criteria;
        }
        $query = new ChildCategoriesQuery();
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
     * @return ChildCategories|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        throw new LogicException('The Categories object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        throw new LogicException('The Categories object has no primary key');
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
        throw new LogicException('The Categories object has no primary key');
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
        throw new LogicException('The Categories object has no primary key');
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
                $this->addUsingAlias(CategoriesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoriesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CategoriesTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @param mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, ?string $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(CategoriesTableMap::COL_PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(CategoriesTableMap::COL_PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CategoriesTableMap::COL_PARENT_ID, $parentId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ex_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExId('fooValue');   // WHERE ex_id = 'fooValue'
     * $query->filterByExId('%fooValue%', Criteria::LIKE); // WHERE ex_id LIKE '%fooValue%'
     * $query->filterByExId(['foo', 'bar']); // WHERE ex_id IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $exId The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByExId($exId = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($exId)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CategoriesTableMap::COL_EX_ID, $exId, $comparison);

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

        $this->addUsingAlias(CategoriesTableMap::COL_CODE, $code, $comparison);

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

        $this->addUsingAlias(CategoriesTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the inner_title column
     *
     * Example usage:
     * <code>
     * $query->filterByInnerTitle('fooValue');   // WHERE inner_title = 'fooValue'
     * $query->filterByInnerTitle('%fooValue%', Criteria::LIKE); // WHERE inner_title LIKE '%fooValue%'
     * $query->filterByInnerTitle(['foo', 'bar']); // WHERE inner_title IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $innerTitle The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByInnerTitle($innerTitle = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($innerTitle)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CategoriesTableMap::COL_INNER_TITLE, $innerTitle, $comparison);

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

        $this->addUsingAlias(CategoriesTableMap::COL_IMG, $img, $comparison);

        return $this;
    }

    /**
     * Filter the query on the img_wide column
     *
     * Example usage:
     * <code>
     * $query->filterByImgWide('fooValue');   // WHERE img_wide = 'fooValue'
     * $query->filterByImgWide('%fooValue%', Criteria::LIKE); // WHERE img_wide LIKE '%fooValue%'
     * $query->filterByImgWide(['foo', 'bar']); // WHERE img_wide IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $imgWide The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByImgWide($imgWide = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imgWide)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CategoriesTableMap::COL_IMG_WIDE, $imgWide, $comparison);

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
                $this->addUsingAlias(CategoriesTableMap::COL_ORDEN, $orden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orden['max'])) {
                $this->addUsingAlias(CategoriesTableMap::COL_ORDEN, $orden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CategoriesTableMap::COL_ORDEN, $orden, $comparison);

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
                $this->addUsingAlias(CategoriesTableMap::COL_UNPUBLISHED, $unpublished['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpublished['max'])) {
                $this->addUsingAlias(CategoriesTableMap::COL_UNPUBLISHED, $unpublished['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CategoriesTableMap::COL_UNPUBLISHED, $unpublished, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCategories $categories Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($categories = null)
    {
        if ($categories) {
            throw new LogicException('Categories object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the categories table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategoriesTableMap::clearInstancePool();
            CategoriesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategoriesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CategoriesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategoriesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
