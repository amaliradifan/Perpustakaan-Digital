<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //make crud
    public function index(Request $request)
    {
        $categoryName = $request->input('category');

        if ($categoryName) {
            $books = Book::whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            })->get();
        } else {
            $books = Book::all();
        }

        return view('books.index', [
            'title' => 'All Books',
            'books' => $books,
            'active' => 'home',
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view(
            'books.create',
            [
                'title' => 'Add New Book',
                'active' => 'create',
                'categories' => Category::all(),
            ]
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'quantity' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:pdf|max:10240',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['uploader_id'] = Auth::user()->id;

        if ($request->hasFile('file') && $request->hasFile('cover')) {
            $pdfFile = $request->file('file');
            $coverImage = $request->file('cover');

            $pdfFileName = time() . '_' . $pdfFile->getClientOriginalName();
            $coverFileName = time() . '_' . $coverImage->getClientOriginalName();

            $pdfPath = $pdfFile->storeAs('books', $pdfFileName, 'public');
            $coverPath = $coverImage->storeAs('covers', $coverFileName, 'public');

            $validatedData['file'] = $pdfPath;
            $validatedData['cover'] = $coverPath;

            Book::create($validatedData);

            return redirect('/books')->with('status', 'Data Buku Berhasil Ditambahkan!');
        }

        return back()->with('status', 'Gagal mengunggah file atau cover.');
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', [
            'title' => $book->title,
            'book' => $book,
            'active' => 'none',
        ]);
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.update', [
            'title' => 'Edit Book',
            'book' => $book,
            'active' => 'none',
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'quantity' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'file' => 'mimes:pdf|max:10240',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['uploader_id'] = Auth::user()->id;

        if ($request->hasFile('file')) {
            $pdfFile = $request->file('file');
            $pdfFileName = time() . '_' . $pdfFile->getClientOriginalName();
            $pdfPath = $pdfFile->storeAs('books', $pdfFileName, 'public');
            $validatedData['file'] = $pdfPath;
        }

        if ($request->hasFile('cover')) {
            $coverImage = $request->file('cover');
            $coverFileName = time() . '_' . $coverImage->getClientOriginalName();
            $coverPath = $coverImage->storeAs('covers', $coverFileName, 'public');
            $validatedData['cover'] = $coverPath;
        }

        $book->update($validatedData);

        return redirect('/books')->with('status', 'Data Buku Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books')->with('status', 'Data Buku Berhasil Dihapus!');
    }

    public function download($filename)
    {
        if (Storage::disk('public')->exists($filename)) {
            $path = Storage::disk('public')->path($filename);
            
            return response()->download($path);
        } else {
            return abort(404, 'File not found.');
        }
    }
}
