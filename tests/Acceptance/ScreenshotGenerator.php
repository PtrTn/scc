<?php

declare(strict_types=1);

namespace App\Tests\Acceptance;

use Generator;
use Symfony\Component\Panther\Client;
use Symfony\Component\Panther\PantherTestCase;

final class ScreenshotGenerator extends PantherTestCase
{
    private Client $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = static::createPantherClient();
    }

    /** @dataProvider getPagesToScreenshot */
    public function testLoadPage(string $url, string $fileName, string $textThatShouldBeFound): void
    {
        $this->client->request('GET', $url);
        $this->assertSelectorTextContains('main', $textThatShouldBeFound);
        $this->client->takeScreenshot(__DIR__ . '/current/' . $fileName);
    }

    public function getPagesToScreenshot(): Generator
    {
        yield ['/', 'home.png', 'SCC Powerhouse richt zich vooral op powerliften'];
        yield ['/atleten', 'atleten.png', '1ste plaats NK Raw Bankdrukken 2015'];
        yield ['/coaching', 'coaching.png', 'Bij SCC Powerhouse vinden wij dat coaching betaalbaar en persoonlijk dient te zijn'];
        yield ['/tarieven', 'tarieven.png', 'Wij willen de prijzen graag helder en eerlijk houden'];
        yield ['/proeftraining', 'proeftraining.png', 'Wil je een gratis en vrijblijvende proeftraining aanvragen?'];
        yield ['/artikelen', 'artikelen.png', 'High bar squat vs low bar squat'];
        yield ['/artikelen/high-bar-vs-low-bar-squat', 'artikel.png', 'De squat is snel uitgegroeid tot misschien wel dé basisoefening van elke zichzelf serieus nemende krachtatleet'];
        yield ['/contact', 'contact.png', 'Heb je een vraag, suggestie of ben je benieuwd wat wij voor je kunnen betekenen?'];
    }
}
