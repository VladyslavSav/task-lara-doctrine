<?php

namespace App\Repositories;

use App\Entities\Author;
use App\Entities\Book;
use App\Entities\Publisher;
use Doctrine\ORM\EntityRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;

class DoctrineBookRepository extends EntityRepository implements BookRepositoryInterface {
    use PaginatesFromRequest;

    public function create(string $title, float $price, int $authorId, int $publisherId): void
    {
        $book = new Book($title, $price);
        $author = $this->getEntityManager()->getRepository(Author::class)->find($authorId);
        $publisher = $this->getEntityManager()->getRepository(Publisher::class)->find($publisherId);
        $book->setAuthor($author);
        $book->setPublisher($publisher);
        $this->getEntityManager()->persist($book);
        $this->getEntityManager()->flush();
    }

    public function listPaginated(): LengthAwarePaginator
    {
        return $this->paginateAll();
    }
}
