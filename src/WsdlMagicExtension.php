<?php

namespace robertzibert\WsdlConnector;

use robertzibert\WsdlConnector\WsdlTools\WsdlClient;
use robertzibert\WsdlConnector\WsdlTools\WsdlRequest;
use robertzibert\WsdlConnector\WsdlTools\WsdlResponse;

class WsdlMagicExtension
{

    public $wsdl;
    public $trace;
    public $exceptions;

    public function makeRequest($method, $data)
    {
        $wsdl = (new WsdlClient($this->wsdl, [
          'trace'      => $this->trace,
          'exceptions' => $this->exceptions
        ]))->connect();

        $request = (new WsdlRequest($wsdl))->call($method, $data);


        $response = (new WsdlResponse($request))->get();

        return $response;
    }
}
