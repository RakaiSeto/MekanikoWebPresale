<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: presale.proto

namespace Presales;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Presales.PresalesViewRequest</code>
 */
class PresalesViewRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string signature = 1;</code>
     */
    protected $signature = '';
    /**
     * Generated from protobuf field <code>string remoteip = 2;</code>
     */
    protected $remoteip = '';
    /**
     * Generated from protobuf field <code>string weburl = 3;</code>
     */
    protected $weburl = '';
    /**
     * Generated from protobuf field <code>string langid = 4;</code>
     */
    protected $langid = '';
    /**
     * Generated from protobuf field <code>string userid = 5;</code>
     */
    protected $userid = '';
    /**
     * Generated from protobuf field <code>string email = 6;</code>
     */
    protected $email = '';
    /**
     * Generated from protobuf field <code>string adminid = 7;</code>
     */
    protected $adminid = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $signature
     *     @type string $remoteip
     *     @type string $weburl
     *     @type string $langid
     *     @type string $userid
     *     @type string $email
     *     @type string $adminid
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Presale::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string signature = 1;</code>
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Generated from protobuf field <code>string signature = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSignature($var)
    {
        GPBUtil::checkString($var, True);
        $this->signature = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string remoteip = 2;</code>
     * @return string
     */
    public function getRemoteip()
    {
        return $this->remoteip;
    }

    /**
     * Generated from protobuf field <code>string remoteip = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRemoteip($var)
    {
        GPBUtil::checkString($var, True);
        $this->remoteip = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string weburl = 3;</code>
     * @return string
     */
    public function getWeburl()
    {
        return $this->weburl;
    }

    /**
     * Generated from protobuf field <code>string weburl = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setWeburl($var)
    {
        GPBUtil::checkString($var, True);
        $this->weburl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string langid = 4;</code>
     * @return string
     */
    public function getLangid()
    {
        return $this->langid;
    }

    /**
     * Generated from protobuf field <code>string langid = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setLangid($var)
    {
        GPBUtil::checkString($var, True);
        $this->langid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string userid = 5;</code>
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Generated from protobuf field <code>string userid = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setUserid($var)
    {
        GPBUtil::checkString($var, True);
        $this->userid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string email = 6;</code>
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Generated from protobuf field <code>string email = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->email = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string adminid = 7;</code>
     * @return string
     */
    public function getAdminid()
    {
        return $this->adminid;
    }

    /**
     * Generated from protobuf field <code>string adminid = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setAdminid($var)
    {
        GPBUtil::checkString($var, True);
        $this->adminid = $var;

        return $this;
    }

}

