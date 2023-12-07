<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: presale.proto

namespace Presales;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Presales.PresalesViewResponse</code>
 */
class PresalesViewResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string status = 1;</code>
     */
    protected $status = '';
    /**
     * Generated from protobuf field <code>string description = 2;</code>
     */
    protected $description = '';
    /**
     * Generated from protobuf field <code>repeated .Presales.PresalesViewList results = 3;</code>
     */
    private $results;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $status
     *     @type string $description
     *     @type array<\Presales\PresalesViewList>|\Google\Protobuf\Internal\RepeatedField $results
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Presale::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string status = 1;</code>
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Generated from protobuf field <code>string status = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkString($var, True);
        $this->status = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string description = 2;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Generated from protobuf field <code>string description = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .Presales.PresalesViewList results = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Generated from protobuf field <code>repeated .Presales.PresalesViewList results = 3;</code>
     * @param array<\Presales\PresalesViewList>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Presales\PresalesViewList::class);
        $this->results = $arr;

        return $this;
    }

}

