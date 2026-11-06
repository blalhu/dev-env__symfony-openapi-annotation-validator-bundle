<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfileControllerTest extends WebTestCase
{
    public function testValidRequestReachesController(): void
    {
        $client = static::createClient();
        $client->request('GET', '/check-profile?id=42');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame([
            'profile' => 'strict',
            'id' => 42,
        ], json_decode($client->getResponse()->getContent(), true));
    }

    /** @dataProvider invalidRequests */
    public function testInvalidRequestIsRejected(string $uri): void
    {
        $client = static::createClient();
        $client->request('GET', $uri);
        $response = $client->getResponse();

        $this->assertSame(400, $response->getStatusCode());
        $this->assertSame('application/json', $response->headers->get('Content-Type'));
        $body = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('error_message', $body);
        $this->assertArrayNotHasKey('profile', $body);
    }

    public function invalidRequests(): array
    {
        return [
            'missing id' => ['/check-profile'],
            'non-integer id' => ['/check-profile?id=abc'],
            'empty id' => ['/check-profile?id='],
        ];
    }
}
