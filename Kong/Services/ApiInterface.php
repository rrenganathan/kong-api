<?php

namespace Smalot\Kong\Services;

interface ApiInterface
{
    const SERVICE_NAME = 'api';

    public function create($body = []);

    public function retrieve($api);

    public function all($body = []);

    public function update($api, $body = []);

    public function updateOrCreate($body = []);

    public function delete($api);

    public function plugins($api, $body = []);
}
