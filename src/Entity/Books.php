<?php

/*
 * This file is part of the api-template project.
 *
 * (c) Anthonius Munthi <me@itstoni.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource()]
#[ORM\Entity()]
class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column()]
    public int $id;

    #[ORM\Column(type: 'string')]
    public string $title;

    #[ORM\Column(type: 'string')]
    public string $author;
}
