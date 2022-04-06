<?php

namespace App\Tests;

use Facebook\WebDriver\WebDriverBy;
use Symfony\Component\Panther\PantherTestCase;

class BlogTest extends PantherTestCase
{
   
                                  /**      INDEX        */
 /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testfindDeleteButton()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $this->assertSelectorTextContains('#delete', 'delete');    
    }

    /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testfindEditButton()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $this->assertSelectorTextContains('#edit', 'edit');    
    }
    /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testfindAddButton()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $this->assertSelectorTextContains('#add', 'Create new');    
    }
    /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testfindShowButton()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $this->assertSelectorTextContains('#show', 'show');    
    }

    /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testfindTitle()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $this->assertPageTitleContains('Blog index');    
    }

                                  /**      EDIT        */

//  /**
//      * Test Email invalid
//      *
//      * @return void
//      */
//     public function testEditLengthContent(): void
//     {
//         $client = static::createPantherClient();

//         $crawler = $client->request('GET', '/blog');
//         $client->getWebDriver()->findElement(WebDriverBy::id('edit'))->click();

       
    
//         $form = $crawler->selectButton('#sumbit')->form([
//             'blog[title]' => 'Yacine',
//             'blog[content]' => 'z',
//         ]);
//         $client->submit($form);

//         $this->assertSelectorTextContains('.invalid-feedback', 'Votre contenu doit faire minimum 5 caracteres');
//     }

//     /**
//      * Test Email invalid
//      *
//      * @return void
//      */
//     public function testEditContentBlank(): void
//     {
//         $client = static::createPantherClient();

//         $crawler = $client->request('GET', '/blog');
//         $client->getWebDriver()->findElement(WebDriverBy::id('edit'))->click();
//         $form = $crawler->selectButton('Update')->form([
//             'blog[title]' => 'Yacine',
//             'blog[content]' => '',
//         ]);
//         $client->submit($form);

//         $this->assertSelectorTextContains('.invalid-feedback', 'Saisissez un contenu');
//     }

//     /**
//      * Test Email invalid
//      *
//      * @return void
//      */
//     public function testEditContentNotBlank(): void
//     {
//         $client = static::createPantherClient();

//         $crawler = $client->request('GET', '/blog');
//         $client->getWebDriver()->findElement(WebDriverBy::id('edit'))->click();
//         $form = $crawler->selectButton('Update')->form([
//             'blog[title]' => 'Yacine',
//             'blog[content]' => 'ddddddd',
//         ]);
//         $client->submit($form);

//         $this->assertSelectorTextContains('.alert-success', 'Blog ajouté avec succes !');
//     }

//     /**
//      * Test Email invalid
//      *
//      * @return void
//      */
//     public function testEditContentLengthShort(): void
//     {
//         $client = static::createPantherClient();

//         $crawler = $client->request('GET', '/blog');
//         $client->getWebDriver()->findElement(WebDriverBy::id('edit'))->click();
//         $form = $crawler->selectButton('Update')->form([
//             'blog[title]' => 'Yacine',
//             'blog[content]' => 'ddd',
//         ]);
//         $client->submit($form);

//         $this->assertSelectorTextContains('.invalid-feedback', 'Votre contenu doit faire minimum 5 caracteres');
//     }

//     /**
//      * Test Email invalid
//      *
//      * @return void
//      */
//     public function testEditTitleBlank(): void
//     {
//         $client = static::createPantherClient();

//         $crawler = $client->request('GET', '/blog');
//         $client->getWebDriver()->findElement(WebDriverBy::id('edit'))->click();
//         $form = $crawler->selectButton('Update')->form([
//             'blog[title]' => '',
//             'blog[content]' => 'yesssssss',
//         ]);
//         $client->submit($form);

//         $this->assertSelectorTextContains('.invalid-feedback', 'Saisissez un titre');
//     }

//     /**
//      * Test Email invalid
//      *
//      * @return void
//      */
//     public function testEditTitleNotBlank(): void
//     {
//         $client = static::createPantherClient();

