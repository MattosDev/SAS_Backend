<?php

namespace App\Http\Controllers;

use App\Domain\Book\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = $this->bookRepository->create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = $this->bookRepository->getById($id);
        $book = $this->bookRepository->update($book, $request->all());
        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = $this->bookRepository->getById($id);
        $this->bookRepository->delete($book);
        return response()->json(null, 204);
    }
}
