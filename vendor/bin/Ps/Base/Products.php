<?php

namespace Ps\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Ps\ProductsQuery as ChildProductsQuery;
use Ps\Map\ProductsTableMap;

/**
 * Base class that represents a row from the 'products' table.
 *
 *
 *
 * @package    propel.generator.Ps.Base
 */
abstract class Products implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Ps\\Map\\ProductsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var bool
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var bool
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = [];

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = [];

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the ex_id field.
     *
     * @var        string|null
     */
    protected $ex_id;

    /**
     * The value for the parent_id field.
     *
     * @var        int|null
     */
    protected $parent_id;

    /**
     * The value for the makat field.
     *
     * @var        string|null
     */
    protected $makat;

    /**
     * The value for the category field.
     *
     * @var        int|null
     */
    protected $category;

    /**
     * The value for the category_id field.
     *
     * @var        int|null
     */
    protected $category_id;

    /**
     * The value for the title field.
     *
     * @var        string|null
     */
    protected $title;

    /**
     * The value for the barcode field.
     *
     * @var        string|null
     */
    protected $barcode;

    /**
     * The value for the price field.
     *
     * @var        string|null
     */
    protected $price;

    /**
     * The value for the price_ml field.
     *
     * @var        string|null
     */
    protected $price_ml;

    /**
     * The value for the discount field.
     *
     * @var        string|null
     */
    protected $discount;

    /**
     * The value for the unit field.
     *
     * @var        string|null
     */
    protected $unit;

    /**
     * The value for the img field.
     *
     * @var        string|null
     */
    protected $img;

    /**
     * The value for the img_wide field.
     *
     * @var        string|null
     */
    protected $img_wide;

    /**
     * The value for the file field.
     *
     * @var        string|null
     */
    protected $file;

    /**
     * The value for the desc1 field.
     *
     * @var        string|null
     */
    protected $desc1;

    /**
     * The value for the desc2 field.
     *
     * @var        string|null
     */
    protected $desc2;

    /**
     * The value for the desc3 field.
     *
     * @var        string|null
     */
    protected $desc3;

    /**
     * The value for the desc4 field.
     *
     * @var        string|null
     */
    protected $desc4;

    /**
     * The value for the desc5 field.
     *
     * @var        string|null
     */
    protected $desc5;

    /**
     * The value for the sale field.
     *
     * @var        int|null
     */
    protected $sale;

    /**
     * The value for the home field.
     *
     * @var        int|null
     */
    protected $home;

    /**
     * The value for the new_one field.
     *
     * @var        int|null
     */
    protected $new_one;

    /**
     * The value for the type field.
     *
     * @var        string|null
     */
    protected $type;

    /**
     * The value for the volume field.
     *
     * @var        string|null
     */
    protected $volume;

    /**
     * The value for the filter_id field.
     *
     * @var        string|null
     */
    protected $filter_id;

    /**
     * The value for the orden field.
     *
     * @var        int|null
     */
    protected $orden;

    /**
     * The value for the unpublished field.
     *
     * @var        int|null
     */
    protected $unpublished;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var bool
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Ps\Base\Products object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return bool True if the object has been modified.
     */
    public function isModified(): bool
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param string $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return bool True if $col has been modified.
     */
    public function isColumnModified(string $col): bool
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns(): array
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return bool True, if the object has never been persisted.
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param bool $b the state of the object.
     */
    public function setNew(bool $b)
    {
        $this->new = $b;
    }

    /**
     * Whether this object has been deleted.
     * @return bool The deleted state of this object.
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param bool $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b): void
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified(?string $col = null): void
    {
        if (null !== $col) {
            unset($this->modifiedColumns[$col]);
        } else {
            $this->modifiedColumns = [];
        }
    }

    /**
     * Compares this with another <code>Products</code> instance.  If
     * <code>obj</code> is an instance of <code>Products</code>, delegates to
     * <code>equals(Products)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param mixed $obj The object to compare to.
     * @return bool Whether equal to the object specified.
     */
    public function equals($obj): bool
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns(): array
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return bool
     */
    public function hasVirtualColumn(string $name): bool
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return mixed
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getVirtualColumn(string $name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of nonexistent virtual column `%s`.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @param mixed $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn(string $name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param string $msg
     * @param int $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log(string $msg, int $priority = Propel::LOG_INFO): void
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param \Propel\Runtime\Parser\AbstractParser|string $parser An AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME, TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM. Defaults to TableMap::TYPE_PHPNAME.
     * @return string The exported data
     */
    public function exportTo($parser, bool $includeLazyLoadColumns = true, string $keyType = TableMap::TYPE_PHPNAME): string
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray($keyType, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [ex_id] column value.
     *
     * @return string|null
     */
    public function getExId()
    {
        return $this->ex_id;
    }

    /**
     * Get the [parent_id] column value.
     *
     * @return int|null
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Get the [makat] column value.
     *
     * @return string|null
     */
    public function getMakat()
    {
        return $this->makat;
    }

    /**
     * Get the [category] column value.
     *
     * @return int|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the [category_id] column value.
     *
     * @return int|null
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [barcode] column value.
     *
     * @return string|null
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Get the [price] column value.
     *
     * @return string|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [price_ml] column value.
     *
     * @return string|null
     */
    public function getPriceMl()
    {
        return $this->price_ml;
    }

    /**
     * Get the [discount] column value.
     *
     * @return string|null
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Get the [unit] column value.
     *
     * @return string|null
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Get the [img] column value.
     *
     * @return string|null
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Get the [img_wide] column value.
     *
     * @return string|null
     */
    public function getImgWide()
    {
        return $this->img_wide;
    }

    /**
     * Get the [file] column value.
     *
     * @return string|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Get the [desc1] column value.
     *
     * @return string|null
     */
    public function getDesc1()
    {
        return $this->desc1;
    }

    /**
     * Get the [desc2] column value.
     *
     * @return string|null
     */
    public function getDesc2()
    {
        return $this->desc2;
    }

    /**
     * Get the [desc3] column value.
     *
     * @return string|null
     */
    public function getDesc3()
    {
        return $this->desc3;
    }

    /**
     * Get the [desc4] column value.
     *
     * @return string|null
     */
    public function getDesc4()
    {
        return $this->desc4;
    }

    /**
     * Get the [desc5] column value.
     *
     * @return string|null
     */
    public function getDesc5()
    {
        return $this->desc5;
    }

    /**
     * Get the [sale] column value.
     *
     * @return int|null
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Get the [home] column value.
     *
     * @return int|null
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Get the [new_one] column value.
     *
     * @return int|null
     */
    public function getNewOne()
    {
        return $this->new_one;
    }

    /**
     * Get the [type] column value.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [volume] column value.
     *
     * @return string|null
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Get the [filter_id] column value.
     *
     * @return string|null
     */
    public function getFilterId()
    {
        return $this->filter_id;
    }

    /**
     * Get the [orden] column value.
     *
     * @return int|null
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Get the [unpublished] column value.
     *
     * @return int|null
     */
    public function getUnpublished()
    {
        return $this->unpublished;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ProductsTableMap::COL_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [ex_id] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setExId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ex_id !== $v) {
            $this->ex_id = $v;
            $this->modifiedColumns[ProductsTableMap::COL_EX_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [parent_id] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setParentId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->parent_id !== $v) {
            $this->parent_id = $v;
            $this->modifiedColumns[ProductsTableMap::COL_PARENT_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [makat] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setMakat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->makat !== $v) {
            $this->makat = $v;
            $this->modifiedColumns[ProductsTableMap::COL_MAKAT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [category] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setCategory($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->category !== $v) {
            $this->category = $v;
            $this->modifiedColumns[ProductsTableMap::COL_CATEGORY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [category_id] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setCategoryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->category_id !== $v) {
            $this->category_id = $v;
            $this->modifiedColumns[ProductsTableMap::COL_CATEGORY_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [title] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[ProductsTableMap::COL_TITLE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [barcode] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBarcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->barcode !== $v) {
            $this->barcode = $v;
            $this->modifiedColumns[ProductsTableMap::COL_BARCODE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [price] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[ProductsTableMap::COL_PRICE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [price_ml] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPriceMl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price_ml !== $v) {
            $this->price_ml = $v;
            $this->modifiedColumns[ProductsTableMap::COL_PRICE_ML] = true;
        }

        return $this;
    }

    /**
     * Set the value of [discount] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discount !== $v) {
            $this->discount = $v;
            $this->modifiedColumns[ProductsTableMap::COL_DISCOUNT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [unit] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unit !== $v) {
            $this->unit = $v;
            $this->modifiedColumns[ProductsTableMap::COL_UNIT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [img] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setImg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->img !== $v) {
            $this->img = $v;
            $this->modifiedColumns[ProductsTableMap::COL_IMG] = true;
        }

        return $this;
    }

    /**
     * Set the value of [img_wide] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setImgWide($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->img_wide !== $v) {
            $this->img_wide = $v;
            $this->modifiedColumns[ProductsTableMap::COL_IMG_WIDE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [file] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFile($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->file !== $v) {
            $this->file = $v;
            $this->modifiedColumns[ProductsTableMap::COL_FILE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [desc1] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc1 !== $v) {
            $this->desc1 = $v;
            $this->modifiedColumns[ProductsTableMap::COL_DESC1] = true;
        }

        return $this;
    }

    /**
     * Set the value of [desc2] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc2 !== $v) {
            $this->desc2 = $v;
            $this->modifiedColumns[ProductsTableMap::COL_DESC2] = true;
        }

        return $this;
    }

    /**
     * Set the value of [desc3] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDesc3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc3 !== $v) {
            $this->desc3 = $v;
            $this->modifiedColumns[ProductsTableMap::COL_DESC3] = true;
        }

        return $this;
    }

    /**
     * Set the value of [desc4] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDesc4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc4 !== $v) {
            $this->desc4 = $v;
            $this->modifiedColumns[ProductsTableMap::COL_DESC4] = true;
        }

        return $this;
    }

    /**
     * Set the value of [desc5] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDesc5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc5 !== $v) {
            $this->desc5 = $v;
            $this->modifiedColumns[ProductsTableMap::COL_DESC5] = true;
        }

        return $this;
    }

    /**
     * Set the value of [sale] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSale($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sale !== $v) {
            $this->sale = $v;
            $this->modifiedColumns[ProductsTableMap::COL_SALE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [home] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setHome($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->home !== $v) {
            $this->home = $v;
            $this->modifiedColumns[ProductsTableMap::COL_HOME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [new_one] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setNewOne($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->new_one !== $v) {
            $this->new_one = $v;
            $this->modifiedColumns[ProductsTableMap::COL_NEW_ONE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [type] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[ProductsTableMap::COL_TYPE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [volume] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setVolume($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->volume !== $v) {
            $this->volume = $v;
            $this->modifiedColumns[ProductsTableMap::COL_VOLUME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [filter_id] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFilterId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->filter_id !== $v) {
            $this->filter_id = $v;
            $this->modifiedColumns[ProductsTableMap::COL_FILTER_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [orden] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setOrden($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->orden !== $v) {
            $this->orden = $v;
            $this->modifiedColumns[ProductsTableMap::COL_ORDEN] = true;
        }

        return $this;
    }

    /**
     * Set the value of [unpublished] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setUnpublished($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->unpublished !== $v) {
            $this->unpublished = $v;
            $this->modifiedColumns[ProductsTableMap::COL_UNPUBLISHED] = true;
        }

        return $this;
    }

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return bool Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues(): bool
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    }

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by DataFetcher->fetch().
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param bool $rehydrate Whether this object is being re-hydrated from the database.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int next starting column
     * @throws \Propel\Runtime\Exception\PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate(array $row, int $startcol = 0, bool $rehydrate = false, string $indexType = TableMap::TYPE_NUM): int
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ProductsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ProductsTableMap::translateFieldName('ExId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ex_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ProductsTableMap::translateFieldName('ParentId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->parent_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ProductsTableMap::translateFieldName('Makat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->makat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ProductsTableMap::translateFieldName('Category', TableMap::TYPE_PHPNAME, $indexType)];
            $this->category = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ProductsTableMap::translateFieldName('CategoryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->category_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ProductsTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ProductsTableMap::translateFieldName('Barcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->barcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ProductsTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ProductsTableMap::translateFieldName('PriceMl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price_ml = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ProductsTableMap::translateFieldName('Discount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ProductsTableMap::translateFieldName('Unit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ProductsTableMap::translateFieldName('Img', TableMap::TYPE_PHPNAME, $indexType)];
            $this->img = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ProductsTableMap::translateFieldName('ImgWide', TableMap::TYPE_PHPNAME, $indexType)];
            $this->img_wide = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ProductsTableMap::translateFieldName('File', TableMap::TYPE_PHPNAME, $indexType)];
            $this->file = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ProductsTableMap::translateFieldName('Desc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ProductsTableMap::translateFieldName('Desc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : ProductsTableMap::translateFieldName('Desc3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : ProductsTableMap::translateFieldName('Desc4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : ProductsTableMap::translateFieldName('Desc5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : ProductsTableMap::translateFieldName('Sale', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sale = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : ProductsTableMap::translateFieldName('Home', TableMap::TYPE_PHPNAME, $indexType)];
            $this->home = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : ProductsTableMap::translateFieldName('NewOne', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_one = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : ProductsTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : ProductsTableMap::translateFieldName('Volume', TableMap::TYPE_PHPNAME, $indexType)];
            $this->volume = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : ProductsTableMap::translateFieldName('FilterId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->filter_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : ProductsTableMap::translateFieldName('Orden', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orden = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : ProductsTableMap::translateFieldName('Unpublished', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unpublished = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 28; // 28 = ProductsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Ps\\Products'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function ensureConsistency(): void
    {
    }

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param bool $deep (optional) Whether to also de-associated any related objects.
     * @param ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload(bool $deep = false, ?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProductsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildProductsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param ConnectionInterface $con
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @see Products::setDeleted()
     * @see Products::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildProductsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    public function save(?ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ProductsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    }

    /**
     * Insert the row in the database.
     *
     * @param ConnectionInterface $con
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = [];
        $index = 0;

        $this->modifiedColumns[ProductsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_EX_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ex_id';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_PARENT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'parent_id';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_MAKAT)) {
            $modifiedColumns[':p' . $index++]  = 'makat';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = 'category';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_CATEGORY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'category_id';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_BARCODE)) {
            $modifiedColumns[':p' . $index++]  = 'barcode';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_PRICE_ML)) {
            $modifiedColumns[':p' . $index++]  = 'price_ml';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'discount';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_UNIT)) {
            $modifiedColumns[':p' . $index++]  = 'unit';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_IMG)) {
            $modifiedColumns[':p' . $index++]  = 'img';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_IMG_WIDE)) {
            $modifiedColumns[':p' . $index++]  = 'img_wide';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_FILE)) {
            $modifiedColumns[':p' . $index++]  = 'file';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC1)) {
            $modifiedColumns[':p' . $index++]  = 'desc1';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC2)) {
            $modifiedColumns[':p' . $index++]  = 'desc2';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC3)) {
            $modifiedColumns[':p' . $index++]  = 'desc3';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC4)) {
            $modifiedColumns[':p' . $index++]  = 'desc4';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC5)) {
            $modifiedColumns[':p' . $index++]  = 'desc5';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_SALE)) {
            $modifiedColumns[':p' . $index++]  = 'sale';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_HOME)) {
            $modifiedColumns[':p' . $index++]  = 'home';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_NEW_ONE)) {
            $modifiedColumns[':p' . $index++]  = 'new_one';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_VOLUME)) {
            $modifiedColumns[':p' . $index++]  = 'volume';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_FILTER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'filter_id';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_ORDEN)) {
            $modifiedColumns[':p' . $index++]  = 'orden';
        }
        if ($this->isColumnModified(ProductsTableMap::COL_UNPUBLISHED)) {
            $modifiedColumns[':p' . $index++]  = 'unpublished';
        }

        $sql = sprintf(
            'INSERT INTO products (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'ex_id':
                        $stmt->bindValue($identifier, $this->ex_id, PDO::PARAM_STR);
                        break;
                    case 'parent_id':
                        $stmt->bindValue($identifier, $this->parent_id, PDO::PARAM_INT);
                        break;
                    case 'makat':
                        $stmt->bindValue($identifier, $this->makat, PDO::PARAM_STR);
                        break;
                    case 'category':
                        $stmt->bindValue($identifier, $this->category, PDO::PARAM_INT);
                        break;
                    case 'category_id':
                        $stmt->bindValue($identifier, $this->category_id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'barcode':
                        $stmt->bindValue($identifier, $this->barcode, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'price_ml':
                        $stmt->bindValue($identifier, $this->price_ml, PDO::PARAM_STR);
                        break;
                    case 'discount':
                        $stmt->bindValue($identifier, $this->discount, PDO::PARAM_STR);
                        break;
                    case 'unit':
                        $stmt->bindValue($identifier, $this->unit, PDO::PARAM_STR);
                        break;
                    case 'img':
                        $stmt->bindValue($identifier, $this->img, PDO::PARAM_STR);
                        break;
                    case 'img_wide':
                        $stmt->bindValue($identifier, $this->img_wide, PDO::PARAM_STR);
                        break;
                    case 'file':
                        $stmt->bindValue($identifier, $this->file, PDO::PARAM_STR);
                        break;
                    case 'desc1':
                        $stmt->bindValue($identifier, $this->desc1, PDO::PARAM_STR);
                        break;
                    case 'desc2':
                        $stmt->bindValue($identifier, $this->desc2, PDO::PARAM_STR);
                        break;
                    case 'desc3':
                        $stmt->bindValue($identifier, $this->desc3, PDO::PARAM_STR);
                        break;
                    case 'desc4':
                        $stmt->bindValue($identifier, $this->desc4, PDO::PARAM_STR);
                        break;
                    case 'desc5':
                        $stmt->bindValue($identifier, $this->desc5, PDO::PARAM_STR);
                        break;
                    case 'sale':
                        $stmt->bindValue($identifier, $this->sale, PDO::PARAM_INT);
                        break;
                    case 'home':
                        $stmt->bindValue($identifier, $this->home, PDO::PARAM_INT);
                        break;
                    case 'new_one':
                        $stmt->bindValue($identifier, $this->new_one, PDO::PARAM_INT);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'volume':
                        $stmt->bindValue($identifier, $this->volume, PDO::PARAM_STR);
                        break;
                    case 'filter_id':
                        $stmt->bindValue($identifier, $this->filter_id, PDO::PARAM_STR);
                        break;
                    case 'orden':
                        $stmt->bindValue($identifier, $this->orden, PDO::PARAM_INT);
                        break;
                    case 'unpublished':
                        $stmt->bindValue($identifier, $this->unpublished, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param ConnectionInterface $con
     *
     * @return int Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con): int
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName(string $name, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ProductsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos Position in XML schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition(int $pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();

            case 1:
                return $this->getExId();

            case 2:
                return $this->getParentId();

            case 3:
                return $this->getMakat();

            case 4:
                return $this->getCategory();

            case 5:
                return $this->getCategoryId();

            case 6:
                return $this->getTitle();

            case 7:
                return $this->getBarcode();

            case 8:
                return $this->getPrice();

            case 9:
                return $this->getPriceMl();

            case 10:
                return $this->getDiscount();

            case 11:
                return $this->getUnit();

            case 12:
                return $this->getImg();

            case 13:
                return $this->getImgWide();

            case 14:
                return $this->getFile();

            case 15:
                return $this->getDesc1();

            case 16:
                return $this->getDesc2();

            case 17:
                return $this->getDesc3();

            case 18:
                return $this->getDesc4();

            case 19:
                return $this->getDesc5();

            case 20:
                return $this->getSale();

            case 21:
                return $this->getHome();

            case 22:
                return $this->getNewOne();

            case 23:
                return $this->getType();

            case 24:
                return $this->getVolume();

            case 25:
                return $this->getFilterId();

            case 26:
                return $this->getOrden();

            case 27:
                return $this->getUnpublished();

            default:
                return null;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array An associative array containing the field names (as keys) and field values
     */
    public function toArray(string $keyType = TableMap::TYPE_PHPNAME, bool $includeLazyLoadColumns = true, array $alreadyDumpedObjects = []): array
    {
        if (isset($alreadyDumpedObjects['Products'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['Products'][$this->hashCode()] = true;
        $keys = ProductsTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getId(),
            $keys[1] => $this->getExId(),
            $keys[2] => $this->getParentId(),
            $keys[3] => $this->getMakat(),
            $keys[4] => $this->getCategory(),
            $keys[5] => $this->getCategoryId(),
            $keys[6] => $this->getTitle(),
            $keys[7] => $this->getBarcode(),
            $keys[8] => $this->getPrice(),
            $keys[9] => $this->getPriceMl(),
            $keys[10] => $this->getDiscount(),
            $keys[11] => $this->getUnit(),
            $keys[12] => $this->getImg(),
            $keys[13] => $this->getImgWide(),
            $keys[14] => $this->getFile(),
            $keys[15] => $this->getDesc1(),
            $keys[16] => $this->getDesc2(),
            $keys[17] => $this->getDesc3(),
            $keys[18] => $this->getDesc4(),
            $keys[19] => $this->getDesc5(),
            $keys[20] => $this->getSale(),
            $keys[21] => $this->getHome(),
            $keys[22] => $this->getNewOne(),
            $keys[23] => $this->getType(),
            $keys[24] => $this->getVolume(),
            $keys[25] => $this->getFilterId(),
            $keys[26] => $this->getOrden(),
            $keys[27] => $this->getUnpublished(),
        ];
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this
     */
    public function setByName(string $name, $value, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ProductsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        $this->setByPosition($pos, $value);

        return $this;
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return $this
     */
    public function setByPosition(int $pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setExId($value);
                break;
            case 2:
                $this->setParentId($value);
                break;
            case 3:
                $this->setMakat($value);
                break;
            case 4:
                $this->setCategory($value);
                break;
            case 5:
                $this->setCategoryId($value);
                break;
            case 6:
                $this->setTitle($value);
                break;
            case 7:
                $this->setBarcode($value);
                break;
            case 8:
                $this->setPrice($value);
                break;
            case 9:
                $this->setPriceMl($value);
                break;
            case 10:
                $this->setDiscount($value);
                break;
            case 11:
                $this->setUnit($value);
                break;
            case 12:
                $this->setImg($value);
                break;
            case 13:
                $this->setImgWide($value);
                break;
            case 14:
                $this->setFile($value);
                break;
            case 15:
                $this->setDesc1($value);
                break;
            case 16:
                $this->setDesc2($value);
                break;
            case 17:
                $this->setDesc3($value);
                break;
            case 18:
                $this->setDesc4($value);
                break;
            case 19:
                $this->setDesc5($value);
                break;
            case 20:
                $this->setSale($value);
                break;
            case 21:
                $this->setHome($value);
                break;
            case 22:
                $this->setNewOne($value);
                break;
            case 23:
                $this->setType($value);
                break;
            case 24:
                $this->setVolume($value);
                break;
            case 25:
                $this->setFilterId($value);
                break;
            case 26:
                $this->setOrden($value);
                break;
            case 27:
                $this->setUnpublished($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param array $arr An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return $this
     */
    public function fromArray(array $arr, string $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ProductsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setExId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setParentId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setMakat($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCategory($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCategoryId($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setTitle($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBarcode($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPrice($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPriceMl($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDiscount($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setUnit($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setImg($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setImgWide($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setFile($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDesc1($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDesc2($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setDesc3($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDesc4($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDesc5($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setSale($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setHome($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setNewOne($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setType($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setVolume($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setFilterId($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setOrden($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setUnpublished($arr[$keys[27]]);
        }

        return $this;
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this The current object, for fluid interface
     */
    public function importFrom($parser, string $data, string $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria(): Criteria
    {
        $criteria = new Criteria(ProductsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ProductsTableMap::COL_ID)) {
            $criteria->add(ProductsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_EX_ID)) {
            $criteria->add(ProductsTableMap::COL_EX_ID, $this->ex_id);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_PARENT_ID)) {
            $criteria->add(ProductsTableMap::COL_PARENT_ID, $this->parent_id);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_MAKAT)) {
            $criteria->add(ProductsTableMap::COL_MAKAT, $this->makat);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_CATEGORY)) {
            $criteria->add(ProductsTableMap::COL_CATEGORY, $this->category);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_CATEGORY_ID)) {
            $criteria->add(ProductsTableMap::COL_CATEGORY_ID, $this->category_id);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_TITLE)) {
            $criteria->add(ProductsTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_BARCODE)) {
            $criteria->add(ProductsTableMap::COL_BARCODE, $this->barcode);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_PRICE)) {
            $criteria->add(ProductsTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_PRICE_ML)) {
            $criteria->add(ProductsTableMap::COL_PRICE_ML, $this->price_ml);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DISCOUNT)) {
            $criteria->add(ProductsTableMap::COL_DISCOUNT, $this->discount);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_UNIT)) {
            $criteria->add(ProductsTableMap::COL_UNIT, $this->unit);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_IMG)) {
            $criteria->add(ProductsTableMap::COL_IMG, $this->img);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_IMG_WIDE)) {
            $criteria->add(ProductsTableMap::COL_IMG_WIDE, $this->img_wide);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_FILE)) {
            $criteria->add(ProductsTableMap::COL_FILE, $this->file);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC1)) {
            $criteria->add(ProductsTableMap::COL_DESC1, $this->desc1);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC2)) {
            $criteria->add(ProductsTableMap::COL_DESC2, $this->desc2);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC3)) {
            $criteria->add(ProductsTableMap::COL_DESC3, $this->desc3);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC4)) {
            $criteria->add(ProductsTableMap::COL_DESC4, $this->desc4);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_DESC5)) {
            $criteria->add(ProductsTableMap::COL_DESC5, $this->desc5);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_SALE)) {
            $criteria->add(ProductsTableMap::COL_SALE, $this->sale);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_HOME)) {
            $criteria->add(ProductsTableMap::COL_HOME, $this->home);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_NEW_ONE)) {
            $criteria->add(ProductsTableMap::COL_NEW_ONE, $this->new_one);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_TYPE)) {
            $criteria->add(ProductsTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_VOLUME)) {
            $criteria->add(ProductsTableMap::COL_VOLUME, $this->volume);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_FILTER_ID)) {
            $criteria->add(ProductsTableMap::COL_FILTER_ID, $this->filter_id);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_ORDEN)) {
            $criteria->add(ProductsTableMap::COL_ORDEN, $this->orden);
        }
        if ($this->isColumnModified(ProductsTableMap::COL_UNPUBLISHED)) {
            $criteria->add(ProductsTableMap::COL_UNPUBLISHED, $this->unpublished);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria(): Criteria
    {
        $criteria = ChildProductsQuery::create();
        $criteria->add(ProductsTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int|string Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key): void
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     *
     * @return bool
     */
    public function isPrimaryKeyNull(): bool
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of \Ps\Products (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setExId($this->getExId());
        $copyObj->setParentId($this->getParentId());
        $copyObj->setMakat($this->getMakat());
        $copyObj->setCategory($this->getCategory());
        $copyObj->setCategoryId($this->getCategoryId());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setBarcode($this->getBarcode());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setPriceMl($this->getPriceMl());
        $copyObj->setDiscount($this->getDiscount());
        $copyObj->setUnit($this->getUnit());
        $copyObj->setImg($this->getImg());
        $copyObj->setImgWide($this->getImgWide());
        $copyObj->setFile($this->getFile());
        $copyObj->setDesc1($this->getDesc1());
        $copyObj->setDesc2($this->getDesc2());
        $copyObj->setDesc3($this->getDesc3());
        $copyObj->setDesc4($this->getDesc4());
        $copyObj->setDesc5($this->getDesc5());
        $copyObj->setSale($this->getSale());
        $copyObj->setHome($this->getHome());
        $copyObj->setNewOne($this->getNewOne());
        $copyObj->setType($this->getType());
        $copyObj->setVolume($this->getVolume());
        $copyObj->setFilterId($this->getFilterId());
        $copyObj->setOrden($this->getOrden());
        $copyObj->setUnpublished($this->getUnpublished());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Ps\Products Clone of current object.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function copy(bool $deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     *
     * @return $this
     */
    public function clear()
    {
        $this->id = null;
        $this->ex_id = null;
        $this->parent_id = null;
        $this->makat = null;
        $this->category = null;
        $this->category_id = null;
        $this->title = null;
        $this->barcode = null;
        $this->price = null;
        $this->price_ml = null;
        $this->discount = null;
        $this->unit = null;
        $this->img = null;
        $this->img_wide = null;
        $this->file = null;
        $this->desc1 = null;
        $this->desc2 = null;
        $this->desc3 = null;
        $this->desc4 = null;
        $this->desc5 = null;
        $this->sale = null;
        $this->home = null;
        $this->new_one = null;
        $this->type = null;
        $this->volume = null;
        $this->filter_id = null;
        $this->orden = null;
        $this->unpublished = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);

        return $this;
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param bool $deep Whether to also clear the references on all referrer objects.
     * @return $this
     */
    public function clearAllReferences(bool $deep = false)
    {
        if ($deep) {
        } // if ($deep)

        return $this;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preSave(?ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postSave(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before inserting to database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preInsert(?ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postInsert(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preUpdate(?ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postUpdate(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preDelete(?ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postDelete(?ConnectionInterface $con = null): void
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);
            $inputData = $params[0];
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->importFrom($format, $inputData, $keyType);
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = $params[0] ?? true;
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->exportTo($format, $includeLazyLoadColumns, $keyType);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
