<?php
/**
 * SignatureRequestSign
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
 * SignatureRequestSign Class Doc Comment
 *
 * @category Class
 * @package  WooletClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SignatureRequestSign implements ModelInterface, ArrayAccess, \Stringable
{
    final const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'signatureRequestSign';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'signature' => 'string',
        'pub_key' => 'string',
        'signed_identity' => 'string',
        'signed_issuer_domain' => 'string',
        'identity_url' => 'string',
        'device' => 'string',
        'signee_id' => 'string',
        'otp' => 'string'];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'signature' => null,
        'pub_key' => null,
        'signed_identity' => null,
        'signed_issuer_domain' => null,
        'identity_url' => null,
        'device' => null,
        'signee_id' => null,
        'otp' => null];

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
        'signature' => 'signature',
        'pub_key' => 'pubKey',
        'signed_identity' => 'signedIdentity',
        'signed_issuer_domain' => 'signedIssuerDomain',
        'identity_url' => 'identityURL',
        'device' => 'device',
        'signee_id' => 'signeeId',
        'otp' => 'OTP'];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'signature' => 'setSignature',
        'pub_key' => 'setPubKey',
        'signed_identity' => 'setSignedIdentity',
        'signed_issuer_domain' => 'setSignedIssuerDomain',
        'identity_url' => 'setIdentityUrl',
        'device' => 'setDevice',
        'signee_id' => 'setSigneeId',
        'otp' => 'setOtp'];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'signature' => 'getSignature',
        'pub_key' => 'getPubKey',
        'signed_identity' => 'getSignedIdentity',
        'signed_issuer_domain' => 'getSignedIssuerDomain',
        'identity_url' => 'getIdentityUrl',
        'device' => 'getDevice',
        'signee_id' => 'getSigneeId',
        'otp' => 'getOtp'];

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

    final const DEVICE_SERVER = 'SERVER';
    final const DEVICE_MOBILE = 'MOBILE';
    final const DEVICE_NANO = 'NANO';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeviceAllowableValues()
    {
        return [
            self::DEVICE_SERVER,
            self::DEVICE_MOBILE,
            self::DEVICE_NANO,];
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
        $this->container['signature'] = $data['signature'] ?? null;
        $this->container['pub_key'] = $data['pub_key'] ?? null;
        $this->container['signed_identity'] = $data['signed_identity'] ?? null;
        $this->container['signed_issuer_domain'] = $data['signed_issuer_domain'] ?? null;
        $this->container['identity_url'] = $data['identity_url'] ?? null;
        $this->container['device'] = $data['device'] ?? null;
        $this->container['signee_id'] = $data['signee_id'] ?? null;
        $this->container['otp'] = $data['otp'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['signature'] === null) {
            $invalidProperties[] = "'signature' can't be null";
        }
        if ($this->container['pub_key'] === null) {
            $invalidProperties[] = "'pub_key' can't be null";
        }
        $allowedValues = $this->getDeviceAllowableValues();
        if (!is_null($this->container['device']) && !in_array($this->container['device'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'device', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }
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
     * Gets signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->container['signature'];
    }

    /**
     * Sets signature
     *
     * @param string $signature Signature of the `hashToSign` property of the signature request using the public key `pubKey`, or, if any of `signedIdentity` or `signedIssuerDomain` is provided, signature of SHA256(`hashToSign` + `signedIdentity` + `signedIssuerDomain`) using the public key `pubKey`.
     *
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->container['signature'] = $signature;
        return $this;
    }

    /**
     * Gets pub_key
     *
     * @return string
     */
    public function getPubKey()
    {
        return $this->container['pub_key'];
    }

    /**
     * Sets pub_key
     *
     * @param string $pub_key Public key used to sign.
     *
     * @return $this
     */
    public function setPubKey($pub_key)
    {
        $this->container['pub_key'] = $pub_key;
        return $this;
    }

    /**
     * Gets signed_identity
     *
     * @return string
     */
    public function getSignedIdentity()
    {
        return $this->container['signed_identity'];
    }

    /**
     * Sets signed_identity
     *
     * @param string $signed_identity X500 Distinguished Name representing the signed identity.<br> If set, the CN (common name) and EMAILADDRESS (email address) attributes must match the common name and email address of the signer as set in the signature request.
     *
     * @return $this
     */
    public function setSignedIdentity($signed_identity)
    {
        $this->container['signed_identity'] = $signed_identity;
        return $this;
    }

    /**
     * Gets signed_issuer_domain
     *
     * @return string
     */
    public function getSignedIssuerDomain()
    {
        return $this->container['signed_issuer_domain'];
    }

    /**
     * Sets signed_issuer_domain
     *
     * @param string $signed_issuer_domain Domain name of the identity issuer (ie. of the organization who verified the identity).<br> If set, the domain name of the identity URL must be included in the `signedIssuerDomain` domain name.
     *
     * @return $this
     */
    public function setSignedIssuerDomain($signed_issuer_domain)
    {
        $this->container['signed_issuer_domain'] = $signed_issuer_domain;
        return $this;
    }

    /**
     * Gets identity_url
     *
     * @return string
     */
    public function getIdentityUrl()
    {
        return $this->container['identity_url'];
    }

    /**
     * Sets identity_url
     *
     * @param string $identity_url Web hook to use to verify the signer's identity.<br> If set, it is used in place of the `identityURL` property of the signer to create the signature anchor.
     *
     * @return $this
     */
    public function setIdentityUrl($identity_url)
    {
        $this->container['identity_url'] = $identity_url;
        return $this;
    }

    /**
     * Gets device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->container['device'];
    }

    /**
     * Sets device
     *
     * @param string $device Type of device used to sign:<br> - SERVER: Woleet.ID Server or equivalent<br> - MOBILE: Woleet.ID Mobile or equivalent<br> - NANO: Ledger Nano S or equivalent
     *
     * @return $this
     */
    public function setDevice($device)
    {
        $allowedValues = $this->getDeviceAllowableValues();
        if (!is_null($device) && !in_array($device, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'device', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['device'] = $device;
        return $this;
    }

    /**
     * Gets signee_id
     *
     * @return string
     */
    public function getSigneeId()
    {
        return $this->container['signee_id'];
    }

    /**
     * Sets signee_id
     *
     * @param string $signee_id Secret identifier of the signer (provided by email).<br> Only required if `pubKey` was not set for thìs signer.
     *
     * @return $this
     */
    public function setSigneeId($signee_id)
    {
        $this->container['signee_id'] = $signee_id;
        return $this;
    }

    /**
     * Gets otp
     *
     * @return string
     */
    public function getOtp()
    {
        return $this->container['otp'];
    }

    /**
     * Sets otp
     *
     * @param string $otp OTP of the signer (only required if `requiresOTP` was set to `true` for thìs signer).
     *
     * @return $this
     */
    public function setOtp($otp)
    {
        $this->container['otp'] = $otp;
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
