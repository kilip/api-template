<?php

/*
 * This file is part of the api-template project.
 *
 * (c) Anthonius Munthi <me@itstoni.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Functional;

use App\Entity\Books;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Books::class)]
class BooksTest extends TestCase
{
    public function testImmutable(): void
    {
        $book = new Books();
        $book->setAuthor('Author');
        $book->setTitle('Title');

        $this->assertSame('Author', $book->getAuthor());
        $this->assertSame('Title', $book->getTitle());
    }
}
