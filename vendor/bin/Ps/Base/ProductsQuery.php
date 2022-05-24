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
use Ps\Products as ChildProducts;
use Ps\ProductsQuery as ChildProductsQuery;
use Ps\Map\ProductsTableMap;

/**
 * Base class that represents a query for the 'products' table.
 *
 *
 *
 * @method     ChildProductsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildProductsQuery orderByExId($order = Criteria::ASC) Order by the ex_id column
 * @method     ChildProductsQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     ChildProductsQuery orderByMakat($order = Criteria::ASC) Order by the makat column
 * @method     ChildProductsQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     ChildProductsQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildProductsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildProductsQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method     ChildProductsQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildProductsQuery orderByPriceMl($order = Criteria::ASC) Order by the price_ml column
 * @method     ChildProductsQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildProductsQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildProductsQuery orderByImg($order = Criteria::ASC) Order by the img column
 * @method     ChildProductsQuery orderByImgWide($order = Criteria::ASC) Order by the img_wide column
 * @method     ChildProductsQuery orderByFile($order = Criteria::ASC) Order by the file column
 * @method     ChildProductsQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildProductsQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildProductsQuery orderByDesc3($order = Criteria::ASC) Order by the desc3 column
 * @method     ChildProductsQuery orderByDesc4($order = Criteria::ASC) Order by the desc4 column
 * @method     ChildProductsQuery orderByDesc5($order = Criteria::ASC) Order by the desc5 column
 * @method     ChildProductsQuery orderBySale($order = Criteria::ASC) Order by the sale column
 * @method     ChildProductsQuery orderByHome($order = Criteria::ASC) Order by the home column
 * @method     ChildProductsQuery orderByNewOne($order = Criteria::ASC) Order by the new_one column
 * @method     ChildProductsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildProductsQuery orderByVolume($order = Criteria::ASC) Order by the volume column
 * @method     ChildProductsQuery orderByFilterId($order = Criteria::ASC) Order by the filter_id column
 * @method     ChildProductsQuery orderByOrden($order = Criteria::ASC) Order by the orden column
 * @method     ChildProductsQuery orderByUnpublished($order = Criteria::ASC) Order by the unpublished column
 *
 * @method     ChildProductsQuery groupById() Group by the id column
 * @method     ChildProductsQuery groupByExId() Group by the ex_id column
 * @method     ChildProductsQuery groupByParentId() Group by the parent_id column
 * @method     ChildProductsQuery groupByMakat() Group by the makat column
 * @method     ChildProductsQuery groupByCategory() Group by the category column
 * @method     ChildProductsQuery groupByCategoryId() Group by the category_id column
 * @method     ChildProductsQuery groupByTitle() Group by the title column
 * @method     ChildProductsQuery groupByBarcode() Group by the barcode column
 * @method     ChildProductsQuery groupByPrice() Group by the price column
 * @method     ChildProductsQuery groupByPriceMl() Group by the price_ml column
 * @method     ChildProductsQuery groupByDiscount() Group by the discount column
 * @method     ChildProductsQuery groupByUnit() Group by the unit column
 * @method     ChildProductsQuery groupByImg() Group by the img column
 * @method     ChildProductsQuery groupByImgWide() Group by the img_wide column
 * @method     ChildProductsQuery groupByFile() Group by the file column
 * @method     ChildProductsQuery groupByDesc1() Group by the desc1 column
 * @method     ChildProductsQuery groupByDesc2() Group by the desc2 column
 * @method     ChildProductsQuery groupByDesc3() Group by the desc3 column
 * @method     ChildProductsQuery groupByDesc4() Group by the desc4 column
 * @method     ChildProductsQuery groupByDesc5() Group by the desc5 column
 * @method     ChildProductsQuery groupBySale() Group by the sale column
 * @method     ChildProductsQuery groupByHome() Group by the home column
 * @method     ChildProductsQuery groupByNewOne() Group by the new_one column
 * @method     ChildProductsQuery groupByType() Group by the type column
 * @method     ChildProductsQuery groupByVolume() Group by the volume column
 * @method     ChildProductsQuery groupByFilterId() Group by the filter_id column
 * @method     ChildProductsQuery groupByOrden() Group by the orden column
 * @method     ChildProductsQuery groupByUnpublished() Group by the unpublished column
 *
 * @method     ChildProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProductsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProductsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProducts|null findOne(?ConnectionInterface $con = null) Return the first ChildProducts matching the query
 * @method     ChildProducts findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildProducts matching the query, or a new ChildProducts object populated from the query conditions when no match is found
 *
 * @method     ChildProducts|null findOneById(int $id) Return the first ChildProducts filtered by the id column
 * @method     ChildProducts|null findOneByExId(string $ex_id) Return the first ChildProducts filtered by the ex_id column
 * @method     ChildProducts|null findOneByParentId(int $parent_id) Return the first ChildProducts filtered by the parent_id column
 * @method     ChildProducts|null findOneByMakat(string $makat) Return the first ChildProducts filtered by the makat column
 * @method     ChildProducts|null findOneByCategory(int $category) Return the first ChildProducts filtered by the category column
 * @method     ChildProducts|null findOneByCategoryId(int $category_id) Return the first ChildProducts filtered by the category_id column
 * @method     ChildProducts|null findOneByTitle(string $title) Return the first ChildProducts filtered by the title column
 * @method     ChildProducts|null findOneByBarcode(string $barcode) Return the first ChildProducts filtered by the barcode column
 * @method     ChildProducts|null findOneByPrice(string $price) Return the first ChildProducts filtered by the price column
 * @method     ChildProducts|null findOneByPriceMl(string $price_ml) Return the first ChildProducts filtered by the price_ml column
 * @method     ChildProducts|null findOneByDiscount(string $discount) Return the first ChildProducts filtered by the discount column
 * @method     ChildProducts|null findOneByUnit(string $unit) Return the first ChildProducts filtered by the unit column
 * @method     ChildProducts|null findOneByImg(string $img) Return the first ChildProducts filtered by the img column
 * @method     ChildProducts|null findOneByImgWide(string $img_wide) Return the first ChildProducts filtered by the img_wide column
 * @method     ChildProducts|null findOneByFile(string $file) Return the first ChildProducts filtered by the file column
 * @method     ChildProducts|null findOneByDesc1(string $desc1) Return the first ChildProducts filtered by the desc1 column
 * @method     ChildProducts|null findOneByDesc2(string $desc2) Return the first ChildProducts filtered by the desc2 column
 * @method     ChildProducts|null findOneByDesc3(string $desc3) Return the first ChildProducts filtered by the desc3 column
 * @method     ChildProducts|null findOneByDesc4(string $desc4) Return the first ChildProducts filtered by the desc4 column
 * @method     ChildProducts|null findOneByDesc5(string $desc5) Return the first ChildProducts filtered by the desc5 column
 * @method     ChildProducts|null findOneBySale(int $sale) Return the first ChildProducts filtered by the sale column
 * @method     ChildProducts|null findOneByHome(int $home) Return the first ChildProducts filtered by the home column
 * @method     ChildProducts|null findOneByNewOne(int $new_one) Return the first ChildProducts filtered by the new_one column
 * @method     ChildProducts|null findOneByType(string $type) Return the first ChildProducts filtered by the type column
 * @method     ChildProducts|null findOneByVolume(string $volume) Return the first ChildProducts filtered by the volume column
 * @method     ChildProducts|null findOneByFilterId(string $filter_id) Return the first ChildProducts filtered by the filter_id column
 * @method     ChildProducts|null findOneByOrden(int $orden) Return the first ChildProducts filtered by the orden column
 * @method     ChildProducts|null findOneByUnpublished(int $unpublished) Return the first ChildProducts filtered by the unpublished column *

 * @method     ChildProducts requirePk($key, ?ConnectionInterface $con = null) Return the ChildProducts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOne(?ConnectionInterface $con = null) Return the first ChildProducts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProducts requireOneById(int $id) Return the first ChildProducts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByExId(string $ex_id) Return the first ChildProducts filtered by the ex_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByParentId(int $parent_id) Return the first ChildProducts filtered by the parent_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByMakat(string $makat) Return the first ChildProducts filtered by the makat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByCategory(int $category) Return the first ChildProducts filtered by the category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByCategoryId(int $category_id) Return the first ChildProducts filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByTitle(string $title) Return the first ChildProducts filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByBarcode(string $barcode) Return the first ChildProducts filtered by the barcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByPrice(string $price) Return the first ChildProducts filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByPriceMl(string $price_ml) Return the first ChildProducts filtered by the price_ml column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByDiscount(string $discount) Return the first ChildProducts filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByUnit(string $unit) Return the first ChildProducts filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByImg(string $img) Return the first ChildProducts filtered by the img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByImgWide(string $img_wide) Return the first ChildProducts filtered by the img_wide column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByFile(string $file) Return the first ChildProducts filtered by the file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByDesc1(string $desc1) Return the first ChildProducts filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByDesc2(string $desc2) Return the first ChildProducts filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByDesc3(string $desc3) Return the first ChildProducts filtered by the desc3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByDesc4(string $desc4) Return the first ChildProducts filtered by the desc4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByDesc5(string $desc5) Return the first ChildProducts filtered by the desc5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneBySale(int $sale) Return the first ChildProducts filtered by the sale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByHome(int $home) Return the first ChildProducts filtered by the home column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByNewOne(int $new_one) Return the first ChildProducts filtered by the new_one column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByType(string $type) Return the first ChildProducts filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByVolume(string $volume) Return the first ChildProducts filtered by the volume column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByFilterId(string $filter_id) Return the first ChildProducts filtered by the filter_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByOrden(int $orden) Return the first ChildProducts filtered by the orden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProducts requireOneByUnpublished(int $unpublished) Return the first ChildProducts filtered by the unpublished column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProducts[]|Collection find(?ConnectionInterface $con = null) Return ChildProducts objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildProducts> find(?ConnectionInterface $con = null) Return ChildProducts objects based on current ModelCriteria
 * @method     ChildProducts[]|Collection findById(int $id) Return ChildProducts objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildProducts> findById(int $id) Return ChildProducts objects filtered by the id column
 * @method     ChildProducts[]|Collection findByExId(string $ex_id) Return ChildProducts objects filtered by the ex_id column
 * @psalm-method Collection&\Traversable<ChildProducts> findByExId(string $ex_id) Return ChildProducts objects filtered by the ex_id column
 * @method     ChildProducts[]|Collection findByParentId(int $parent_id) Return ChildProducts objects filtered by the parent_id column
 * @psalm-method Collection&\Traversable<ChildProducts> findByParentId(int $parent_id) Return ChildProducts objects filtered by the parent_id column
 * @method     ChildProducts[]|Collection findByMakat(string $makat) Return ChildProducts objects filtered by the makat column
 * @psalm-method Collection&\Traversable<ChildProducts> findByMakat(string $makat) Return ChildProducts objects filtered by the makat column
 * @method     ChildProducts[]|Collection findByCategory(int $category) Return ChildProducts objects filtered by the category column
 * @psalm-method Collection&\Traversable<ChildProducts> findByCategory(int $category) Return ChildProducts objects filtered by the category column
 * @method     ChildProducts[]|Collection findByCategoryId(int $category_id) Return ChildProducts objects filtered by the category_id column
 * @psalm-method Collection&\Traversable<ChildProducts> findByCategoryId(int $category_id) Return ChildProducts objects filtered by the category_id column
 * @method     ChildProducts[]|Collection findByTitle(string $title) Return ChildProducts objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildProducts> findByTitle(string $title) Return ChildProducts objects filtered by the title column
 * @method     ChildProducts[]|Collection findByBarcode(string $barcode) Return ChildProducts objects filtered by the barcode column
 * @psalm-method Collection&\Traversable<ChildProducts> findByBarcode(string $barcode) Return ChildProducts objects filtered by the barcode column
 * @method     ChildProducts[]|Collection findByPrice(string $price) Return ChildProducts objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildProducts> findByPrice(string $price) Return ChildProducts objects filtered by the price column
 * @method     ChildProducts[]|Collection findByPriceMl(string $price_ml) Return ChildProducts objects filtered by the price_ml column
 * @psalm-method Collection&\Traversable<ChildProducts> findByPriceMl(string $price_ml) Return ChildProducts objects filtered by the price_ml column
 * @method     ChildProducts[]|Collection findByDiscount(string $discount) Return ChildProducts objects filtered by the discount column
 * @psalm-method Collection&\Traversable<ChildProducts> findByDiscount(string $discount) Return ChildProducts objects filtered by the discount column
 * @method     ChildProducts[]|Collection findByUnit(string $unit) Return ChildProducts objects filtered by the unit column
 * @psalm-method Collection&\Traversable<ChildProducts> findByUnit(string $unit) Return ChildProducts objects filtered by the unit column
 * @method     ChildProducts[]|Collection findByImg(string $img) Return ChildProducts objects filtered by the img column
 * @psalm-method Collection&\Traversable<ChildProducts> findByImg(string $img) Return ChildProducts objects filtered by the img column
 * @method     ChildProducts[]|Collection findByImgWide(string $img_wide) Return ChildProducts objects filtered by the img_wide column
 * @psalm-method Collection&\Traversable<ChildProducts> findByImgWide(string $img_wide) Return ChildProducts objects filtered by the img_wide column
 * @method     ChildProducts[]|Collection findByFile(string $file) Return ChildProducts objects filtered by the file column
 * @psalm-method Collection&\Traversable<ChildProducts> findByFile(string $file) Return ChildProducts objects filtered by the file column
 * @method     ChildProducts[]|Collection findByDesc1(string $desc1) Return ChildProducts objects filtered by the desc1 column
 * @psalm-method Collection&\Traversable<ChildProducts> findByDesc1(string $desc1) Return ChildProducts objects filtered by the desc1 column
 * @method     ChildProducts[]|Collection findByDesc2(string $desc2) Return ChildProducts objects filtered by the desc2 column
 * @psalm-method Collection&\Traversable<ChildProducts> findByDesc2(string $desc2) Return ChildProducts objects filtered by the desc2 column
 * @method     ChildProducts[]|Collection findByDesc3(string $desc3) Return ChildProducts objects filtered by the desc3 column
 * @psalm-method Collection&\Traversable<ChildProducts> findByDesc3(string $desc3) Return ChildProducts objects filtered by the desc3 column
 * @method     ChildProducts[]|Collection findByDesc4(string $desc4) Return ChildProducts objects filtered by the desc4 column
 * @psalm-method Collection&\Traversable<ChildProducts> findByDesc4(string $desc4) Return ChildProducts objects filtered by the desc4 column
 * @method     ChildProducts[]|Collection findByDesc5(string $desc5) Return ChildProducts objects filtered by the desc5 column
 * @psalm-method Collection&\Traversable<ChildProducts> findByDesc5(string $desc5) Return ChildProducts objects filtered by the desc5 column
 * @method     ChildProducts[]|Collection findBySale(int $sale) Return ChildProducts objects filtered by the sale column
 * @psalm-method Collection&\Traversable<ChildProducts> findBySale(int $sale) Return ChildProducts objects filtered by the sale column
 * @method     ChildProducts[]|Collection findByHome(int $home) Return ChildProducts objects filtered by the home column
 * @psalm-method Collection&\Traversable<ChildProducts> findByHome(int $home) Return ChildProducts objects filtered by the home column
 * @method     ChildProducts[]|Collection findByNewOne(int $new_one) Return ChildProducts objects filtered by the new_one column
 * @psalm-method Collection&\Traversable<ChildProducts> findByNewOne(int $new_one) Return ChildProducts objects filtered by the new_one column
 * @method     ChildProducts[]|Collection findByType(string $type) Return ChildProducts objects filtered by the type column
 * @psalm-method Collection&\Traversable<ChildProducts> findByType(string $type) Return ChildProducts objects filtered by the type column
 * @method     ChildProducts[]|Collection findByVolume(string $volume) Return ChildProducts objects filtered by the volume column
 * @psalm-method Collection&\Traversable<ChildProducts> findByVolume(string $volume) Return ChildProducts objects filtered by the volume column
 * @method     ChildProducts[]|Collection findByFilterId(string $filter_id) Return ChildProducts objects filtered by the filter_id column
 * @psalm-method Collection&\Traversable<ChildProducts> findByFilterId(string $filter_id) Return ChildProducts objects filtered by the filter_id column
 * @method     ChildProducts[]|Collection findByOrden(int $orden) Return ChildProducts objects filtered by the orden column
 * @psalm-method Collection&\Traversable<ChildProducts> findByOrden(int $orden) Return ChildProducts objects filtered by the orden column
 * @method     ChildProducts[]|Collection findByUnpublished(int $unpublished) Return ChildProducts objects filtered by the unpublished column
 * @psalm-method Collection&\Traversable<ChildProducts> findByUnpublished(int $unpublished) Return ChildProducts objects filtered by the unpublished column
 * @method     ChildProducts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildProducts> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProductsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Ps\Base\ProductsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Ps\\Products', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProductsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProductsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildProductsQuery) {
            return $criteria;
        }
        $query = new ChildProductsQuery();
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
     * @return ChildProducts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProductsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProductsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProducts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ex_id, parent_id, makat, category, category_id, title, barcode, price, price_ml, discount, unit, img, img_wide, file, desc1, desc2, desc3, desc4, desc5, sale, home, new_one, type, volume, filter_id, orden, unpublished FROM products WHERE id = :p0';
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
            /** @var ChildProducts $obj */
            $obj = new ChildProducts();
            $obj->hydrate($row);
            ProductsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProducts|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(ProductsTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(ProductsTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(ProductsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_ID, $id, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_EX_ID, $exId, $comparison);

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
                $this->addUsingAlias(ProductsTableMap::COL_PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_PARENT_ID, $parentId, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_MAKAT, $makat, $comparison);

        return $this;
    }

    /**
     * Filter the query on the category column
     *
     * Example usage:
     * <code>
     * $query->filterByCategory(1234); // WHERE category = 1234
     * $query->filterByCategory(array(12, 34)); // WHERE category IN (12, 34)
     * $query->filterByCategory(array('min' => 12)); // WHERE category > 12
     * </code>
     *
     * @param mixed $category The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCategory($category = null, ?string $comparison = null)
    {
        if (is_array($category)) {
            $useMinMax = false;
            if (isset($category['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_CATEGORY, $category['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($category['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_CATEGORY, $category['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_CATEGORY, $category, $comparison);

        return $this;
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @param mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, ?string $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_CATEGORY_ID, $categoryId, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_TITLE, $title, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_BARCODE, $barcode, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price_ml column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceMl('fooValue');   // WHERE price_ml = 'fooValue'
     * $query->filterByPriceMl('%fooValue%', Criteria::LIKE); // WHERE price_ml LIKE '%fooValue%'
     * $query->filterByPriceMl(['foo', 'bar']); // WHERE price_ml IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $priceMl The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPriceMl($priceMl = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($priceMl)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_PRICE_ML, $priceMl, $comparison);

        return $this;
    }

    /**
     * Filter the query on the discount column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscount('fooValue');   // WHERE discount = 'fooValue'
     * $query->filterByDiscount('%fooValue%', Criteria::LIKE); // WHERE discount LIKE '%fooValue%'
     * $query->filterByDiscount(['foo', 'bar']); // WHERE discount IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $discount The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discount)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_DISCOUNT, $discount, $comparison);

        return $this;
    }

    /**
     * Filter the query on the unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUnit('fooValue');   // WHERE unit = 'fooValue'
     * $query->filterByUnit('%fooValue%', Criteria::LIKE); // WHERE unit LIKE '%fooValue%'
     * $query->filterByUnit(['foo', 'bar']); // WHERE unit IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $unit The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUnit($unit = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_UNIT, $unit, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_IMG, $img, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_IMG_WIDE, $imgWide, $comparison);

        return $this;
    }

    /**
     * Filter the query on the file column
     *
     * Example usage:
     * <code>
     * $query->filterByFile('fooValue');   // WHERE file = 'fooValue'
     * $query->filterByFile('%fooValue%', Criteria::LIKE); // WHERE file LIKE '%fooValue%'
     * $query->filterByFile(['foo', 'bar']); // WHERE file IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $file The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFile($file = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($file)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_FILE, $file, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc1('fooValue');   // WHERE desc1 = 'fooValue'
     * $query->filterByDesc1('%fooValue%', Criteria::LIKE); // WHERE desc1 LIKE '%fooValue%'
     * $query->filterByDesc1(['foo', 'bar']); // WHERE desc1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_DESC1, $desc1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc2('fooValue');   // WHERE desc2 = 'fooValue'
     * $query->filterByDesc2('%fooValue%', Criteria::LIKE); // WHERE desc2 LIKE '%fooValue%'
     * $query->filterByDesc2(['foo', 'bar']); // WHERE desc2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_DESC2, $desc2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc3 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc3('fooValue');   // WHERE desc3 = 'fooValue'
     * $query->filterByDesc3('%fooValue%', Criteria::LIKE); // WHERE desc3 LIKE '%fooValue%'
     * $query->filterByDesc3(['foo', 'bar']); // WHERE desc3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc3($desc3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_DESC3, $desc3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc4 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc4('fooValue');   // WHERE desc4 = 'fooValue'
     * $query->filterByDesc4('%fooValue%', Criteria::LIKE); // WHERE desc4 LIKE '%fooValue%'
     * $query->filterByDesc4(['foo', 'bar']); // WHERE desc4 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc4 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc4($desc4 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc4)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_DESC4, $desc4, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc5 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc5('fooValue');   // WHERE desc5 = 'fooValue'
     * $query->filterByDesc5('%fooValue%', Criteria::LIKE); // WHERE desc5 LIKE '%fooValue%'
     * $query->filterByDesc5(['foo', 'bar']); // WHERE desc5 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc5 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc5($desc5 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc5)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_DESC5, $desc5, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sale column
     *
     * Example usage:
     * <code>
     * $query->filterBySale(1234); // WHERE sale = 1234
     * $query->filterBySale(array(12, 34)); // WHERE sale IN (12, 34)
     * $query->filterBySale(array('min' => 12)); // WHERE sale > 12
     * </code>
     *
     * @param mixed $sale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySale($sale = null, ?string $comparison = null)
    {
        if (is_array($sale)) {
            $useMinMax = false;
            if (isset($sale['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_SALE, $sale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sale['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_SALE, $sale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_SALE, $sale, $comparison);

        return $this;
    }

    /**
     * Filter the query on the home column
     *
     * Example usage:
     * <code>
     * $query->filterByHome(1234); // WHERE home = 1234
     * $query->filterByHome(array(12, 34)); // WHERE home IN (12, 34)
     * $query->filterByHome(array('min' => 12)); // WHERE home > 12
     * </code>
     *
     * @param mixed $home The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHome($home = null, ?string $comparison = null)
    {
        if (is_array($home)) {
            $useMinMax = false;
            if (isset($home['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_HOME, $home['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($home['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_HOME, $home['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_HOME, $home, $comparison);

        return $this;
    }

    /**
     * Filter the query on the new_one column
     *
     * Example usage:
     * <code>
     * $query->filterByNewOne(1234); // WHERE new_one = 1234
     * $query->filterByNewOne(array(12, 34)); // WHERE new_one IN (12, 34)
     * $query->filterByNewOne(array('min' => 12)); // WHERE new_one > 12
     * </code>
     *
     * @param mixed $newOne The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNewOne($newOne = null, ?string $comparison = null)
    {
        if (is_array($newOne)) {
            $useMinMax = false;
            if (isset($newOne['min'])) {
                $this->addUsingAlias(ProductsTableMap::COL_NEW_ONE, $newOne['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newOne['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_NEW_ONE, $newOne['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_NEW_ONE, $newOne, $comparison);

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

        $this->addUsingAlias(ProductsTableMap::COL_TYPE, $type, $comparison);

        return $this;
    }

    /**
     * Filter the query on the volume column
     *
     * Example usage:
     * <code>
     * $query->filterByVolume('fooValue');   // WHERE volume = 'fooValue'
     * $query->filterByVolume('%fooValue%', Criteria::LIKE); // WHERE volume LIKE '%fooValue%'
     * $query->filterByVolume(['foo', 'bar']); // WHERE volume IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $volume The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVolume($volume = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($volume)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_VOLUME, $volume, $comparison);

        return $this;
    }

    /**
     * Filter the query on the filter_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFilterId('fooValue');   // WHERE filter_id = 'fooValue'
     * $query->filterByFilterId('%fooValue%', Criteria::LIKE); // WHERE filter_id LIKE '%fooValue%'
     * $query->filterByFilterId(['foo', 'bar']); // WHERE filter_id IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $filterId The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFilterId($filterId = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filterId)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_FILTER_ID, $filterId, $comparison);

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
                $this->addUsingAlias(ProductsTableMap::COL_ORDEN, $orden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orden['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_ORDEN, $orden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_ORDEN, $orden, $comparison);

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
                $this->addUsingAlias(ProductsTableMap::COL_UNPUBLISHED, $unpublished['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unpublished['max'])) {
                $this->addUsingAlias(ProductsTableMap::COL_UNPUBLISHED, $unpublished['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductsTableMap::COL_UNPUBLISHED, $unpublished, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildProducts $products Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($products = null)
    {
        if ($products) {
            $this->addUsingAlias(ProductsTableMap::COL_ID, $products->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductsTableMap::clearInstancePool();
            ProductsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProductsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProductsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProductsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
