<?php

namespace robertzibert\WsdlConnector;

use robertzibert\WsdlConnector\WsdlTools\WsdlClient;
use robertzibert\WsdlConnector\WsdlTools\WsdlRequest;
use robertzibert\WsdlConnector\WsdlTools\WsdlResponse;

/**
 * This is the Wrapper of functions, with this
 * class you can call static functions
 */

class WsdlMagic
{
    public static $client;
    public static $request;
    public static $response;
    public static $aliases;

    public static function init(array $options)
    {

        self::$client = (new WsdlClient($options['url'], $options))->connect();

        return self::$client;
    }


    public static function __callStatic($method, array $params = null)
    {
        if (self::$aliases[$method]) {
            $method = self::$aliases[$method];
        }

        $result = self::makeRequest($method, $params[0]);

        return $result;
    }

    public static function makeRequest($method, array $array = null)
    {
        self::$request = (new WsdlRequest(self::$client))->call($method, $array);

        self::$response = (new WsdlResponse(self::$request))->get();

        return self::$response;
    }

    public static function setAlias($aliases)
    {
        self::$aliases = $aliases;

        return self::$aliases;
    }
}
