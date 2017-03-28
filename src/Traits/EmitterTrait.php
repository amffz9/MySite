<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 12/3/16
 * Time: 4:43 PM
 */

namespace Traits;


use Psr\Http\Message\ResponseInterface;

trait EmitterTrait
{
    function emit(ResponseInterface $response)
    {
        /*Taken mostly from the Slim Framework*/

        /*Send the headers if they have not already been sent*/
        if (!headers_sent()) {
            header(sprintf('HTTP/%s %s %s',
                $response->getProtocolVersion(),
                $response->getStatusCode(),
                $response->getReasonPhrase()
            ));

            /*Send the headers out*/
            foreach ($response->getHeaders() as $name => $values) {
                foreach ($values as $value) {
                    header(sprintf('%s: %s', $name, $value), false);
                }
            }
        }

        $body = $response->getBody();
        /*Maybe load some settings here*/
        //Get chunk size if you want a custom chunk size
        $chunkSize = 1024; //I have not idea what affect this has so I have no reason to change

        /*Make sure we are reading from the beginning*/
        if ($body->isSeekable()) {
            $body->rewind();
        }

        /*Get the content length*/
        $contentLength = $response->getHeaderLine('Content-Length');

        /*If there is no set content length*/
        if (!$contentLength) {
            /*Set it*/
            $contentLength = $body->getSize();
        }

        $amountToRead = $contentLength;

        while ($amountToRead > 0 && !$body->eof()) {
            $data = $body->read(min($chunkSize, $amountToRead));
            echo $data;
            $amountToRead -= strlen($data); //subtract sent data from data to send
            if (connection_status() != CONNECTION_NORMAL) {
                break;
            }
        }


    }
}