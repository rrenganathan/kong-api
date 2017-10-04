<?php

namespace Smalot\Kong\Services;

use Smalot\Kong\Client;

class Plugin implements PluginInterface
{
    private $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function create($api = '', $body = [])
    {
        $url = $api ? '/apis/'.$api.'/plugins/' : '/apis/plugins/';

        return $this->client->post($url, ['body' => $body]);
    }

    public function retrieve($plugin)
    {
        return $this->client->get('/plugins/'.$plugin);
    }

    public function all($body = [])
    {
        return $this->client->get('/plugins/', ['body' => $body]);
    }

    public function update($api, $plugin, $body = [])
    {
        $url = $api ? '/apis/'.$api.'/plugins/'.$plugin : '/apis/plugins/'.$plugin;

        return $this->client->patch($url, ['body' => $body]);
    }

    public function updateOrCreate($api = '', $body = [])
    {
        $url = $api ? '/apis/'.$api.'/plugins/' : '/apis/plugins/';

        return $this->client->put($url, ['body' => $body]);
    }

    public function delete($api, $plugin)
    {
        $url = $api ? '/apis/'.$api.'/plugins/'.$plugin : '/apis/plugins/'.$plugin;

        return $this->client->delete($url);
    }

    public function enabled()
    {
        return $this->client->post('/plugins/enabled');
    }

    public function schema($plugin)
    {
        return $this->client->get('/plugins/schema/'.$plugin);
    }
}
