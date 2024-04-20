<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\Entities\Book;

class BookRepository
{
    public function all()
    {
        return Book::all();
    }
    
    public function create(array $data)
    {
        return Book::create($data);
    }

    public function update(Book $book, array $data)
    {
        $book->update($data);
        return $book;
    }

    public function delete(Book $book)
    {
        $book->delete();
    }

    public function getById(int $id)
    {
        return Book::findOrFail($id);
    }
}
