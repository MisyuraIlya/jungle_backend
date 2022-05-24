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
use Ps\Users;
use Ps\UsersQuery;


/**
 * This class defines the structure of the 'users' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class UsersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Ps.Map.UsersTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'users';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ps\\Users';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ps.Users';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'users.id';

    /**
     * the column name for the site_id field
     */
    public const COL_SITE_ID = 'users.site_id';

    /**
     * the column name for the mail field
     */
    public const COL_MAIL = 'users.mail';

    /**
     * the column name for the mail_second field
     */
    public const COL_MAIL_SECOND = 'users.mail_second';

    /**
     * the column name for the tel field
     */
    public const COL_TEL = 'users.tel';

    /**
     * the column name for the mobile field
     */
    public const COL_MOBILE = 'users.mobile';

    /**
     * the column name for the first_name field
     */
    public const COL_FIRST_NAME = 'users.first_name';

    /**
     * the column name for the last_name field
     */
    public const COL_LAST_NAME = 'users.last_name';

    /**
     * the column name for the type field
     */
    public const COL_TYPE = 'users.type';

    /**
     * the column name for the unpublished field
     */
    public const COL_UNPUBLISHED = 'users.unpublished';

    /**
     * the column name for the password field
     */
    public const COL_PASSWORD = 'users.password';

    /**
     * the column name for the token field
     */
    public const COL_TOKEN = 'users.token';

    /**
     * the column name for the passport field
     */
    public const COL_PASSPORT = 'users.passport';

    /**
     * the column name for the recovery field
     */
    public const COL_RECOVERY = 'users.recovery';

    /**
     * the column name for the img field
     */
    public const COL_IMG = 'users.img';

    /**
     * the column name for the facebook_id field
     */
    public const COL_FACEBOOK_ID = 'users.facebook_id';

    /**
     * the column name for the google_id field
     */
    public const COL_GOOGLE_ID = 'users.google_id';

    /**
     * the column name for the town field
     */
    public const COL_TOWN = 'users.town';

    /**
     * the column name for the address field
     */
    public const COL_ADDRESS = 'users.address';

    /**
     * the column name for the zip field
     */
    public const COL_ZIP = 'users.zip';

    /**
     * the column name for the accept field
     */
    public const COL_ACCEPT = 'users.accept';

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
        self::TYPE_PHPNAME       => ['Id', 'SiteId', 'Mail', 'MailSecond', 'Tel', 'Mobile', 'FirstName', 'LastName', 'Type', 'Unpublished', 'Password', 'Token', 'Passport', 'Recovery', 'Img', 'FacebookId', 'GoogleId', 'Town', 'Address', 'Zip', 'Accept', ],
        self::TYPE_CAMELNAME     => ['id', 'siteId', 'mail', 'mailSecond', 'tel', 'mobile', 'firstName', 'lastName', 'type', 'unpublished', 'password', 'token', 'passport', 'recovery', 'img', 'facebookId', 'googleId', 'town', 'address', 'zip', 'accept', ],
        self::TYPE_COLNAME       => [UsersTableMap::COL_ID, UsersTableMap::COL_SITE_ID, UsersTableMap::COL_MAIL, UsersTableMap::COL_MAIL_SECOND, UsersTableMap::COL_TEL, UsersTableMap::COL_MOBILE, UsersTableMap::COL_FIRST_NAME, UsersTableMap::COL_LAST_NAME, UsersTableMap::COL_TYPE, UsersTableMap::COL_UNPUBLISHED, UsersTableMap::COL_PASSWORD, UsersTableMap::COL_TOKEN, UsersTableMap::COL_PASSPORT, UsersTableMap::COL_RECOVERY, UsersTableMap::COL_IMG, UsersTableMap::COL_FACEBOOK_ID, UsersTableMap::COL_GOOGLE_ID, UsersTableMap::COL_TOWN, UsersTableMap::COL_ADDRESS, UsersTableMap::COL_ZIP, UsersTableMap::COL_ACCEPT, ],
        self::TYPE_FIELDNAME     => ['id', 'site_id', 'mail', 'mail_second', 'tel', 'mobile', 'first_name', 'last_name', 'type', 'unpublished', 'password', 'token', 'passport', 'recovery', 'img', 'facebook_id', 'google_id', 'town', 'address', 'zip', 'accept', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'SiteId' => 1, 'Mail' => 2, 'MailSecond' => 3, 'Tel' => 4, 'Mobile' => 5, 'FirstName' => 6, 'LastName' => 7, 'Type' => 8, 'Unpublished' => 9, 'Password' => 10, 'Token' => 11, 'Passport' => 12, 'Recovery' => 13, 'Img' => 14, 'FacebookId' => 15, 'GoogleId' => 16, 'Town' => 17, 'Address' => 18, 'Zip' => 19, 'Accept' => 20, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'siteId' => 1, 'mail' => 2, 'mailSecond' => 3, 'tel' => 4, 'mobile' => 5, 'firstName' => 6, 'lastName' => 7, 'type' => 8, 'unpublished' => 9, 'password' => 10, 'token' => 11, 'passport' => 12, 'recovery' => 13, 'img' => 14, 'facebookId' => 15, 'googleId' => 16, 'town' => 17, 'address' => 18, 'zip' => 19, 'accept' => 20, ],
        self::TYPE_COLNAME       => [UsersTableMap::COL_ID => 0, UsersTableMap::COL_SITE_ID => 1, UsersTableMap::COL_MAIL => 2, UsersTableMap::COL_MAIL_SECOND => 3, UsersTableMap::COL_TEL => 4, UsersTableMap::COL_MOBILE => 5, UsersTableMap::COL_FIRST_NAME => 6, UsersTableMap::COL_LAST_NAME => 7, UsersTableMap::COL_TYPE => 8, UsersTableMap::COL_UNPUBLISHED => 9, UsersTableMap::COL_PASSWORD => 10, UsersTableMap::COL_TOKEN => 11, UsersTableMap::COL_PASSPORT => 12, UsersTableMap::COL_RECOVERY => 13, UsersTableMap::COL_IMG => 14, UsersTableMap::COL_FACEBOOK_ID => 15, UsersTableMap::COL_GOOGLE_ID => 16, UsersTableMap::COL_TOWN => 17, UsersTableMap::COL_ADDRESS => 18, UsersTableMap::COL_ZIP => 19, UsersTableMap::COL_ACCEPT => 20, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'site_id' => 1, 'mail' => 2, 'mail_second' => 3, 'tel' => 4, 'mobile' => 5, 'first_name' => 6, 'last_name' => 7, 'type' => 8, 'unpublished' => 9, 'password' => 10, 'token' => 11, 'passport' => 12, 'recovery' => 13, 'img' => 14, 'facebook_id' => 15, 'google_id' => 16, 'town' => 17, 'address' => 18, 'zip' => 19, 'accept' => 20, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Users.Id' => 'ID',
        'id' => 'ID',
        'users.id' => 'ID',
        'UsersTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'SiteId' => 'SITE_ID',
        'Users.SiteId' => 'SITE_ID',
        'siteId' => 'SITE_ID',
        'users.siteId' => 'SITE_ID',
        'UsersTableMap::COL_SITE_ID' => 'SITE_ID',
        'COL_SITE_ID' => 'SITE_ID',
        'site_id' => 'SITE_ID',
        'users.site_id' => 'SITE_ID',
        'Mail' => 'MAIL',
        'Users.Mail' => 'MAIL',
        'mail' => 'MAIL',
        'users.mail' => 'MAIL',
        'UsersTableMap::COL_MAIL' => 'MAIL',
        'COL_MAIL' => 'MAIL',
        'MailSecond' => 'MAIL_SECOND',
        'Users.MailSecond' => 'MAIL_SECOND',
        'mailSecond' => 'MAIL_SECOND',
        'users.mailSecond' => 'MAIL_SECOND',
        'UsersTableMap::COL_MAIL_SECOND' => 'MAIL_SECOND',
        'COL_MAIL_SECOND' => 'MAIL_SECOND',
        'mail_second' => 'MAIL_SECOND',
        'users.mail_second' => 'MAIL_SECOND',
        'Tel' => 'TEL',
        'Users.Tel' => 'TEL',
        'tel' => 'TEL',
        'users.tel' => 'TEL',
        'UsersTableMap::COL_TEL' => 'TEL',
        'COL_TEL' => 'TEL',
        'Mobile' => 'MOBILE',
        'Users.Mobile' => 'MOBILE',
        'mobile' => 'MOBILE',
        'users.mobile' => 'MOBILE',
        'UsersTableMap::COL_MOBILE' => 'MOBILE',
        'COL_MOBILE' => 'MOBILE',
        'FirstName' => 'FIRST_NAME',
        'Users.FirstName' => 'FIRST_NAME',
        'firstName' => 'FIRST_NAME',
        'users.firstName' => 'FIRST_NAME',
        'UsersTableMap::COL_FIRST_NAME' => 'FIRST_NAME',
        'COL_FIRST_NAME' => 'FIRST_NAME',
        'first_name' => 'FIRST_NAME',
        'users.first_name' => 'FIRST_NAME',
        'LastName' => 'LAST_NAME',
        'Users.LastName' => 'LAST_NAME',
        'lastName' => 'LAST_NAME',
        'users.lastName' => 'LAST_NAME',
        'UsersTableMap::COL_LAST_NAME' => 'LAST_NAME',
        'COL_LAST_NAME' => 'LAST_NAME',
        'last_name' => 'LAST_NAME',
        'users.last_name' => 'LAST_NAME',
        'Type' => 'TYPE',
        'Users.Type' => 'TYPE',
        'type' => 'TYPE',
        'users.type' => 'TYPE',
        'UsersTableMap::COL_TYPE' => 'TYPE',
        'COL_TYPE' => 'TYPE',
        'Unpublished' => 'UNPUBLISHED',
        'Users.Unpublished' => 'UNPUBLISHED',
        'unpublished' => 'UNPUBLISHED',
        'users.unpublished' => 'UNPUBLISHED',
        'UsersTableMap::COL_UNPUBLISHED' => 'UNPUBLISHED',
        'COL_UNPUBLISHED' => 'UNPUBLISHED',
        'Password' => 'PASSWORD',
        'Users.Password' => 'PASSWORD',
        'password' => 'PASSWORD',
        'users.password' => 'PASSWORD',
        'UsersTableMap::COL_PASSWORD' => 'PASSWORD',
        'COL_PASSWORD' => 'PASSWORD',
        'Token' => 'TOKEN',
        'Users.Token' => 'TOKEN',
        'token' => 'TOKEN',
        'users.token' => 'TOKEN',
        'UsersTableMap::COL_TOKEN' => 'TOKEN',
        'COL_TOKEN' => 'TOKEN',
        'Passport' => 'PASSPORT',
        'Users.Passport' => 'PASSPORT',
        'passport' => 'PASSPORT',
        'users.passport' => 'PASSPORT',
        'UsersTableMap::COL_PASSPORT' => 'PASSPORT',
        'COL_PASSPORT' => 'PASSPORT',
        'Recovery' => 'RECOVERY',
        'Users.Recovery' => 'RECOVERY',
        'recovery' => 'RECOVERY',
        'users.recovery' => 'RECOVERY',
        'UsersTableMap::COL_RECOVERY' => 'RECOVERY',
        'COL_RECOVERY' => 'RECOVERY',
        'Img' => 'IMG',
        'Users.Img' => 'IMG',
        'img' => 'IMG',
        'users.img' => 'IMG',
        'UsersTableMap::COL_IMG' => 'IMG',
        'COL_IMG' => 'IMG',
        'FacebookId' => 'FACEBOOK_ID',
        'Users.FacebookId' => 'FACEBOOK_ID',
        'facebookId' => 'FACEBOOK_ID',
        'users.facebookId' => 'FACEBOOK_ID',
        'UsersTableMap::COL_FACEBOOK_ID' => 'FACEBOOK_ID',
        'COL_FACEBOOK_ID' => 'FACEBOOK_ID',
        'facebook_id' => 'FACEBOOK_ID',
        'users.facebook_id' => 'FACEBOOK_ID',
        'GoogleId' => 'GOOGLE_ID',
        'Users.GoogleId' => 'GOOGLE_ID',
        'googleId' => 'GOOGLE_ID',
        'users.googleId' => 'GOOGLE_ID',
        'UsersTableMap::COL_GOOGLE_ID' => 'GOOGLE_ID',
        'COL_GOOGLE_ID' => 'GOOGLE_ID',
        'google_id' => 'GOOGLE_ID',
        'users.google_id' => 'GOOGLE_ID',
        'Town' => 'TOWN',
        'Users.Town' => 'TOWN',
        'town' => 'TOWN',
        'users.town' => 'TOWN',
        'UsersTableMap::COL_TOWN' => 'TOWN',
        'COL_TOWN' => 'TOWN',
        'Address' => 'ADDRESS',
        'Users.Address' => 'ADDRESS',
        'address' => 'ADDRESS',
        'users.address' => 'ADDRESS',
        'UsersTableMap::COL_ADDRESS' => 'ADDRESS',
        'COL_ADDRESS' => 'ADDRESS',
        'Zip' => 'ZIP',
        'Users.Zip' => 'ZIP',
        'zip' => 'ZIP',
        'users.zip' => 'ZIP',
        'UsersTableMap::COL_ZIP' => 'ZIP',
        'COL_ZIP' => 'ZIP',
        'Accept' => 'ACCEPT',
        'Users.Accept' => 'ACCEPT',
        'accept' => 'ACCEPT',
        'users.accept' => 'ACCEPT',
        'UsersTableMap::COL_ACCEPT' => 'ACCEPT',
        'COL_ACCEPT' => 'ACCEPT',
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
        $this->setName('users');
        $this->setPhpName('Users');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ps\\Users');
        $this->setPackage('Ps');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('site_id', 'SiteId', 'INTEGER', false, null, null);
        $this->addColumn('mail', 'Mail', 'VARCHAR', false, 255, null);
        $this->addColumn('mail_second', 'MailSecond', 'VARCHAR', false, 255, null);
        $this->addColumn('tel', 'Tel', 'VARCHAR', false, 255, null);
        $this->addColumn('mobile', 'Mobile', 'VARCHAR', false, 255, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 255, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 255, null);
        $this->addColumn('type', 'Type', 'INTEGER', false, null, null);
        $this->addColumn('unpublished', 'Unpublished', 'INTEGER', false, null, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('token', 'Token', 'VARCHAR', false, 500, null);
        $this->addColumn('passport', 'Passport', 'VARCHAR', false, 255, null);
        $this->addColumn('recovery', 'Recovery', 'VARCHAR', false, 255, null);
        $this->addColumn('img', 'Img', 'VARCHAR', false, 255, null);
        $this->addColumn('facebook_id', 'FacebookId', 'VARCHAR', false, 255, null);
        $this->addColumn('google_id', 'GoogleId', 'VARCHAR', false, 255, null);
        $this->addColumn('town', 'Town', 'VARCHAR', false, 255, null);
        $this->addColumn('address', 'Address', 'VARCHAR', false, 255, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', false, 100, null);
        $this->addColumn('accept', 'Accept', 'INTEGER', false, null, null);
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
        return $withPrefix ? UsersTableMap::CLASS_DEFAULT : UsersTableMap::OM_CLASS;
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
     * @return array (Users object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = UsersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UsersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsersTableMap::OM_CLASS;
            /** @var Users $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UsersTableMap::addInstanceToPool($obj, $key);
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
            $key = UsersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Users $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UsersTableMap::COL_ID);
            $criteria->addSelectColumn(UsersTableMap::COL_SITE_ID);
            $criteria->addSelectColumn(UsersTableMap::COL_MAIL);
            $criteria->addSelectColumn(UsersTableMap::COL_MAIL_SECOND);
            $criteria->addSelectColumn(UsersTableMap::COL_TEL);
            $criteria->addSelectColumn(UsersTableMap::COL_MOBILE);
            $criteria->addSelectColumn(UsersTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(UsersTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(UsersTableMap::COL_TYPE);
            $criteria->addSelectColumn(UsersTableMap::COL_UNPUBLISHED);
            $criteria->addSelectColumn(UsersTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(UsersTableMap::COL_TOKEN);
            $criteria->addSelectColumn(UsersTableMap::COL_PASSPORT);
            $criteria->addSelectColumn(UsersTableMap::COL_RECOVERY);
            $criteria->addSelectColumn(UsersTableMap::COL_IMG);
            $criteria->addSelectColumn(UsersTableMap::COL_FACEBOOK_ID);
            $criteria->addSelectColumn(UsersTableMap::COL_GOOGLE_ID);
            $criteria->addSelectColumn(UsersTableMap::COL_TOWN);
            $criteria->addSelectColumn(UsersTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(UsersTableMap::COL_ZIP);
            $criteria->addSelectColumn(UsersTableMap::COL_ACCEPT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.site_id');
            $criteria->addSelectColumn($alias . '.mail');
            $criteria->addSelectColumn($alias . '.mail_second');
            $criteria->addSelectColumn($alias . '.tel');
            $criteria->addSelectColumn($alias . '.mobile');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.unpublished');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.token');
            $criteria->addSelectColumn($alias . '.passport');
            $criteria->addSelectColumn($alias . '.recovery');
            $criteria->addSelectColumn($alias . '.img');
            $criteria->addSelectColumn($alias . '.facebook_id');
            $criteria->addSelectColumn($alias . '.google_id');
            $criteria->addSelectColumn($alias . '.town');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.accept');
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
            $criteria->removeSelectColumn(UsersTableMap::COL_ID);
            $criteria->removeSelectColumn(UsersTableMap::COL_SITE_ID);
            $criteria->removeSelectColumn(UsersTableMap::COL_MAIL);
            $criteria->removeSelectColumn(UsersTableMap::COL_MAIL_SECOND);
            $criteria->removeSelectColumn(UsersTableMap::COL_TEL);
            $criteria->removeSelectColumn(UsersTableMap::COL_MOBILE);
            $criteria->removeSelectColumn(UsersTableMap::COL_FIRST_NAME);
            $criteria->removeSelectColumn(UsersTableMap::COL_LAST_NAME);
            $criteria->removeSelectColumn(UsersTableMap::COL_TYPE);
            $criteria->removeSelectColumn(UsersTableMap::COL_UNPUBLISHED);
            $criteria->removeSelectColumn(UsersTableMap::COL_PASSWORD);
            $criteria->removeSelectColumn(UsersTableMap::COL_TOKEN);
            $criteria->removeSelectColumn(UsersTableMap::COL_PASSPORT);
            $criteria->removeSelectColumn(UsersTableMap::COL_RECOVERY);
            $criteria->removeSelectColumn(UsersTableMap::COL_IMG);
            $criteria->removeSelectColumn(UsersTableMap::COL_FACEBOOK_ID);
            $criteria->removeSelectColumn(UsersTableMap::COL_GOOGLE_ID);
            $criteria->removeSelectColumn(UsersTableMap::COL_TOWN);
            $criteria->removeSelectColumn(UsersTableMap::COL_ADDRESS);
            $criteria->removeSelectColumn(UsersTableMap::COL_ZIP);
            $criteria->removeSelectColumn(UsersTableMap::COL_ACCEPT);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.site_id');
            $criteria->removeSelectColumn($alias . '.mail');
            $criteria->removeSelectColumn($alias . '.mail_second');
            $criteria->removeSelectColumn($alias . '.tel');
            $criteria->removeSelectColumn($alias . '.mobile');
            $criteria->removeSelectColumn($alias . '.first_name');
            $criteria->removeSelectColumn($alias . '.last_name');
            $criteria->removeSelectColumn($alias . '.type');
            $criteria->removeSelectColumn($alias . '.unpublished');
            $criteria->removeSelectColumn($alias . '.password');
            $criteria->removeSelectColumn($alias . '.token');
            $criteria->removeSelectColumn($alias . '.passport');
            $criteria->removeSelectColumn($alias . '.recovery');
            $criteria->removeSelectColumn($alias . '.img');
            $criteria->removeSelectColumn($alias . '.facebook_id');
            $criteria->removeSelectColumn($alias . '.google_id');
            $criteria->removeSelectColumn($alias . '.town');
            $criteria->removeSelectColumn($alias . '.address');
            $criteria->removeSelectColumn($alias . '.zip');
            $criteria->removeSelectColumn($alias . '.accept');
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
        return Propel::getServiceContainer()->getDatabaseMap(UsersTableMap::DATABASE_NAME)->getTable(UsersTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Users or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Users object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ps\Users) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsersTableMap::DATABASE_NAME);
            $criteria->add(UsersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = UsersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UsersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UsersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return UsersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Users or Criteria object.
     *
     * @param mixed $criteria Criteria or Users object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Users object
        }

        if ($criteria->containsKey(UsersTableMap::COL_ID) && $criteria->keyContainsValue(UsersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = UsersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
