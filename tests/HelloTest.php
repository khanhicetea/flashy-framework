<?php
use Flashy\Http\Utils;

class HelloTest extends HttpTestCase {
    public function testHelloWorld() {
        $request = Utils::makeRequest('GET', '/');
        $res = $this->sendRequest($request);
        $this->assertEquals(200, $res->getStatusCode());
    }
}