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
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BooksTest extends KernelTestCase
{
    /**
     * @var ObjectRepository<Books>
     */
    private ObjectRepository $repository;
    private ObjectManager $manager;

    protected function setUp(): void
    {
        static::bootKernel();
        $this->manager = static::getContainer()
            ->get('doctrine')
            ->getManager();
        $this->repository = $this->manager->getRepository(Books::class);
    }

    public function testCrud(): void
    {
        $repository = $this->repository;
        $manager = $this->manager;

        $this->ensureBookNotExists('test');

        $book = new Books();
        $book->author = 'Test';
        $book->title = 'Test Book';
        $filter = ['title' => $book->title];

        $manager->persist($book);
        $manager->flush();
        $this->assertInstanceOf(Books::class, $repository->findOneBy($filter));
        $this->assertNotNull($book->id);
    }

    private function ensureBookNotExists(string $title): void
    {
        $book = $this->repository->findOneBy(['title' => $title]);

        if ($book instanceof Books) {
            $this->manager->remove($book);
            $this->manager->flush();
        }
    }
}
