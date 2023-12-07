<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: presale.proto

namespace Presales;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Presales.PresalesLoginList</code>
 */
class PresalesLoginList extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string signature = 1;</code>
     */
    protected $signature = '';
    /**
     * Generated from protobuf field <code>string langid = 2;</code>
     */
    protected $langid = '';
    /**
     * Generated from protobuf field <code>string userid = 3;</code>
     */
    protected $userid = '';
    /**
     * Generated from protobuf field <code>string username = 4;</code>
     */
    protected $username = '';
    /**
     * Generated from protobuf field <code>string email = 5;</code>
     */
    protected $email = '';
    /**
     * Generated from protobuf field <code>string roleid = 6;</code>
     */
    protected $roleid = '';
    /**
     * Generated from protobuf field <code>string role = 7;</code>
     */
    protected $role = '';
    /**
     * Generated from protobuf field <code>string firstname = 8;</code>
     */
    protected $firstname = '';
    /**
     * Generated from protobuf field <code>string lastname = 9;</code>
     */
    protected $lastname = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $signature
     *     @type string $langid
     *     @type string $userid
     *     @type string $username
     *     @type string $email
     *     @type string $roleid
     *     @type string $role
     *     @type string $firstname
     *     @type string $lastname
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
     * Generated from protobuf field <code>string langid = 2;</code>
     * @return string
     */
    public function getLangid()
    {
        return $this->langid;
    }

    /**
     * Generated from protobuf field <code>string langid = 2;</code>
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
     * Generated from protobuf field <code>string userid = 3;</code>
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Generated from protobuf field <code>string userid = 3;</code>
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
     * Generated from protobuf field <code>string username = 4;</code>
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Generated from protobuf field <code>string username = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setUsername($var)
    {
        GPBUtil::checkString($var, True);
        $this->username = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string email = 5;</code>
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Generated from protobuf field <code>string email = 5;</code>
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
     * Generated from protobuf field <code>string roleid = 6;</code>
     * @return string
     */
    public function getRoleid()
    {
        return $this->roleid;
    }

    /**
     * Generated from protobuf field <code>string roleid = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setRoleid($var)
    {
        GPBUtil::checkString($var, True);
        $this->roleid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string role = 7;</code>
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Generated from protobuf field <code>string role = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setRole($var)
    {
        GPBUtil::checkString($var, True);
        $this->role = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string firstname = 8;</code>
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Generated from protobuf field <code>string firstname = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setFirstname($var)
    {
        GPBUtil::checkString($var, True);
        $this->firstname = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string lastname = 9;</code>
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Generated from protobuf field <code>string lastname = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setLastname($var)
    {
        GPBUtil::checkString($var, True);
        $this->lastname = $var;

        return $this;
    }

}
