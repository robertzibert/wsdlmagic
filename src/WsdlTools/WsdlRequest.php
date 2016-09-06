<?php

namespace robertzibert\WsdlConnector\WsdlTools;

use robertzibert\WsdlConnector\WsdlTools\WsdlClient;

/**
 *  This Class take WsdlClient Object and create a request
 */
class WsdlRequest
{
    public $client;

    public $result;

    public function __construct(WsdlClient $wsdlConnection)
    {
        $this->client = $wsdlConnection->connection;
    }
    /**
     *  Call an specific method of WS and store it into SoapClient Object
     */
    public function call($method, array $params = null)
    {

        $this->result = $this->client->__call($method, [$method=>$params]);

        return $this;
    }
}
