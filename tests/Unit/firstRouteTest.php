<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase; //changed as below, as seen on https://www.youtube.com/watch?v=UjA-16diixc&t=920s"
use Tests\TestCase;

class firstRouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        //$this->assertTrue(true);
        $response = $this->get('api/firstRoute/firstEndPoint');
        $response->assertStatus(200);
    }

    public function test_inspectResponse(){
        $response = $this->get('api/secondRoute/secondEndPoint');
        $response->assertSee("fucking", $escaped = true);
        //$escaped is true for escaping special characters
    }

    public function test_inspectJSON(){
        $response = $this->get('api/thirdRoute/thirdEndPoint');
        $expected=array("message"=>"fucked","result"=>true);
        $response->assertJson($expected, $strict = false);
        //checked the keys and values (exactly) are presented in the response
        //$strict is false then it allows other keys and values also
            //not specified in the test
            //when $strict=true, then other keys and values aren't allowed!

    }
}
