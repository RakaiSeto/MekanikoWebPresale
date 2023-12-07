<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: presale.proto

namespace Presales;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Presales.PresalesViewList</code>
 */
class PresalesViewList extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string principalid = 1;</code>
     */
    protected $principalid = '';
    /**
     * Generated from protobuf field <code>string company = 2;</code>
     */
    protected $company = '';
    /**
     * Generated from protobuf field <code>string brandname = 3;</code>
     */
    protected $brandname = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $principalid
     *     @type string $company
     *     @type string $brandname
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Presale::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string principalid = 1;</code>
     * @return string
     */
    public function getPrincipalid()
    {
        return $this->principalid;
    }

    /**
     * Generated from protobuf field <code>string principalid = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPrincipalid($var)
    {
        GPBUtil::checkString($var, True);
        $this->principalid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string company = 2;</code>
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Generated from protobuf field <code>string company = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCompany($var)
    {
        GPBUtil::checkString($var, True);
        $this->company = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string brandname = 3;</code>
     * @return string
     */
    public function getBrandname()
    {
        return $this->brandname;
    }

    /**
     * Generated from protobuf field <code>string brandname = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setBrandname($var)
    {
        GPBUtil::checkString($var, True);
        $this->brandname = $var;

        return $this;
    }

}

