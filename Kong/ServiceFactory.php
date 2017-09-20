<?php

namespace Smalot\Kong;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Log\LoggerInterface;
use Smalot\Kong\Services\Api;
use Smalot\Kong\Services\ApiInterface;
use Smalot\Kong\Services\Certificate;
use Smalot\Kong\Services\CertificateInterface;
use Smalot\Kong\Services\Consumer;
use Smalot\Kong\Services\ConsumerInterface;
use Smalot\Kong\Services\Plugin;
use Smalot\Kong\Services\PluginInterface;
use Smalot\Kong\Services\Sni;
use Smalot\Kong\Services\SniInterface;
use Smalot\Kong\Services\Target;
use Smalot\Kong\Services\TargetInterface;
use Smalot\Kong\Services\Upstream;
use Smalot\Kong\Services\UpstreamInterface;

final class ServiceFactory
{
    private static $services = [
      ApiInterface::SERVICE_NAME => Api::class,
      CertificateInterface::SERVICE_NAME => Certificate::class,
      ConsumerInterface::SERVICE_NAME => Consumer::class,
      PluginInterface::SERVICE_NAME => Plugin::class,
      SniInterface::SERVICE_NAME => Sni::class,
      TargetInterface::SERVICE_NAME => Target::class,
      UpstreamInterface::SERVICE_NAME => Upstream::class,
    ];

    private $client;

    public function __construct(array $options = [], LoggerInterface $logger = null, GuzzleClient $guzzleClient = null)
    {
        $this->client = new Client($options, $logger, $guzzleClient);
    }

    public function get($service)
    {
        if (!array_key_exists($service, self::$services)) {
            throw new \InvalidArgumentException(
              sprintf(
                'The service "%s" is not available. Pick one among "%s".',
                $service,
                implode('", "', array_keys(self::$services))
              )
            );
        }

        $class = self::$services[$service];

        return new $class($this->client);
    }
}
