<?php

namespace App\Http\Resources\Train;
trait RemoveMetaAndLinksInCollection
{
    public function withResponse($request, $response): void
    {
        $jsonResponse = json_decode($response->getContent(), true);
        unset(
            $jsonResponse['links'],
            $jsonResponse['meta']['links'],
            $jsonResponse['meta']['path']
        );
        $response->setContent(json_encode($jsonResponse));
    }
}
