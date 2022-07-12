<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

class HomeTest extends WebTestCase
{
    public function testHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
    }

    public function testVoiturePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/location');

        $this->assertResponseIsSuccessful();
    }

    public function testHabitatPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/habitat');

        $this->assertResponseIsSuccessful();
    }

    public function testAboutPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/about');

        $this->assertResponseIsSuccessful();
    }

    public function testLoginPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/about');

        $this->assertResponseIsSuccessful();

        $loginForm = $crawler->filter('.form-container .sign-in-container');
        $this->assertNotNull($loginForm);
      //  $this->assertSelectorTextContains('h1', 'Hello World');
    }
    
}
