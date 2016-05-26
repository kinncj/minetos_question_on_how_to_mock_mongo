<?php
class ClientTest extends PHPUnit_Framework_TestCase
{
    public function testShouldMockClient()
    {
	$client = $this->getClientMock();

       $this->assertEquals('users', (string) $client->users);
    }

    private function getDatabaseMock()
    {
        $mock = $this->getMockBuilder('MongoDB\Database')->disableOriginalConstructor()->getMock();

        $mock->expects($this->any())->method('__toString')->will($this->returnValue('users'));

	return $mock;
    }
    
    private function getClientMock()
    {
	$mock = $this->getMockBuilder('MongoDB\Client')->disableOriginalConstructor()->getMock();
        
        $mock->expects($this->any())->method('__get')->will($this->returnValue($this->getDatabaseMock()));

	return $mock;
    }
}
