<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class ContactTest extends PantherTestCase
{
    public function testInvalidEmail(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form([
            'contact[email]' => 'Yacine',
            'contact[subject]' => 'Mon sujet',
            'contact[email]' => 'Voici ma demande très spéciale.'
        ]);

        $this->assertSelectorTextContains('invalid-feedback', 'This value is not a valid email address.');
    }
}
