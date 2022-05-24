<?php

namespace Ps\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Ps\Products;
use Ps\ProductsQuery;


/**
 * This class defines the structure of the 'products' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ProductsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.ProductsTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'products';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Products';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Products';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 28;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 28;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'products.id';

    /**
     * the column name for the ex_id field
     */
    public const COL_EX_ID = 'products.ex_id';

    /**
     * the column name for the parent_id field
     */
    public const COL_PARENT_ID = 'products.parent_id';

    /**
     * the column name for the makat field
     */
    public const COL_MAKAT = 'products.makat';

    /**
     * the column name for the category field
     */
    public const COL_CATEGORY = 'products.category';

    /**
     * the column name for the category_id field
     */
    public const COL_CATEGORY_ID = 'products.category_id';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'products.title';

    /**
     * the column name for the barcode field
     */
    public const COL_BARCODE = 'products.barcode';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'products.price';

    /**
     * the column name for the price_ml field
     */
    public const COL_PRICE_ML = 'products.price_ml';

    /**
     * the column name for the discount field
     */
    public const COL_DISCOUNT = 'products.discount';

    /**
     * the column name for the unit field
     */
    public const COL_UNIT = 'products.unit';

    /**
     * the column name for the img field
     */
    public const COL_IMG = 'products.img';

    /**
     * the column name for the img_wide field
     */
    public const COL_IMG_WIDE = 'products.img_wide';

    /**
     * the column name for the file field
     */
    public const COL_FILE = 'products.file';

    /**
     * the column name for the desc1 field
     */
    public const COL_DESC1 = 'products.desc1';

    /**
     * the column name for the desc2 field
     */
    public const COL_DESC2 = 'products.desc2';

    /**
     * the column name for the desc3 field
     */
    public const COL_DESC3 = 'products.desc3';

    /**
     * the column name for the desc4 field
     */
    public const COL_DESC4 = 'products.desc4';

    /**
     * the column name for the desc5 field
     */
    public const COL_DESC5 = 'products.desc5';

    /**
     * the column name for the sale field
     */
    public const COL_SALE = 'products.sale';

    /**
     * the column name for the home field
     */
    public const COL_HOME = 'products.home';

    /**
     * the column name for the new_one field
     */
    public const COL_NEW_ONE = 'products.new_one';

    /**
     * the column name for the type field
     */
    public const COL_TYPE = 'products.type';

    /**
     * the column name for the volume field
     */
    public const COL_VOLUME = 'products.volume';

    /**
     * the column name for the filter_id field
     */
    public const COL_FILTER_ID = 'products.filter_id';

    /**
     * the column name for the orden field
     */
    public const COL_ORDEN = 'products.orden';

    /**
     * the column name for the unpublished field
     */
    public const COL_UNPUBLISHED = 'products.unpublished';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'ExId', 'ParentId', 'Makat', 'Category', 'CategoryId', 'Title', 'Barcode', 'Price', 'PriceMl', 'Discount', 'Unit', 'Img', 'ImgWide', 'File', 'Desc1', 'Desc2', 'Desc3', 'Desc4', 'Desc5', 'Sale', 'Home', 'NewOne', 'Type', 'Volume', 'FilterId', 'Orden', 'Unpublished', ],
        self::TYPE_CAMELNAME     => ['id', 'exId', 'parentId', 'makat', 'category', 'categoryId', 'title', 'barcode', 'price', 'priceMl', 'discount', 'unit', 'img', 'imgWide', 'file', 'desc1', 'desc2', 'desc3', 'desc4', 'desc5', 'sale', 'home', 'newOne', 'type', 'volume', 'filterId', 'orden', 'unpublished', ],
        self::TYPE_COLNAME       => [ProductsTableMap::COL_ID, ProductsTableMap::COL_EX_ID, ProductsTableMap::COL_PARENT_ID, ProductsTableMap::COL_MAKAT, ProductsTableMap::COL_CATEGORY, ProductsTableMap::COL_CATEGORY_ID, ProductsTableMap::COL_TITLE, ProductsTableMap::COL_BARCODE, ProductsTableMap::COL_PRICE, ProductsTableMap::COL_PRICE_ML, ProductsTableMap::COL_DISCOUNT, ProductsTableMap::COL_UNIT, ProductsTableMap::COL_IMG, ProductsTableMap::COL_IMG_WIDE, ProductsTableMap::COL_FILE, ProductsTableMap::COL_DESC1, ProductsTableMap::COL_DESC2, ProductsTableMap::COL_DESC3, ProductsTableMap::COL_DESC4, ProductsTableMap::COL_DESC5, ProductsTableMap::COL_SALE, ProductsTableMap::COL_HOME, ProductsTableMap::COL_NEW_ONE, ProductsTableMap::COL_TYPE, ProductsTableMap::COL_VOLUME, ProductsTableMap::COL_FILTER_ID, ProductsTableMap::COL_ORDEN, ProductsTableMap::COL_UNPUBLISHED, ],
        self::TYPE_FIELDNAME     => ['id', 'ex_id', 'parent_id', 'makat', 'category', 'category_id', 'title', 'barcode', 'price', 'price_ml', 'discount', 'unit', 'img', 'img_wide', 'file', 'desc1', 'desc2', 'desc3', 'desc4', 'desc5', 'sale', 'home', 'new_one', 'type', 'volume', 'filter_id', 'orden', 'unpublished', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'ExId' => 1, 'ParentId' => 2, 'Makat' => 3, 'Category' => 4, 'CategoryId' => 5, 'Title' => 6, 'Barcode' => 7, 'Price' => 8, 'PriceMl' => 9, 'Discount' => 10, 'Unit' => 11, 'Img' => 12, 'ImgWide' => 13, 'File' => 14, 'Desc1' => 15, 'Desc2' => 16, 'Desc3' => 17, 'Desc4' => 18, 'Desc5' => 19, 'Sale' => 20, 'Home' => 21, 'NewOne' => 22, 'Type' => 23, 'Volume' => 24, 'FilterId' => 25, 'Orden' => 26, 'Unpublished' => 27, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'exId' => 1, 'parentId' => 2, 'makat' => 3, 'category' => 4, 'categoryId' => 5, 'title' => 6, 'barcode' => 7, 'price' => 8, 'priceMl' => 9, 'discount' => 10, 'unit' => 11, 'img' => 12, 'imgWide' => 13, 'file' => 14, 'desc1' => 15, 'desc2' => 16, 'desc3' => 17, 'desc4' => 18, 'desc5' => 19, 'sale' => 20, 'home' => 21, 'newOne' => 22, 'type' => 23, 'volume' => 24, 'filterId' => 25, 'orden' => 26, 'unpublished' => 27, ],
        self::TYPE_COLNAME       => [ProductsTableMap::COL_ID => 0, ProductsTableMap::COL_EX_ID => 1, ProductsTableMap::COL_PARENT_ID => 2, ProductsTableMap::COL_MAKAT => 3, ProductsTableMap::COL_CATEGORY => 4, ProductsTableMap::COL_CATEGORY_ID => 5, ProductsTableMap::COL_TITLE => 6, ProductsTableMap::COL_BARCODE => 7, ProductsTableMap::COL_PRICE => 8, ProductsTableMap::COL_PRICE_ML => 9, ProductsTableMap::COL_DISCOUNT => 10, ProductsTableMap::COL_UNIT => 11, ProductsTableMap::COL_IMG => 12, ProductsTableMap::COL_IMG_WIDE => 13, ProductsTableMap::COL_FILE => 14, ProductsTableMap::COL_DESC1 => 15, ProductsTableMap::COL_DESC2 => 16, ProductsTableMap::COL_DESC3 => 17, ProductsTableMap::COL_DESC4 => 18, ProductsTableMap::COL_DESC5 => 19, ProductsTableMap::COL_SALE => 20, ProductsTableMap::COL_HOME => 21, ProductsTableMap::COL_NEW_ONE => 22, ProductsTableMap::COL_TYPE => 23, ProductsTableMap::COL_VOLUME => 24, ProductsTableMap::COL_FILTER_ID => 25, ProductsTableMap::COL_ORDEN => 26, ProductsTableMap::COL_UNPUBLISHED => 27, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'ex_id' => 1, 'parent_id' => 2, 'makat' => 3, 'category' => 4, 'category_id' => 5, 'title' => 6, 'barcode' => 7, 'price' => 8, 'price_ml' => 9, 'discount' => 10, 'unit' => 11, 'img' => 12, 'img_wide' => 13, 'file' => 14, 'desc1' => 15, 'desc2' => 16, 'desc3' => 17, 'desc4' => 18, 'desc5' => 19, 'sale' => 20, 'home' => 21, 'new_one' => 22, 'type' => 23, 'volume' => 24, 'filter_id' => 25, 'orden' => 26, 'unpublished' => 27, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Products.Id' => 'ID',
        'id' => 'ID',
        'products.id' => 'ID',
        'ProductsTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'ExId' => 'EX_ID',
        'Products.ExId' => 'EX_ID',
        'exId' => 'EX_ID',
        'products.exId' => 'EX_ID',
        'ProductsTableMap::COL_EX_ID' => 'EX_ID',
        'COL_EX_ID' => 'EX_ID',
        'ex_id' => 'EX_ID',
        'products.ex_id' => 'EX_ID',
        'ParentId' => 'PARENT_ID',
        'Products.ParentId' => 'PARENT_ID',
        'parentId' => 'PARENT_ID',
        'products.parentId' => 'PARENT_ID',
        'ProductsTableMap::COL_PARENT_ID' => 'PARENT_ID',
        'COL_PARENT_ID' => 'PARENT_ID',
        'parent_id' => 'PARENT_ID',
        'products.parent_id' => 'PARENT_ID',
        'Makat' => 'MAKAT',
        'Products.Makat' => 'MAKAT',
        'makat' => 'MAKAT',
        'products.makat' => 'MAKAT',
        'ProductsTableMap::COL_MAKAT' => 'MAKAT',
        'COL_MAKAT' => 'MAKAT',
        'Category' => 'CATEGORY',
        'Products.Category' => 'CATEGORY',
        'category' => 'CATEGORY',
        'products.category' => 'CATEGORY',
        'ProductsTableMap::COL_CATEGORY' => 'CATEGORY',
        'COL_CATEGORY' => 'CATEGORY',
        'CategoryId' => 'CATEGORY_ID',
        'Products.CategoryId' => 'CATEGORY_ID',
        'categoryId' => 'CATEGORY_ID',
        'products.categoryId' => 'CATEGORY_ID',
        'ProductsTableMap::COL_CATEGORY_ID' => 'CATEGORY_ID',
        'COL_CATEGORY_ID' => 'CATEGORY_ID',
        'category_id' => 'CATEGORY_ID',
        'products.category_id' => 'CATEGORY_ID',
        'Title' => 'TITLE',
        'Products.Title' => 'TITLE',
        'title' => 'TITLE',
        'products.title' => 'TITLE',
        'ProductsTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'Barcode' => 'BARCODE',
        'Products.Barcode' => 'BARCODE',
        'barcode' => 'BARCODE',
        'products.barcode' => 'BARCODE',
        'ProductsTableMap::COL_BARCODE' => 'BARCODE',
        'COL_BARCODE' => 'BARCODE',
        'Price' => 'PRICE',
        'Products.Price' => 'PRICE',
        'price' => 'PRICE',
        'products.price' => 'PRICE',
        'ProductsTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'PriceMl' => 'PRICE_ML',
        'Products.PriceMl' => 'PRICE_ML',
        'priceMl' => 'PRICE_ML',
        'products.priceMl' => 'PRICE_ML',
        'ProductsTableMap::COL_PRICE_ML' => 'PRICE_ML',
        'COL_PRICE_ML' => 'PRICE_ML',
        'price_ml' => 'PRICE_ML',
        'products.price_ml' => 'PRICE_ML',
        'Discount' => 'DISCOUNT',
        'Products.Discount' => 'DISCOUNT',
        'discount' => 'DISCOUNT',
        'products.discount' => 'DISCOUNT',
        'ProductsTableMap::COL_DISCOUNT' => 'DISCOUNT',
        'COL_DISCOUNT' => 'DISCOUNT',
        'Unit' => 'UNIT',
        'Products.Unit' => 'UNIT',
        'unit' => 'UNIT',
        'products.unit' => 'UNIT',
        'ProductsTableMap::COL_UNIT' => 'UNIT',
        'COL_UNIT' => 'UNIT',
        'Img' => 'IMG',
        'Products.Img' => 'IMG',
        'img' => 'IMG',
        'products.img' => 'IMG',
        'ProductsTableMap::COL_IMG' => 'IMG',
        'COL_IMG' => 'IMG',
        'ImgWide' => 'IMG_WIDE',
        'Products.ImgWide' => 'IMG_WIDE',
        'imgWide' => 'IMG_WIDE',
        'products.imgWide' => 'IMG_WIDE',
        'ProductsTableMap::COL_IMG_WIDE' => 'IMG_WIDE',
        'COL_IMG_WIDE' => 'IMG_WIDE',
        'img_wide' => 'IMG_WIDE',
        'products.img_wide' => 'IMG_WIDE',
        'File' => 'FILE',
        'Products.File' => 'FILE',
        'file' => 'FILE',
        'products.file' => 'FILE',
        'ProductsTableMap::COL_FILE' => 'FILE',
        'COL_FILE' => 'FILE',
        'Desc1' => 'DESC1',
        'Products.Desc1' => 'DESC1',
        'desc1' => 'DESC1',
        'products.desc1' => 'DESC1',
        'ProductsTableMap::COL_DESC1' => 'DESC1',
        'COL_DESC1' => 'DESC1',
        'Desc2' => 'DESC2',
        'Products.Desc2' => 'DESC2',
        'desc2' => 'DESC2',
        'products.desc2' => 'DESC2',
        'ProductsTableMap::COL_DESC2' => 'DESC2',
        'COL_DESC2' => 'DESC2',
        'Desc3' => 'DESC3',
        'Products.Desc3' => 'DESC3',
        'desc3' => 'DESC3',
        'products.desc3' => 'DESC3',
        'ProductsTableMap::COL_DESC3' => 'DESC3',
        'COL_DESC3' => 'DESC3',
        'Desc4' => 'DESC4',
        'Products.Desc4' => 'DESC4',
        'desc4' => 'DESC4',
        'products.desc4' => 'DESC4',
        'ProductsTableMap::COL_DESC4' => 'DESC4',
        'COL_DESC4' => 'DESC4',
        'Desc5' => 'DESC5',
        'Products.Desc5' => 'DESC5',
        'desc5' => 'DESC5',
        'products.desc5' => 'DESC5',
        'ProductsTableMap::COL_DESC5' => 'DESC5',
        'COL_DESC5' => 'DESC5',
        'Sale' => 'SALE',
        'Products.Sale' => 'SALE',
        'sale' => 'SALE',
        'products.sale' => 'SALE',
        'ProductsTableMap::COL_SALE' => 'SALE',
        'COL_SALE' => 'SALE',
        'Home' => 'HOME',
        'Products.Home' => 'HOME',
        'home' => 'HOME',
        'products.home' => 'HOME',
        'ProductsTableMap::COL_HOME' => 'HOME',
        'COL_HOME' => 'HOME',
        'NewOne' => 'NEW_ONE',
        'Products.NewOne' => 'NEW_ONE',
        'newOne' => 'NEW_ONE',
        'products.newOne' => 'NEW_ONE',
        'ProductsTableMap::COL_NEW_ONE' => 'NEW_ONE',
        'COL_NEW_ONE' => 'NEW_ONE',
        'new_one' => 'NEW_ONE',
        'products.new_one' => 'NEW_ONE',
        'Type' => 'TYPE',
        'Products.Type' => 'TYPE',
        'type' => 'TYPE',
        'products.type' => 'TYPE',
        'ProductsTableMap::COL_TYPE' => 'TYPE',
        'COL_TYPE' => 'TYPE',
        'Volume' => 'VOLUME',
        'Products.Volume' => 'VOLUME',
        'volume' => 'VOLUME',
        'products.volume' => 'VOLUME',
        'ProductsTableMap::COL_VOLUME' => 'VOLUME',
        'COL_VOLUME' => 'VOLUME',
        'FilterId' => 'FILTER_ID',
        'Products.FilterId' => 'FILTER_ID',
        'filterId' => 'FILTER_ID',
        'products.filterId' => 'FILTER_ID',
        'ProductsTableMap::COL_FILTER_ID' => 'FILTER_ID',
        'COL_FILTER_ID' => 'FILTER_ID',
        'filter_id' => 'FILTER_ID',
        'products.filter_id' => 'FILTER_ID',
        'Orden' => 'ORDEN',
        'Products.Orden' => 'ORDEN',
        'orden' => 'ORDEN',
        'products.orden' => 'ORDEN',
        'ProductsTableMap::COL_ORDEN' => 'ORDEN',
        'COL_ORDEN' => 'ORDEN',
        'Unpublished' => 'UNPUBLISHED',
        'Products.Unpublished' => 'UNPUBLISHED',
        'unpublished' => 'UNPUBLISHED',
        'products.unpublished' => 'UNPUBLISHED',
        'ProductsTableMap::COL_UNPUBLISHED' => 'UNPUBLISHED',
        'COL_UNPUBLISHED' => 'UNPUBLISHED',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('products');
        $this->setPhpName('Products');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Products');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ex_id', 'ExId', 'VARCHAR', false, 255, null);
        $this->addColumn('parent_id', 'ParentId', 'INTEGER', false, null, null);
        $this->addColumn('makat', 'Makat', 'VARCHAR', false, 100, null);
        $this->addColumn('category', 'Category', 'INTEGER', false, null, null);
        $this->addColumn('category_id', 'CategoryId', 'INTEGER', false, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('barcode', 'Barcode', 'VARCHAR', false, 100, null);
        $this->addColumn('price', 'Price', 'VARCHAR', false, 100, null);
        $this->addColumn('price_ml', 'PriceMl', 'VARCHAR', false, 100, null);
        $this->addColumn('discount', 'Discount', 'VARCHAR', false, 100, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', false, 50, null);
        $this->addColumn('img', 'Img', 'LONGVARCHAR', false, null, null);
        $this->addColumn('img_wide', 'ImgWide', 'VARCHAR', false, 255, null);
        $this->addColumn('file', 'File', 'VARCHAR', false, 255, null);
        $this->addColumn('desc1', 'Desc1', 'VARCHAR', false, 8000, null);
        $this->addColumn('desc2', 'Desc2', 'VARCHAR', false, 8000, null);
        $this->addColumn('desc3', 'Desc3', 'VARCHAR', false, 500, null);
        $this->addColumn('desc4', 'Desc4', 'VARCHAR', false, 500, null);
        $this->addColumn('desc5', 'Desc5', 'VARCHAR', false, 500, null);
        $this->addColumn('sale', 'Sale', 'INTEGER', false, null, null);
        $this->addColumn('home', 'Home', 'INTEGER', false, null, null);
        $this->addColumn('new_one', 'NewOne', 'INTEGER', false, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 255, null);
        $this->addColumn('volume', 'Volume', 'VARCHAR', false, 255, null);
        $this->addColumn('filter_id', 'FilterId', 'LONGVARCHAR', false, null, null);
        $this->addColumn('orden', 'Orden', 'INTEGER', false, null, null);
        $this->addColumn('unpublished', 'Unpublished', 'INTEGER', false, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? ProductsTableMap::CLASS_DEFAULT : ProductsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Products object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = ProductsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProductsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProductsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductsTableMap::OM_CLASS;
            /** @var Products $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProductsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ProductsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProductsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Products $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProductsTableMap::COL_ID);
            $criteria->addSelectColumn(ProductsTableMap::COL_EX_ID);
            $criteria->addSelectColumn(ProductsTableMap::COL_PARENT_ID);
            $criteria->addSelectColumn(ProductsTableMap::COL_MAKAT);
            $criteria->addSelectColumn(ProductsTableMap::COL_CATEGORY);
            $criteria->addSelectColumn(ProductsTableMap::COL_CATEGORY_ID);
            $criteria->addSelectColumn(ProductsTableMap::COL_TITLE);
            $criteria->addSelectColumn(ProductsTableMap::COL_BARCODE);
            $criteria->addSelectColumn(ProductsTableMap::COL_PRICE);
            $criteria->addSelectColumn(ProductsTableMap::COL_PRICE_ML);
            $criteria->addSelectColumn(ProductsTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(ProductsTableMap::COL_UNIT);
            $criteria->addSelectColumn(ProductsTableMap::COL_IMG);
            $criteria->addSelectColumn(ProductsTableMap::COL_IMG_WIDE);
            $criteria->addSelectColumn(ProductsTableMap::COL_FILE);
            $criteria->addSelectColumn(ProductsTableMap::COL_DESC1);
            $criteria->addSelectColumn(ProductsTableMap::COL_DESC2);
            $criteria->addSelectColumn(ProductsTableMap::COL_DESC3);
            $criteria->addSelectColumn(ProductsTableMap::COL_DESC4);
            $criteria->addSelectColumn(ProductsTableMap::COL_DESC5);
            $criteria->addSelectColumn(ProductsTableMap::COL_SALE);
            $criteria->addSelectColumn(ProductsTableMap::COL_HOME);
            $criteria->addSelectColumn(ProductsTableMap::COL_NEW_ONE);
            $criteria->addSelectColumn(ProductsTableMap::COL_TYPE);
            $criteria->addSelectColumn(ProductsTableMap::COL_VOLUME);
            $criteria->addSelectColumn(ProductsTableMap::COL_FILTER_ID);
            $criteria->addSelectColumn(ProductsTableMap::COL_ORDEN);
            $criteria->addSelectColumn(ProductsTableMap::COL_UNPUBLISHED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ex_id');
            $criteria->addSelectColumn($alias . '.parent_id');
            $criteria->addSelectColumn($alias . '.makat');
            $criteria->addSelectColumn($alias . '.category');
            $criteria->addSelectColumn($alias . '.category_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.barcode');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.price_ml');
            $criteria->addSelectColumn($alias . '.discount');
            $criteria->addSelectColumn($alias . '.unit');
            $criteria->addSelectColumn($alias . '.img');
            $criteria->addSelectColumn($alias . '.img_wide');
            $criteria->addSelectColumn($alias . '.file');
            $criteria->addSelectColumn($alias . '.desc1');
            $criteria->addSelectColumn($alias . '.desc2');
            $criteria->addSelectColumn($alias . '.desc3');
            $criteria->addSelectColumn($alias . '.desc4');
            $criteria->addSelectColumn($alias . '.desc5');
            $criteria->addSelectColumn($alias . '.sale');
            $criteria->addSelectColumn($alias . '.home');
            $criteria->addSelectColumn($alias . '.new_one');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.volume');
            $criteria->addSelectColumn($alias . '.filter_id');
            $criteria->addSelectColumn($alias . '.orden');
            $criteria->addSelectColumn($alias . '.unpublished');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(ProductsTableMap::COL_ID);
            $criteria->removeSelectColumn(ProductsTableMap::COL_EX_ID);
            $criteria->removeSelectColumn(ProductsTableMap::COL_PARENT_ID);
            $criteria->removeSelectColumn(ProductsTableMap::COL_MAKAT);
            $criteria->removeSelectColumn(ProductsTableMap::COL_CATEGORY);
            $criteria->removeSelectColumn(ProductsTableMap::COL_CATEGORY_ID);
            $criteria->removeSelectColumn(ProductsTableMap::COL_TITLE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_BARCODE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_PRICE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_PRICE_ML);
            $criteria->removeSelectColumn(ProductsTableMap::COL_DISCOUNT);
            $criteria->removeSelectColumn(ProductsTableMap::COL_UNIT);
            $criteria->removeSelectColumn(ProductsTableMap::COL_IMG);
            $criteria->removeSelectColumn(ProductsTableMap::COL_IMG_WIDE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_FILE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_DESC1);
            $criteria->removeSelectColumn(ProductsTableMap::COL_DESC2);
            $criteria->removeSelectColumn(ProductsTableMap::COL_DESC3);
            $criteria->removeSelectColumn(ProductsTableMap::COL_DESC4);
            $criteria->removeSelectColumn(ProductsTableMap::COL_DESC5);
            $criteria->removeSelectColumn(ProductsTableMap::COL_SALE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_HOME);
            $criteria->removeSelectColumn(ProductsTableMap::COL_NEW_ONE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_TYPE);
            $criteria->removeSelectColumn(ProductsTableMap::COL_VOLUME);
            $criteria->removeSelectColumn(ProductsTableMap::COL_FILTER_ID);
            $criteria->removeSelectColumn(ProductsTableMap::COL_ORDEN);
            $criteria->removeSelectColumn(ProductsTableMap::COL_UNPUBLISHED);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.ex_id');
            $criteria->removeSelectColumn($alias . '.parent_id');
            $criteria->removeSelectColumn($alias . '.makat');
            $criteria->removeSelectColumn($alias . '.category');
            $criteria->removeSelectColumn($alias . '.category_id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.barcode');
            $criteria->removeSelectColumn($alias . '.price');
            $criteria->removeSelectColumn($alias . '.price_ml');
            $criteria->removeSelectColumn($alias . '.discount');
            $criteria->removeSelectColumn($alias . '.unit');
            $criteria->removeSelectColumn($alias . '.img');
            $criteria->removeSelectColumn($alias . '.img_wide');
            $criteria->removeSelectColumn($alias . '.file');
            $criteria->removeSelectColumn($alias . '.desc1');
            $criteria->removeSelectColumn($alias . '.desc2');
            $criteria->removeSelectColumn($alias . '.desc3');
            $criteria->removeSelectColumn($alias . '.desc4');
            $criteria->removeSelectColumn($alias . '.desc5');
            $criteria->removeSelectColumn($alias . '.sale');
            $criteria->removeSelectColumn($alias . '.home');
            $criteria->removeSelectColumn($alias . '.new_one');
            $criteria->removeSelectColumn($alias . '.type');
            $criteria->removeSelectColumn($alias . '.volume');
            $criteria->removeSelectColumn($alias . '.filter_id');
            $criteria->removeSelectColumn($alias . '.orden');
            $criteria->removeSelectColumn($alias . '.unpublished');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(ProductsTableMap::DATABASE_NAME)->getTable(ProductsTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Products or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Products object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Products) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductsTableMap::DATABASE_NAME);
            $criteria->add(ProductsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ProductsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProductsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProductsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return ProductsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Products or Criteria object.
     *
     * @param mixed $criteria Criteria or Products object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Products object
        }

        if ($criteria->containsKey(ProductsTableMap::COL_ID) && $criteria->keyContainsValue(ProductsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ProductsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
