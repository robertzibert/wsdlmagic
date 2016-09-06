<?php
namespace robertzibert\WsdlConnector\WsdlTools;

/**
 * This Class Transform Responses
 */
class Transformer
{
    public function stringToXml($response)
    {
        $clean_xml      = str_ireplace(['soapenv:', 'soap:'], '', $this->response);
        $xml            = simplexml_load_string($clean_xml);
        return $xml;
    }

    public function xmlToArray($xmlObject, $out = array ())
    {

        foreach ((array) $xmlObject as $index => $node) {
            $array[$index] = (is_object($node)) ? $this->xmlToArray($node) : $node;
        }

        return $array;
    }
    public function arrayToJson($array)
    {
      return json_encode($array);
    }
}
