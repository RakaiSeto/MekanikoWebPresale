<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: salesactivity.proto

namespace SalesActivity;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>SalesActivity.SalesActivityUploadData</code>
 */
class SalesActivityUploadData extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string code = 1;</code>
     */
    protected $code = '';
    /**
     * Generated from protobuf field <code>string base63 = 2;</code>
     */
    protected $base63 = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $code
     *     @type string $base63
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Salesactivity::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string code = 1;</code>
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Generated from protobuf field <code>string code = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->code = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string base63 = 2;</code>
     * @return string
     */
    public function getBase63()
    {
        return $this->base63;
    }

    /**
     * Generated from protobuf field <code>string base63 = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setBase63($var)
    {
        GPBUtil::checkString($var, True);
        $this->base63 = $var;

        return $this;
    }

}
