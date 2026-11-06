<?php

namespace App\OpenAPIProvider;

use Pelso\OpenAPIValidatorBundle\Provider\OpenAPIProviderInterface;
use Pelso\OpenAPIValidatorBundle\Provider\YAMLFileOpenAPIProvider;

class ProviderChecker extends YAMLFileOpenAPIProvider implements OpenAPIProviderInterface
{

    public function __construct()
    {
        parent::__construct(__DIR__.'/../Resources/basic_openapi_sample.yaml');
    }

}