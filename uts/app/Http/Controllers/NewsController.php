<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // menampilkan semua berita
    public function index()
    {
        $news = News::all();

        if (!empty($news)) {
            $respons = [
                'pesan' => 'menampilkan semua berita',
                'data' => $news
            ];
            return response()->json($respons, 200);
        } else {
            $respons = [
                'pesan' => 'tidak ada berita'
            ];
            return response()->json($respons, 200);
        }
    }

    // menambahkan berita
    public function store(Request $request)
    {
        // validasi data
        $validateData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $news = News::create($validateData);

        $respons = [
            'pesan' => 'berita berhasil dibuat',
            'data' => '$news'
        ];
        return response()->json($respons, 201);
    }

    // show data spesifik
    public function show($id)
    {
        $news = News::find($id);

        if ($news) {
            $response = [
                'pesan' => 'detail berita',
                'data' => $news
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'pesan' => 'berita tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
    }

    // edit data
    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if ($news) {
            $input = [
                'title' => $request->title ?? $news->title,
                'author' => $request->author ?? $news->author,
                'description' => $request->description ?? $news->description,
                'content' => $request->content ?? $news->content,
                'category' => $request->category ?? $news->category,
            ];
            $news->update($input);

            $respons = [
                'pesan' => 'berita berhasil diubah',
                'data' => $news
            ];

            return response()->json($respons, 200);
        } else {
            $respons = [
                'pesan' => 'berita tidak ditemukan'
            ];
            return response()->json($respons, 404);
        }
    }

    // hapus data
    public function destroy($id)
    {
        $news = News::find($id);
        if ($news) {
            $response = [
                'message' => 'berita dihapus',
                'data' => $news->delete()
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response, 404);
        }
    }

    // ambil data berdasarkan judul
    public function search(string $title)
    {
        $news = News::search($title);

        // cek apakah berita ditemukan
        if ($news) {
            $response = [
                'pesan' => 'detail berita',
                'data' => $news
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'pesan' => 'berita tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
    }

    // menampilkan berita kategori sport
    public function sport()
    {
        $news = News::where('category', 'sport')->get();

        if (!empty($news)) {
            $respons = [
                'pesan' => 'menampilkan berita kategori sport',
                'data' => $news
            ];
            return response()->json($respons, 200);
        } else {
            $respons = [
                'pesan' => 'tidak ada berita'
            ];
            return response()->json($respons, 200);
        }
    }

    // menampilkan berita kategori finance
    public function finance()
    {
        $news = News::where('category', 'finance')->get();

        if (!empty($news)) {
            $respons = [
                'pesan' => 'menampilkan berita kategori finance',
                'data' => $news
            ];
            return response()->json($respons, 200);
        } else {
            $respons = [
                'pesan' => 'tidak ada berita'
            ];
            return response()->json($respons, 200);
        }
    }

    // menampilkan berita kategori automotive
    public function automotive()
    {
        $news = News::where('category', 'automotive')->get();

        if (!empty($news)) {
            $respons = [
                'pesan' => 'menampilkan berita kategori automotive',
                'data' => $news
            ];
            return response()->json($respons, 200);
        } else {
            $respons = [
                'pesan' => 'tidak ada berita'
            ];
            return response()->json($respons, 200);
        }
    }
}
