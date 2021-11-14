<?php
// GENERATED CODE -- DO NOT EDIT!

namespace MGenerator;

/**
 */
class MissionGeneratorClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \MGenerator\GenerateMissionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Generate(\MGenerator\GenerateMissionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mGenerator.MissionGenerator/Generate',
        $argument,
        ['\MGenerator\Mission', 'decode'],
        $metadata, $options);
    }

}