//         $crawler = $client->request('GET', '/blog');
//         $client->getWebDriver()->findElement(WebDriverBy::id('edit'))->click(); 
//         $form = $crawler->selectButton('Update')->form([
//             'blog[title]' => 'Ça marche',
//             'blog[content]' => 'yesssssss',
//         ]);
//         $client->submit($form);

//         $this->assertSelectorTextContains('.alert-success', 'Blog ajouté avec succes !');
//     }

//     /**
//      * Test Email invalid
//      *
//      * @return void
//      */
//     public function testEditValidAddForm(): void
//     {
//         $client = static::createPantherClient();

//         $crawler = $client->request('GET', '/blog');
//         $client->getWebDriver()->findElement(WebDriverBy::id('edit'))->click();
//         $form = $crawler->selectButton('Update')->form([
//             'blog[title]' => 'Yacine',
//             'blog[content]' => 'dddddd',
//         ]);
//         $client->submit($form);

//         $this->assertSelectorTextContains('.alert-success', 'Blog ajouté avec succes !');
//     }

                                  /**      DELETE        */
    /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testDeleteBlog()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $client->executeScript("document.getElementById('delete').click()");
        $client->getWebDriver()->findElement(WebDriverBy::id('delete_blog'))->click(); 
        $this->assertSelectorTextContains('.alert-success', 'Le blog a bien été supprimé !');
    }
                                  /**      SHOW        */

    /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testContainsTitle()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $client->getWebDriver()->findElement(WebDriverBy::id('show'))->click(); 
        $this->assertPageTitleContains('Blog');
    }
    /**
     * Permet de trouver le bouton de suppression
     *
     * @return void
     */
    public function testContainsBackLink()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/blog');
        $client->getWebDriver()->findElement(WebDriverBy::id('show'))->click(); 
        $this->assertSelectorTextContains('#back', 'back to list'); 
    }

                                  /**      ADD        */

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

    /**
     * Test Email invalid
     *
     * @return void
     */
    public function testContentBlank(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/blog/new');
        $form = $crawler->selectButton('Save')->form([
            'blog[title]' => 'Yacine',
            'blog[content]' => '',
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.invalid-feedback', 'Saisissez un contenu');
    }

    /**
     * Test Email invalid
     *
     * @return void
     */
    public function testContentNotBlank(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/blog/new');
        $form = $crawler->selectButton('Save')->form([
            'blog[title]' => 'Yacine',
            'blog[content]' => 'ddddddd',
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.alert-success', 'Blog ajouté avec succes !');
    }

    /**
     * Test Email invalid
     *
     * @return void
     */
    public function testContentLengthShort(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/blog/new');
        $form = $crawler->selectButton('Save')->form([
            'blog[title]' => 'Yacine',
            'blog[content]' => 'ddd',
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.invalid-feedback', 'Votre contenu doit faire minimum 5 caracteres');
    }

    /**
     * Test Email invalid
     *
     * @return void
     */
    public function testTitleBlank(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/blog/new');
        $form = $crawler->selectButton('Save')->form([
            'blog[title]' => '',
            'blog[content]' => 'yesssssss',
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.invalid-feedback', 'Saisissez un titre');
    }

    /**
     * Test Email invalid
     *
     * @return void
     */
    public function testTitleNotBlank(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/blog/new');
        $form = $crawler->selectButton('Save')->form([
            'blog[title]' => 'Ça marche',
            'blog[content]' => 'yesssssss',
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.alert-success', 'Blog ajouté avec succes !');
    }

    /**
     * Test Email invalid
     *
     * @return void
     */
    public function testValidAddForm(): void
    {
        $client = static::createPantherClient();

        $crawler = $client->request('GET', '/blog/new');
        $form = $crawler->selectButton('Save')->form([
            'blog[title]' => 'Yacine',
            'blog[content]' => 'dddddd',
        ]);
        $client->submit($form);

        $this->assertSelectorTextContains('.alert-success', 'Blog ajouté avec succes !');
    }
}
