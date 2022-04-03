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
            'contact[content]' => 'Voici ma demande très spéciale.'
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.invalid-feedback', 'This value is not a valid email address.');
    }

    /**
     * Test email not blank
     *
     * @return void
     */
    public function testBlankEmail(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form([
            'contact[email]' => '',
            'contact[subject]' => 'Mon sujet',
            'contact[content]' => 'Voici ma demande très spéciale.'
        ]);
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'This value should not be blank.');
    }

    /**
     * Test email not blank
     *
     * @return void
     */
    public function testBlankSubject(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form([
            'contact[email]' => 'Yacine@gmail.com',
            'contact[subject]' => '',
            'contact[content]' => 'Voici ma demande très spéciale.'
        ]);
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'This value should not be blank.');
    }

    /**
     * Test email not blank
     *
     * @return void
     */
    public function testBlankContent(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form([
            'contact[email]' => 'Yacine@gmail.com',
            'contact[subject]' => 'Mon sujet',
            'contact[content]' => ''
        ]);
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'This value should not be blank.');
    }

    /**
     * Test email not blank
     *
     * @return void
     */
    public function testValidForm(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form([
            'contact[email]' => 'Yacine@gmail.com',
            'contact[subject]' => 'Mon sujet',
            'contact[content]' => 'Mon problème est important.'
        ]);
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.alert-success', 'Votre demande de contact a bien été envoyé !');
    }
}
