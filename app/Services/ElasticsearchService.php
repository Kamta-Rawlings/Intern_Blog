<?php

namespace App\Services;

use Elastic\Elasticsearch\ClientBuilder;

class ElasticsearchService
{

     protected $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->setHosts([env('ELASTICSEARCH_HOST', 'localhost:9200')])
            ->build();
    }

    public function getClient()
    {
        return $this->client;
    }
    
    public function indexUser($user)
{
    return $this->client->index([
        'index' => 'users',
        'id'    => $user->id,
        'body'  => [
            'name'  => $user->username,
            'email' => $user->email,
            'created_at' => $user->created_at->toDateString(),
        ],
    ]);
}


    public function searchUsers($query)
{
    return $this->client->search([
        'index' => 'users',
        'body'  => [
            'query' => [
                'multi_match' => [
                    'query'     => $query,
                    'fields'    => ['name^2', 'email'],
                    'fuzziness' => 'AUTO',
                ],
            ],
        ],
    ]);
}


public function deleteUser($id)
{
    return $this->client->delete([
        'index' => 'users',
        'id'    => $id,
    ]);
}

}
