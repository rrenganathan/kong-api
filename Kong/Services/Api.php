<?php

namespace Smalot\Kong\Services;

use Smalot\Kong\Client;

class Api implements ApiInterface
{
    private $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function create($body = [])
    {
        return $this->client->post('/apis/', ['body' => $body]);
    }

    public function retrieve($api)
    {
        return $this->client->get('/apis/'.$api);
    }

    public function all($body = [])
    {
        return $this->client->get('/apis/', ['body' => $body]);
    }

    public function update($api, $body = [])
    {
        return $this->client->patch('/apis/'.$api, ['body' => $body]);
    }

    public function updateOrCreate($body = [])
    {
        return $this->client->put('/apis/', ['body' => $body]);
    }

    public function delete($api)
    {
        return $this->client->delete('/apis/'.$api);
    }

    public function plugins($api, $body = [])
    {
        return $this->client->get('/apis/'.$api.'/plugins/');
    }
}
