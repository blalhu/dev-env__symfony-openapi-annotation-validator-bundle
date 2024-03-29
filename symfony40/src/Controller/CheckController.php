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
     * @Route(path="/check")
     *
     * @return Response
     */
    public function check(): Response
    {
        return new Response();
    }
}