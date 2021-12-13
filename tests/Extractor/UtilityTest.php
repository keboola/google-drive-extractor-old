<?php

declare(strict_types=1);

namespace Keboola\GoogleDriveExtractor\Tests\Extractor;

use Generator;
use Keboola\GoogleDriveExtractor\Extractor\Utility;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class UtilityTest extends TestCase
{

    /** @dataProvider sanitizeDataProvider */
    public function testSanitize(string $string, string $expectedString): void
    {
        Assert::assertEquals($expectedString, Utility::sanitize($string));
    }

    public function sanitizeDataProvider(): Generator
    {
        yield 'string1' => [
            'abcdef',
            'abcdef',
        ];

        yield 'string2' => [
            'a',
            'a',
        ];

        yield 'string3' => [
            ' ',
            'empty',
        ];

        yield 'string4' => [
            ' abžčřd kw#/\\',
            'abzcrd_kwcount',
        ];
    }
}
