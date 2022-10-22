<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class EndpointTest extends WebTestCase
{
    public function testGetProgramsEndpointSuccessful(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/orders');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
    }
}