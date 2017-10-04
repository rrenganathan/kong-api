<?php

namespace Smalot\Kong\Services;

use Smalot\Kong\Client;

class Consumer implements ConsumerInterface
{
    private $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function create($body = [])
    {
        return $this->client->post('/consumers/', ['body' => $body]);
    }

    public function retrieve($consumer)
    {
        return $this->client->get('/consumers/'.$consumer);
    }

    public function all($body = [])
    {
        return $this->client->get('/consumers/', ['body' => $body]);
    }

    public function update($consumer, $body = [])
    {
        return $this->client->patch('/consumers/'.$consumer, ['body' => $body]);
    }

    public function updateOrCreate($body = [])
    {
        return $this->client->put('/consumers/', ['body' => $body]);
    }

    public function delete($consumer)
    {
        return $this->client->delete('/consumers/'.$consumer);
    }
    
    public function createCredential($consumer, $credential, $body = [])
    {
        return $this->client->post('/consumers/'.$consumer.'/'.$credential, ['body' => $body]);
    }
}
