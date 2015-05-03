<?php

namespace UhCx\Manager;

use Buzz\Browser;
use UhCx\Exception\CouldNotParseReplyException;
use UhCx\Exception\CouldNotShortenLinkException;
use UhCx\Model\Link;

/**
 * Class Shortener
 *
 * @package UhCx\Manager
 */
class Shortener
{
    const API_URL = 'http://uh.cx/api/create';

    /**
     * Shorten an URL.
     *
     * @param string $url
     * @return Link
     * @throws CouldNotParseReplyException Unexpected errors.
     * @throws CouldNotShortenLinkException Invalid URLs.
     */
    static public function shorten($url)
    {
        $browser  = new Browser();
        $response = $browser->post(
            self::API_URL,
            array(
                'Content-type' => 'application/json',
            ),
            json_encode(array('url' => $url))
        );

        if (stripos($response->getContent(), 'Please specify a valid link.') === 0) {
            throw new CouldNotShortenLinkException('Please specify a valid link.');
        }

        $decoded = json_decode($response->getContent(), true);
        self::checkReply($decoded);

        $link = new Link(
            $decoded['UrlOriginal'],
            $decoded['UrlDirect'],
            $decoded['UrlPreview'],
            $decoded['QrDirect'],
            $decoded['QrPreview']
        );

        return $link;
    }

    /**
     * @param mixed $reply
     * @throws CouldNotParseReplyException
     */
    static private function checkReply($reply)
    {
        $fields = array('UrlPreview', 'UrlDirect', 'UrlOriginal', 'QrPreview', 'QrDirect');

        if (!is_array($reply)) {
            throw new CouldNotParseReplyException($reply);
        }

        foreach ($fields as $name) {
            if (!array_key_exists($name, $reply)) {
                throw new CouldNotParseReplyException($reply);
            }
        }
    }
}
