<?php

namespace App\Resolvers;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;
use App\Model\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;

final class BookResolver implements QueryItemResolverInterface
{

    private $repository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->repository = $bookRepository;
    }
    /**
     * @param Book|null $item
     *
     * @return Book
     */
    public function __invoke($item, array $context)
    {
        // Query arguments are in $context['args'].
        if(isset($context['args']["isbn"]) > 0){
            $isbn = $context['args']["isbn"];
            $book = $this->repository->findOneBy(["isbn"=> $isbn]);
            return $book;
        }
        // Do something with the book.
        // Or fetch the book if it has not been retrieved.

        return $item;
    }
}