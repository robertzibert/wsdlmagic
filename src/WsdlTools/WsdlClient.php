<?php

namespace robertzibert\WsdlConnector\WsdlTools;

/**
 *  This class just open and handle the connection
 */
class WsdlClient
{
    // Required to make a connection
    public $wsdl;

    public $options;


    public function __construct($wsdl, array $options = null)
    {
        $this->wsdl    = $wsdl;

        $this->options = $options;
    }

    public function connect()
    {
        $this->connection =  new \SoapClient($this->wsdl, $this->options);

        return $this;
    }

    /*
    public function obtainUsefulResponse($method)
    {
        $this->response = $this->response['Body'][$method . 'Response'];
        return $this;
    }
    */
}
