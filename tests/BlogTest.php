<?php

namespace App\Tests;

use Facebook\WebDriver\WebDriverBy;
use Symfony\Component\Panther\PantherTestCase;

class BlogTest extends PantherTestCase
{
   /**
     * Test Email invalid
     *
     * @return void
     */
    public function testLengthContent(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/blog/new');
        $form = $crawler->selectButton('Save')->form([
            'blog[title]' => 'Yacine',
            'blog[content]' => 'z',
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.invalid-feedback', 'Votre contenu doit faire minimum 5 caracteres');
    }
}
