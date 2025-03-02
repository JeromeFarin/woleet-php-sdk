<?php
/**
 * X500Name
 *
 * PHP version 5
 *
 * @category Class
 * @package  WooletClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 * Woleet API
 *
 * Welcome to **Woleet API reference documentation**.<br> It is highly recommanded to read the chapters **[introducing Woleet API concepts](https://doc.woleet.io/reference)** before reading this documentation.
 *
 * OpenAPI spec version: 1.10.0
 * Contact: contact@woleet.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.27
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace WooletClient\Model;

use \ArrayAccess;
use \WooletClient\ObjectSerializer;

/**
 * X500Name Class Doc Comment
 *
 * @category Class
 * @description X500 Distinguished Name.
 * @package  WooletClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class X500Name implements ModelInterface, ArrayAccess, \Stringable
{
    final const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'X500Name';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'c' => 'string',
        'st' => 'string',
        'l' => 'string',
        'o' => 'string',
        'ou' => 'string',
        'cn' => 'string',
        'emailaddress' => 'string'];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'c' => null,
        'st' => null,
        'l' => null,
        'o' => null,
        'ou' => null,
        'cn' => null,
        'emailaddress' => null];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'c' => 'C',
        'st' => 'ST',
        'l' => 'L',
        'o' => 'O',
        'ou' => 'OU',
        'cn' => 'CN',
        'emailaddress' => 'EMAILADDRESS'];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'c' => 'setC',
        'st' => 'setSt',
        'l' => 'setL',
        'o' => 'setO',
        'ou' => 'setOu',
        'cn' => 'setCn',
        'emailaddress' => 'setEmailaddress'];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'c' => 'getC',
        'st' => 'getSt',
        'l' => 'getL',
        'o' => 'getO',
        'ou' => 'getOu',
        'cn' => 'getCn',
        'emailaddress' => 'getEmailaddress'];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['c'] = $data['c'] ?? null;
        $this->container['st'] = $data['st'] ?? null;
        $this->container['l'] = $data['l'] ?? null;
        $this->container['o'] = $data['o'] ?? null;
        $this->container['ou'] = $data['ou'] ?? null;
        $this->container['cn'] = $data['cn'] ?? null;
        $this->container['emailaddress'] = $data['emailaddress'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets c
     *
     * @return string
     */
    public function getC()
    {
        return $this->container['c'];
    }

    /**
     * Sets c
     *
     * @param string $c Country code
     *
     * @return $this
     */
    public function setC($c)
    {
        $this->container['c'] = $c;
        return $this;
    }

    /**
     * Gets st
     *
     * @return string
     */
    public function getSt()
    {
        return $this->container['st'];
    }

    /**
     * Sets st
     *
     * @param string $st State or Province
     *
     * @return $this
     */
    public function setSt($st)
    {
        $this->container['st'] = $st;
        return $this;
    }

    /**
     * Gets l
     *
     * @return string
     */
    public function getL()
    {
        return $this->container['l'];
    }

    /**
     * Sets l
     *
     * @param string $l Locality
     *
     * @return $this
     */
    public function setL($l)
    {
        $this->container['l'] = $l;
        return $this;
    }

    /**
     * Gets o
     *
     * @return string
     */
    public function getO()
    {
        return $this->container['o'];
    }

    /**
     * Sets o
     *
     * @param string $o Organization
     *
     * @return $this
     */
    public function setO($o)
    {
        $this->container['o'] = $o;
        return $this;
    }

    /**
     * Gets ou
     *
     * @return string
     */
    public function getOu()
    {
        return $this->container['ou'];
    }

    /**
     * Sets ou
     *
     * @param string $ou Organizational Unit
     *
     * @return $this
     */
    public function setOu($ou)
    {
        $this->container['ou'] = $ou;
        return $this;
    }

    /**
     * Gets cn
     *
     * @return string
     */
    public function getCn()
    {
        return $this->container['cn'];
    }

    /**
     * Sets cn
     *
     * @param string $cn Common Name
     *
     * @return $this
     */
    public function setCn($cn)
    {
        $this->container['cn'] = $cn;
        return $this;
    }

    /**
     * Gets emailaddress
     *
     * @return string
     */
    public function getEmailaddress()
    {
        return $this->container['emailaddress'];
    }

    /**
     * Sets emailaddress
     *
     * @param string $emailaddress Email address
     *
     * @return $this
     */
    public function setEmailaddress($emailaddress)
    {
        $this->container['emailaddress'] = $emailaddress;
        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed $value Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, mixed $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return (string) json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return (string) json_encode(ObjectSerializer::sanitizeForSerialization($this), JSON_THROW_ON_ERROR);
    }
}
