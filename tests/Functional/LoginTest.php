<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Generator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginTest extends WebTestCase
{
    public function testIfLoginIsSuccess(): void
    {
        $client = self::createClient();

        $client->request(Request::METHOD_GET, '/login');

        self::assertResponseIsSuccessful();

        $client->enableProfiler();

        $client->submitForm('Se connecter', [
            '_username' => 'user+1@email.com',
            '_password' => 'password',
        ]);

        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);

        if (($profile = $client->getProfile()) instanceof Profile) {
            /** @var SecurityDataCollector $securityCollector */
            $securityCollector = $profile->getCollector('security');

            self::assertTrue($securityCollector->isAuthenticated());
        }
    }

    /**
     * @dataProvider provideFormData
     * @param string $email
     * @param string $password
     * @param string $errorMessage
     */
    public function testIfLoginIsFail(string $email, string $password, string $errorMessage)
    {
        $client = self::createClient();

        $crawler = $client->request(Request::METHOD_GET, '/login');

        $this->assertResponseIsSuccessful();

        $form = $crawler->filter("form")->form([
            "email" => $email,
            "password" => $password
        ]);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $client->followRedirect();

        $this->assertSelectorTextContains('html', $errorMessage);
    }

    /**
     * @return Generator
     */
    public function provideFormData(): Generator
    {
        yield [
            "",
            "password",
            "Invalid credentials."
        ];

        yield [
            "used@email.com",
            "fail",
            "Invalid credentials."
        ];
    }
}
