<?php

namespace UhCx\Tests\Manager;

use PHPUnit_Framework_TestCase;
use UhCx\Manager\Shortener;

/**
 * Class ShortenerTest
 *
 * @package UhCx\Tests\Manager
 */
class ShortenerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test shorten link.
     */
    public function testShortenLink()
    {
        $link = Shortener::shorten('http://www.google.de/');

        $this->assertInstanceOf('UhCx\Model\Link', $link);
        $this->assertEquals('http://www.google.de/', $link->getOriginal());
    }

    /**
     * @expectedException \UhCx\Exception\CouldNotShortenLinkException
     * @expectedExceptionMessage Please specify a valid link.
     */
    public function testShortenInvalidLink()
    {
        Shortener::shorten('http://uh.cx/asdss');
    }
}
