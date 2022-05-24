<?php

namespace Ps\Base;

use \DateTime;
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
use Propel\Runtime\Util\PropelDateTime;
use Ps\OrdersQuery as ChildOrdersQuery;
use Ps\Map\OrdersTableMap;

/**
 * Base class that represents a row from the 'orders' table.
 *
 *
 *
 * @package    propel.generator.Ps.Base
 */
abstract class Orders implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Ps\\Map\\OrdersTableMap';


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
     * The value for the date field.
     *
     * @var        string|null
     */
    protected $date;

    /**
     * The value for the format_date field.
     *
     * @var        string|null
     */
    protected $format_date;

    /**
     * The value for the time field.
     *
     * @var        string|null
     */
    protected $time;

    /**
     * The value for the user_id field.
     *
     * @var        int|null
     */
    protected $user_id;

    /**
     * The value for the delivery_id field.
     *
     * @var        int|null
     */
    protected $delivery_id;

    /**
     * The value for the pickup field.
     *
     * @var        string|null
     */
    protected $pickup;

    /**
     * The value for the total field.
     *
     * @var        string|null
     */
    protected $total;

    /**
     * The value for the status field.
     *
     * @var        string|null
     */
    protected $status;

    /**
     * The value for the comment field.
     *
     * @var        string|null
     */
    protected $comment;

    /**
     * The value for the transaction field.
     *
     * @var        string|null
     */
    protected $transaction;

    /**
     * The value for the mail field.
     *
     * @var        string|null
     */
    protected $mail;

    /**
     * The value for the tel field.
     *
     * @var        string|null
     */
    protected $tel;

    /**
     * The value for the first_name field.
     *
     * @var        string|null
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     *
     * @var        string|null
     */
    protected $last_name;

    /**
     * The value for the passport field.
     *
     * @var        string|null
     */
    protected $passport;

    /**
     * The value for the town field.
     *
     * @var        string|null
     */
    protected $town;

    /**
     * The value for the address field.
     *
     * @var        string|null
     */
    protected $address;

    /**
     * The value for the zip field.
     *
     * @var        string|null
     */
    protected $zip;

    /**
     * The value for the house field.
     *
     * @var        string|null
     */
    protected $house;

    /**
     * The value for the appartment field.
     *
     * @var        string|null
     */
    protected $appartment;

    /**
     * The value for the floor field.
     *
     * @var        string|null
     */
    protected $floor;

    /**
     * The value for the entrance field.
     *
     * @var        string|null
     */
    protected $entrance;

    /**
     * The value for the created field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $created;

    /**
     * The value for the modified field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $modified;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var bool
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues(): void
    {
    }

    /**
     * Initializes internal state of Ps\Base\Orders object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
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
     * Compares this with another <code>Orders</code> instance.  If
     * <code>obj</code> is an instance of <code>Orders</code>, delegates to
     * <code>equals(Orders)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [date] column value.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [format_date] column value.
     *
     * @return string|null
     */
    public function getFormatDate()
    {
        return $this->format_date;
    }

    /**
     * Get the [time] column value.
     *
     * @return string|null
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the [user_id] column value.
     *
     * @return int|null
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the [delivery_id] column value.
     *
     * @return int|null
     */
    public function getDeliveryId()
    {
        return $this->delivery_id;
    }

    /**
     * Get the [pickup] column value.
     *
     * @return string|null
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * Get the [total] column value.
     *
     * @return string|null
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [status] column value.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [comment] column value.
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get the [transaction] column value.
     *
     * @return string|null
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Get the [mail] column value.
     *
     * @return string|null
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Get the [tel] column value.
     *
     * @return string|null
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Get the [first_name] column value.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the [passport] column value.
     *
     * @return string|null
     */
    public function getPassport()
    {
        return $this->passport;
    }

    /**
     * Get the [town] column value.
     *
     * @return string|null
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Get the [address] column value.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [zip] column value.
     *
     * @return string|null
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Get the [house] column value.
     *
     * @return string|null
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * Get the [appartment] column value.
     *
     * @return string|null
     */
    public function getAppartment()
    {
        return $this->appartment;
    }

    /**
     * Get the [floor] column value.
     *
     * @return string|null
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Get the [entrance] column value.
     *
     * @return string|null
     */
    public function getEntrance()
    {
        return $this->entrance;
    }

    /**
     * Get the [optionally formatted] temporal [created] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), and 0 if column value is 0000-00-00 00:00:00.
     *
     * @throws \Propel\Runtime\Exception\PropelException - if unable to parse/validate the date/time value.
     *
     * @psalm-return ($format is null ? DateTime : string)
     */
    public function getCreated($format = null)
    {
        if ($format === null) {
            return $this->created;
        } else {
            return $this->created instanceof \DateTimeInterface ? $this->created->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [modified] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), and 0 if column value is 0000-00-00 00:00:00.
     *
     * @throws \Propel\Runtime\Exception\PropelException - if unable to parse/validate the date/time value.
     *
     * @psalm-return ($format is null ? DateTime : string)
     */
    public function getModified($format = null)
    {
        if ($format === null) {
            return $this->modified;
        } else {
            return $this->modified instanceof \DateTimeInterface ? $this->modified->format($format) : null;
        }
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
            $this->modifiedColumns[OrdersTableMap::COL_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [date] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[OrdersTableMap::COL_DATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [format_date] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFormatDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->format_date !== $v) {
            $this->format_date = $v;
            $this->modifiedColumns[OrdersTableMap::COL_FORMAT_DATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [time] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[OrdersTableMap::COL_TIME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [user_id] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[OrdersTableMap::COL_USER_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [delivery_id] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDeliveryId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->delivery_id !== $v) {
            $this->delivery_id = $v;
            $this->modifiedColumns[OrdersTableMap::COL_DELIVERY_ID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pickup] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPickup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pickup !== $v) {
            $this->pickup = $v;
            $this->modifiedColumns[OrdersTableMap::COL_PICKUP] = true;
        }

        return $this;
    }

    /**
     * Set the value of [total] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[OrdersTableMap::COL_TOTAL] = true;
        }

        return $this;
    }

    /**
     * Set the value of [status] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[OrdersTableMap::COL_STATUS] = true;
        }

        return $this;
    }

    /**
     * Set the value of [comment] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[OrdersTableMap::COL_COMMENT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [transaction] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTransaction($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->transaction !== $v) {
            $this->transaction = $v;
            $this->modifiedColumns[OrdersTableMap::COL_TRANSACTION] = true;
        }

        return $this;
    }

    /**
     * Set the value of [mail] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setMail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mail !== $v) {
            $this->mail = $v;
            $this->modifiedColumns[OrdersTableMap::COL_MAIL] = true;
        }

        return $this;
    }

    /**
     * Set the value of [tel] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tel !== $v) {
            $this->tel = $v;
            $this->modifiedColumns[OrdersTableMap::COL_TEL] = true;
        }

        return $this;
    }

    /**
     * Set the value of [first_name] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[OrdersTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [last_name] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[OrdersTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [passport] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPassport($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->passport !== $v) {
            $this->passport = $v;
            $this->modifiedColumns[OrdersTableMap::COL_PASSPORT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [town] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTown($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->town !== $v) {
            $this->town = $v;
            $this->modifiedColumns[OrdersTableMap::COL_TOWN] = true;
        }

        return $this;
    }

    /**
     * Set the value of [address] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[OrdersTableMap::COL_ADDRESS] = true;
        }

        return $this;
    }

    /**
     * Set the value of [zip] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[OrdersTableMap::COL_ZIP] = true;
        }

        return $this;
    }

    /**
     * Set the value of [house] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setHouse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->house !== $v) {
            $this->house = $v;
            $this->modifiedColumns[OrdersTableMap::COL_HOUSE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [appartment] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setAppartment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->appartment !== $v) {
            $this->appartment = $v;
            $this->modifiedColumns[OrdersTableMap::COL_APPARTMENT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [floor] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFloor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->floor !== $v) {
            $this->floor = $v;
            $this->modifiedColumns[OrdersTableMap::COL_FLOOR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [entrance] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setEntrance($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->entrance !== $v) {
            $this->entrance = $v;
            $this->modifiedColumns[OrdersTableMap::COL_ENTRANCE] = true;
        }

        return $this;
    }

    /**
     * Sets the value of [created] column to a normalized version of the date/time value specified.
     *
     * @param string|integer|\DateTimeInterface $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created !== null || $dt !== null) {
            if ($this->created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created->format("Y-m-d H:i:s.u")) {
                $this->created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OrdersTableMap::COL_CREATED] = true;
            }
        } // if either are not null

        return $this;
    }

    /**
     * Sets the value of [modified] column to a normalized version of the date/time value specified.
     *
     * @param string|integer|\DateTimeInterface $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this The current object (for fluent API support)
     */
    public function setModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modified !== null || $dt !== null) {
            if ($this->modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->modified->format("Y-m-d H:i:s.u")) {
                $this->modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[OrdersTableMap::COL_MODIFIED] = true;
            }
        } // if either are not null

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OrdersTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OrdersTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OrdersTableMap::translateFieldName('FormatDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->format_date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OrdersTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OrdersTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OrdersTableMap::translateFieldName('DeliveryId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->delivery_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OrdersTableMap::translateFieldName('Pickup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pickup = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OrdersTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OrdersTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OrdersTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OrdersTableMap::translateFieldName('Transaction', TableMap::TYPE_PHPNAME, $indexType)];
            $this->transaction = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OrdersTableMap::translateFieldName('Mail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mail = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OrdersTableMap::translateFieldName('Tel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OrdersTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OrdersTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OrdersTableMap::translateFieldName('Passport', TableMap::TYPE_PHPNAME, $indexType)];
            $this->passport = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OrdersTableMap::translateFieldName('Town', TableMap::TYPE_PHPNAME, $indexType)];
            $this->town = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OrdersTableMap::translateFieldName('Address', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OrdersTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OrdersTableMap::translateFieldName('House', TableMap::TYPE_PHPNAME, $indexType)];
            $this->house = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : OrdersTableMap::translateFieldName('Appartment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->appartment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : OrdersTableMap::translateFieldName('Floor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->floor = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : OrdersTableMap::translateFieldName('Entrance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->entrance = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : OrdersTableMap::translateFieldName('Created', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : OrdersTableMap::translateFieldName('Modified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 25; // 25 = OrdersTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Ps\\Orders'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OrdersTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOrdersQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Orders::setDeleted()
     * @see Orders::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOrdersQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
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
                OrdersTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[OrdersTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrdersTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OrdersTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_FORMAT_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'format_date';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_DELIVERY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'delivery_id';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_PICKUP)) {
            $modifiedColumns[':p' . $index++]  = 'pickup';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TRANSACTION)) {
            $modifiedColumns[':p' . $index++]  = 'transaction';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_MAIL)) {
            $modifiedColumns[':p' . $index++]  = 'mail';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TEL)) {
            $modifiedColumns[':p' . $index++]  = 'tel';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'first_name';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'last_name';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_PASSPORT)) {
            $modifiedColumns[':p' . $index++]  = 'passport';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TOWN)) {
            $modifiedColumns[':p' . $index++]  = 'town';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'address';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'zip';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_HOUSE)) {
            $modifiedColumns[':p' . $index++]  = 'house';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_APPARTMENT)) {
            $modifiedColumns[':p' . $index++]  = 'appartment';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_FLOOR)) {
            $modifiedColumns[':p' . $index++]  = 'floor';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_ENTRANCE)) {
            $modifiedColumns[':p' . $index++]  = 'entrance';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'created';
        }
        if ($this->isColumnModified(OrdersTableMap::COL_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'modified';
        }

        $sql = sprintf(
            'INSERT INTO orders (%s) VALUES (%s)',
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
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case 'format_date':
                        $stmt->bindValue($identifier, $this->format_date, PDO::PARAM_STR);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_STR);
                        break;
                    case 'user_id':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case 'delivery_id':
                        $stmt->bindValue($identifier, $this->delivery_id, PDO::PARAM_INT);
                        break;
                    case 'pickup':
                        $stmt->bindValue($identifier, $this->pickup, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'transaction':
                        $stmt->bindValue($identifier, $this->transaction, PDO::PARAM_STR);
                        break;
                    case 'mail':
                        $stmt->bindValue($identifier, $this->mail, PDO::PARAM_STR);
                        break;
                    case 'tel':
                        $stmt->bindValue($identifier, $this->tel, PDO::PARAM_STR);
                        break;
                    case 'first_name':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'last_name':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'passport':
                        $stmt->bindValue($identifier, $this->passport, PDO::PARAM_STR);
                        break;
                    case 'town':
                        $stmt->bindValue($identifier, $this->town, PDO::PARAM_STR);
                        break;
                    case 'address':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case 'zip':
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_STR);
                        break;
                    case 'house':
                        $stmt->bindValue($identifier, $this->house, PDO::PARAM_STR);
                        break;
                    case 'appartment':
                        $stmt->bindValue($identifier, $this->appartment, PDO::PARAM_STR);
                        break;
                    case 'floor':
                        $stmt->bindValue($identifier, $this->floor, PDO::PARAM_STR);
                        break;
                    case 'entrance':
                        $stmt->bindValue($identifier, $this->entrance, PDO::PARAM_STR);
                        break;
                    case 'created':
                        $stmt->bindValue($identifier, $this->created ? $this->created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'modified':
                        $stmt->bindValue($identifier, $this->modified ? $this->modified->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $pos = OrdersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getDate();

            case 2:
                return $this->getFormatDate();

            case 3:
                return $this->getTime();

            case 4:
                return $this->getUserId();

            case 5:
                return $this->getDeliveryId();

            case 6:
                return $this->getPickup();

            case 7:
                return $this->getTotal();

            case 8:
                return $this->getStatus();

            case 9:
                return $this->getComment();

            case 10:
                return $this->getTransaction();

            case 11:
                return $this->getMail();

            case 12:
                return $this->getTel();

            case 13:
                return $this->getFirstName();

            case 14:
                return $this->getLastName();

            case 15:
                return $this->getPassport();

            case 16:
                return $this->getTown();

            case 17:
                return $this->getAddress();

            case 18:
                return $this->getZip();

            case 19:
                return $this->getHouse();

            case 20:
                return $this->getAppartment();

            case 21:
                return $this->getFloor();

            case 22:
                return $this->getEntrance();

            case 23:
                return $this->getCreated();

            case 24:
                return $this->getModified();

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
        if (isset($alreadyDumpedObjects['Orders'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['Orders'][$this->hashCode()] = true;
        $keys = OrdersTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDate(),
            $keys[2] => $this->getFormatDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getUserId(),
            $keys[5] => $this->getDeliveryId(),
            $keys[6] => $this->getPickup(),
            $keys[7] => $this->getTotal(),
            $keys[8] => $this->getStatus(),
            $keys[9] => $this->getComment(),
            $keys[10] => $this->getTransaction(),
            $keys[11] => $this->getMail(),
            $keys[12] => $this->getTel(),
            $keys[13] => $this->getFirstName(),
            $keys[14] => $this->getLastName(),
            $keys[15] => $this->getPassport(),
            $keys[16] => $this->getTown(),
            $keys[17] => $this->getAddress(),
            $keys[18] => $this->getZip(),
            $keys[19] => $this->getHouse(),
            $keys[20] => $this->getAppartment(),
            $keys[21] => $this->getFloor(),
            $keys[22] => $this->getEntrance(),
            $keys[23] => $this->getCreated(),
            $keys[24] => $this->getModified(),
        ];
        if ($result[$keys[23]] instanceof \DateTimeInterface) {
            $result[$keys[23]] = $result[$keys[23]]->format('Y-m-d H:i:s.u');
        }

        if ($result[$keys[24]] instanceof \DateTimeInterface) {
            $result[$keys[24]] = $result[$keys[24]]->format('Y-m-d H:i:s.u');
        }

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
        $pos = OrdersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
                $this->setDate($value);
                break;
            case 2:
                $this->setFormatDate($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setUserId($value);
                break;
            case 5:
                $this->setDeliveryId($value);
                break;
            case 6:
                $this->setPickup($value);
                break;
            case 7:
                $this->setTotal($value);
                break;
            case 8:
                $this->setStatus($value);
                break;
            case 9:
                $this->setComment($value);
                break;
            case 10:
                $this->setTransaction($value);
                break;
            case 11:
                $this->setMail($value);
                break;
            case 12:
                $this->setTel($value);
                break;
            case 13:
                $this->setFirstName($value);
                break;
            case 14:
                $this->setLastName($value);
                break;
            case 15:
                $this->setPassport($value);
                break;
            case 16:
                $this->setTown($value);
                break;
            case 17:
                $this->setAddress($value);
                break;
            case 18:
                $this->setZip($value);
                break;
            case 19:
                $this->setHouse($value);
                break;
            case 20:
                $this->setAppartment($value);
                break;
            case 21:
                $this->setFloor($value);
                break;
            case 22:
                $this->setEntrance($value);
                break;
            case 23:
                $this->setCreated($value);
                break;
            case 24:
                $this->setModified($value);
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
        $keys = OrdersTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDate($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFormatDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUserId($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDeliveryId($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPickup($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTotal($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStatus($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setComment($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTransaction($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setMail($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTel($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setFirstName($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setLastName($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPassport($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTown($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setAddress($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setZip($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setHouse($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setAppartment($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setFloor($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setEntrance($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setCreated($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setModified($arr[$keys[24]]);
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
        $criteria = new Criteria(OrdersTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OrdersTableMap::COL_ID)) {
            $criteria->add(OrdersTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_DATE)) {
            $criteria->add(OrdersTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_FORMAT_DATE)) {
            $criteria->add(OrdersTableMap::COL_FORMAT_DATE, $this->format_date);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TIME)) {
            $criteria->add(OrdersTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_USER_ID)) {
            $criteria->add(OrdersTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_DELIVERY_ID)) {
            $criteria->add(OrdersTableMap::COL_DELIVERY_ID, $this->delivery_id);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_PICKUP)) {
            $criteria->add(OrdersTableMap::COL_PICKUP, $this->pickup);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TOTAL)) {
            $criteria->add(OrdersTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_STATUS)) {
            $criteria->add(OrdersTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_COMMENT)) {
            $criteria->add(OrdersTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TRANSACTION)) {
            $criteria->add(OrdersTableMap::COL_TRANSACTION, $this->transaction);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_MAIL)) {
            $criteria->add(OrdersTableMap::COL_MAIL, $this->mail);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TEL)) {
            $criteria->add(OrdersTableMap::COL_TEL, $this->tel);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_FIRST_NAME)) {
            $criteria->add(OrdersTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_LAST_NAME)) {
            $criteria->add(OrdersTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_PASSPORT)) {
            $criteria->add(OrdersTableMap::COL_PASSPORT, $this->passport);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_TOWN)) {
            $criteria->add(OrdersTableMap::COL_TOWN, $this->town);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_ADDRESS)) {
            $criteria->add(OrdersTableMap::COL_ADDRESS, $this->address);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_ZIP)) {
            $criteria->add(OrdersTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_HOUSE)) {
            $criteria->add(OrdersTableMap::COL_HOUSE, $this->house);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_APPARTMENT)) {
            $criteria->add(OrdersTableMap::COL_APPARTMENT, $this->appartment);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_FLOOR)) {
            $criteria->add(OrdersTableMap::COL_FLOOR, $this->floor);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_ENTRANCE)) {
            $criteria->add(OrdersTableMap::COL_ENTRANCE, $this->entrance);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_CREATED)) {
            $criteria->add(OrdersTableMap::COL_CREATED, $this->created);
        }
        if ($this->isColumnModified(OrdersTableMap::COL_MODIFIED)) {
            $criteria->add(OrdersTableMap::COL_MODIFIED, $this->modified);
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
        $criteria = ChildOrdersQuery::create();
        $criteria->add(OrdersTableMap::COL_ID, $this->id);

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
     * @param object $copyObj An object of \Ps\Orders (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setDate($this->getDate());
        $copyObj->setFormatDate($this->getFormatDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setUserId($this->getUserId());
        $copyObj->setDeliveryId($this->getDeliveryId());
        $copyObj->setPickup($this->getPickup());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setComment($this->getComment());
        $copyObj->setTransaction($this->getTransaction());
        $copyObj->setMail($this->getMail());
        $copyObj->setTel($this->getTel());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setPassport($this->getPassport());
        $copyObj->setTown($this->getTown());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setZip($this->getZip());
        $copyObj->setHouse($this->getHouse());
        $copyObj->setAppartment($this->getAppartment());
        $copyObj->setFloor($this->getFloor());
        $copyObj->setEntrance($this->getEntrance());
        $copyObj->setCreated($this->getCreated());
        $copyObj->setModified($this->getModified());
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
     * @return \Ps\Orders Clone of current object.
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
        $this->date = null;
        $this->format_date = null;
        $this->time = null;
        $this->user_id = null;
        $this->delivery_id = null;
        $this->pickup = null;
        $this->total = null;
        $this->status = null;
        $this->comment = null;
        $this->transaction = null;
        $this->mail = null;
        $this->tel = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->passport = null;
        $this->town = null;
        $this->address = null;
        $this->zip = null;
        $this->house = null;
        $this->appartment = null;
        $this->floor = null;
        $this->entrance = null;
        $this->created = null;
        $this->modified = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
        return (string) $this->exportTo(OrdersTableMap::DEFAULT_STRING_FORMAT);
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
