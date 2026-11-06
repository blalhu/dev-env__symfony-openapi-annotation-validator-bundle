<?php

namespace App\Controller;

use Pelso\OpenAPIValidatorBundle\Annotation\Validator;
use Pelso\OpenAPIValidatorBundle\Annotation\ValidatorProfile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckController extends AbstractController
{
    /**
     * @Validator(
     *     providerName="default",
     *     errorActions={
     *          "@pelso.openapi_validator_bundle.error_action.log",
     *          "@pelso.openapi_validator_bundle.error_action.bad_request_response"
     *      }
     * )
     * @Route(path="/check-yaml")
     *
     * @param Request $request
     * @return Response
     */
    public function checkYAML(Request $request): Response
    {
        return new Response('<html><body>yaml</body></html>');
    }

    /**
     * @Validator(
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
        return new Response('<html><body>autoloaded</body></html>');
    }

    /**
     * @Validator(
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
        return new Response('<html><body>service</body></html>');
    }

    /**
     * @ValidatorProfile(profileName="strict")
     * @Route(path="/check-profile", methods={"GET"})
     */
    public function checkProfile(Request $request): JsonResponse
    {
        return new JsonResponse([
            'profile' => 'strict',
            'id' => (int) $request->query->get('id'),
        ]);
    }
}
