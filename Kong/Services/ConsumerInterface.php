<?php

namespace Smalot\Kong\Services;

interface ConsumerInterface
{
    const SERVICE_NAME = 'consumer';

    public function create($body = []);

    public function retrieve($consumer);

    public function all($body = []);

    public function update($consumer, $body = []);

    public function updateOrCreate($body = []);

    public function delete($consumer);
    
    public function createCredential($consumer, $credential, $body = []);
}
