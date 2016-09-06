<?php

namespace robertzibert\WsdlConnector\WsdlTools;

/**
 *  This class are going to take a call, and extract the response
 */
class WsdlResponse extends Transformer
{
    public $request;

    public $response;

    public function __construct(WsdlRequest $WsdlRequest)
    {
        $this->request = $WsdlRequest;
    }

    public function get()
    {
        $this->response = $this->request->result;

        return $this->response;
    }

    public function toXml()
    {
        return $this->stringToXml($this->response);
    }

    public function toArray()
    {
        return $this->xmlToArray($this->stringToXml($this->response));
    }

    public function toJson()
    {
        return $this->arrayToJson($this->xmlToArray($this->stringToXml($this->response)));
    }
}
