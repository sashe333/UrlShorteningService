<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use App\Domain\URL\Services\UrlShortenerService;

class UrlShortenerTest extends TestCase
{
    #[DataProvider('additionProvider')]
    public function test_shorten(string $inputUrl, string $expectedShortenedUrl): void
    {
        $hashidsMock = Mockery::mock('overload:Hashids\Hashids');
        $hashidsMock->shouldReceive('encode')->andReturn('abc123');

        $configMock = Mockery::mock('alias:Illuminate\Support\Facades\Config');
        $configMock->shouldReceive('get')->with('app.url')->andReturn('https://example.com');

        $urlShortenerService = new UrlShortenerService($hashidsMock);

        $shortenedUrl = $urlShortenerService->shorten($inputUrl);

        $this->assertEquals($expectedShortenedUrl, $shortenedUrl);
    }

    public static function additionProvider(): array
    {
        return [
            ['https://www.example.com/page1', 'https://example.com/abc123'],
            ['https://www.example.com/page2', 'https://example.com/abc123'],
            ['https://www.example.com/page3', 'https://example.com/abc123'],
        ];
    }
}



