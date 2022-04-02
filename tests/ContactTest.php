<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;


class ContactTest extends PantherTestCase
{
    /**
     * Test Email invalid
     *
     * @return void
     */
    public function testInvalidEmail(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form([
            'contact[email]' => 'Yacine',
            'contact[subject]' => 'Mon sujet',
            'contact[email]' => 'Voici ma demande très spéciale.'
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.invalid-feedback', 'This value is not a valid email address.');
    }

    /**
     * Test email not blank
     *
     * @return void
     */
    public function testInvalidForm(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form([
            'contact[email]' => '',
            'contact[subject]' => 'Mon sujet',
            'contact[email]' => 'Voici ma demande très spéciale.'
        ]);
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorIsVisible('.invalid-feedback');
    }
}
