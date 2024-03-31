<?php

namespace App\Controller;

use Pelso\OpenAPIValidatorBundle\Annotation\ValidatorAnnotation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckController extends AbstractController
{
    /**
     * @ValidatorAnnotation(
     *     providerName="default",
     *     errorActions={
     *          "@pelso.openapi_validator_bundle.error_action.header_notice",
     *          "@pelso.openapi_validator_bundle.error_action.log"
     *      }
     * )
     * @Route(path="/check-yaml")
     *
     * @return Response
     */
    public function checkYAML(): Response
    {
        return new Response('<html><body></body></html>');
    }

    /**
     * @ValidatorAnnotation(
     *     providerName="autoloaded_service",
     *     errorActions={
     *          "@pelso.openapi_validator_bundle.error_action.header_notice",
     *          "@pelso.openapi_validator_bundle.error_action.log"
     *      }
     * )
     * @Route(path="/check-autoloaded")
     *
     * @return Response
     */
    public function checkAutoloaded(): Response
    {
        return new Response('<html><body></body></html>');
    }

    /**
     * @ValidatorAnnotation(
     *     providerName="manual_service",
     *     errorActions={
     *          "@pelso.openapi_validator_bundle.error_action.header_notice",
     *          "@pelso.openapi_validator_bundle.error_action.log"
     *      }
     * )
     * @Route(path="/check-manual")
     *
     * @return Response
     */
    public function checkService(): Response
    {
        return new Response('<html><body></body></html>');
    }
}