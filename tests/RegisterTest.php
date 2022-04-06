<?php

namespace App\Tests;

use Facebook\WebDriver\WebDriverBy;
use Symfony\Component\Panther\PantherTestCase;

class RegisterTest extends PantherTestCase
{
    /**
     * Test Email blank
     *
     * @return void
     */
    public function testEmailBlank(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form([
            'registration_form[email]' => '',
            'registration_form[plainPassword]' => 'Mon sujet',
        ]);
        $client->getWebDriver()->findElement(WebDriverBy::name('registration_form[agreeTerms]'))->click();
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'Please enter a mail');
    }

    public function testInvalidEmail()
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form([
            'registration_form[email]' => 'Yacine',
            'registration_form[plainPassword]' => 'Mon sujet',
        ]);
        $client->getWebDriver()->findElement(WebDriverBy::name('registration_form[agreeTerms]'))->click();
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'Veuillez saisir un email correct.');
        
    }

    /**
     * Test Conidtion not checked
     *
     * @return void
     */
    public function testConditionNotChecked(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form([
            'registration_form[email]' => 'Yacine@gmail.com',
            'registration_form[plainPassword]' => 'Mon sujet',
        ]);
        // $client->getWebDriver()->findElement(WebDriverBy::name('registration_form[agreeTerms]'))->click();
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'You should agree to our terms.');
    }

    /**
     * Test Password blank
     *
     * @return void
     */
    public function testPasswordBlank(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form([
            'registration_form[email]' => 'Yacine@gmail.com',
            'registration_form[plainPassword]' => '',
        ]);
        $client->getWebDriver()->findElement(WebDriverBy::name('registration_form[agreeTerms]'))->click();
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'Please enter a password');
    }

     /**
     * Test Password blank
     *
     * @return void
     */
    public function testPasswordMinLength(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('Register')->form([
            'registration_form[email]' => 'Yacine@gmail.com',
            'registration_form[plainPassword]' => 'Mo',
        ]);
        $client->getWebDriver()->findElement(WebDriverBy::name('registration_form[agreeTerms]'))->click();
        $client->submit($form);

        // On vérifie qu'on retrouve bien la classe d'erreurs au moment de la soumission
        $this->assertSelectorTextContains('.invalid-feedback', 'Your password should be at least');
    }

}
