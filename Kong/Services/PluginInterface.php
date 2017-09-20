<?php

namespace Smalot\Kong\Services;

interface PluginInterface
{
    const SERVICE_NAME = 'plugin';

    public function create($api, $body = []);

    public function retrieve($plugin);

    public function all($body = []);

    public function update($api, $plugin, $body = []);

    public function updateOrCreate($api = '', $body = []);

    public function delete($api, $plugin);

    public function enabled();

    public function schema($plugin);
}
