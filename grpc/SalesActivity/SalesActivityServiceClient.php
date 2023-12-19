<?php
// GENERATED CODE -- DO NOT EDIT!

namespace SalesActivity;

/**
 */
class SalesActivityServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \SalesActivity\SalesActivityLoginRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DoSalesActivityLogin(\SalesActivity\SalesActivityLoginRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/SalesActivity.SalesActivityService/DoSalesActivityLogin',
        $argument,
        ['\SalesActivity\SalesActivityLoginResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \SalesActivity\SalesActivitySaveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DoSalesActivitySave(\SalesActivity\SalesActivitySaveRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/SalesActivity.SalesActivityService/DoSalesActivitySave',
        $argument,
        ['\SalesActivity\SalesActivitySaveResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \SalesActivity\SalesActivityUploadRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DoSalesActivityUpload(\SalesActivity\SalesActivityUploadRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/SalesActivity.SalesActivityService/DoSalesActivityUpload',
        $argument,
        ['\SalesActivity\SalesActivityUploadResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \SalesActivity\SalesActivityDeleteSessionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DoSalesActivityDeleteSession(\SalesActivity\SalesActivityDeleteSessionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/SalesActivity.SalesActivityService/DoSalesActivityDeleteSession',
        $argument,
        ['\SalesActivity\SalesActivityDeleteSessionResponse', 'decode'],
        $metadata, $options);
    }

}
