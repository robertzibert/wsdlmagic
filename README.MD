#Wsdl Magic - Soap Client

Okey here is the case, you have to make requests to a Soap WS  Server and you start to write your code, but, with the time you notice that there is a lot of uggly sintax in your file, and you are repeating yourself to get the response of a simple query.

Wsdl Magic provides you a nice and simple sintax to make all your soap requests

```php
<?php

 $wsdl = WsdlWrapper::init([
	'url' => 'example.com/methods?wsdl'
	'trace' => true,
	'exceptions' => 1
]);
 $result = WsdlWrapper::GetSoapMethod($data);

```

 Wsdl Magic provides you a nice and customizable interface to make your requests. Here's a more complex example:

```php
<?php

WsdlMagic::init([
	'url'        => 'example.com/methods?wsdl'
	'trace'      => true,
	'exceptions' => 1
]);

WsdlMagic::setAlias([
	'GetSoapMethodToPay' => 'payment',
]);


 $result = WsdlMagic::payment($data);

```
I'm a big fan of laravel, and thats why I make a clean class to extends all your models with soap



```php
class Tracker extends WsdlMagicExtension
{
    public $wsdl = 'http://200.6.53.69:8181/axis/services/USD_R11_WebService?WSDL';
    public $trace = 1;
    public $exceptions = true;

    public function login()
    {
        return $this->makeRequest('login', [
          'username' => 'servicedesk',
          'password' => 'CAdemo123'
        ]);
    }
}
``` 
