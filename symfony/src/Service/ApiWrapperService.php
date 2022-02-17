<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiWrapperService
{

    public function __construct(private HttpClientInterface $httpClient, private ParameterBagInterface $parameterBag)
    {
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function getNewsToPopulate(): array|Exception|ClientExceptionInterface|DecodingExceptionInterface
    |RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface
    {

        $response = $this->httpClient->request('GET', $this->parameterBag->get('api.url'), [
            'query' => [
                'access_key'    => $this->parameterBag->get('api.key'),
                'limit'         => 20,
                'countries'     => 'fr'
            ]
        ]);

        try {
            return $response->toArray();
        } catch (ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface
                |ServerExceptionInterface|TransportExceptionInterface $e) {
            return $e;
        }
    }

}