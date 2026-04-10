<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    private function formatNews($data)
    {
        return collect($data)->map(function ($item) {

            $image = isset($item['image'])
                ? str_replace('Image preview', '', $item['image'])
                : null;

            $title = $item['title'] ?? '';

            return [
                'title' => $title,
                'slug' => Str::slug($title), // 🔥 cukup di sini doang!
                'link' => $item['link'] ?? '',
                'date' => date('d-M, Y', strtotime($item['isoDate'] ?? now())),
                'image' => $image,
                'description' => $item['description'] ?? '',
            ];
        });
    }
    public function index()
    {
        try {
            $url = "https://berita-indo-api-next.vercel.app/api/antara-news/top-news";

            $response = Http::get($url);

            if ($response->failed()) {
                return view('frontend.archive-news', [
                    'all_news' => []
                ]);
            }

            $result = $response->json();

            // ambil data array langsung
            $all_news = $this->formatNews($result['data']);
            session(['all_news' => $all_news]); // penting buat detail
            return view('frontend.archive-news', compact('all_news'));
        } catch (\Exception $e) {
            dd([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }
    }


    public function detail($slug)
    {
        try {
            $all_news = session('all_news', collect());
            $news = $all_news->firstWhere('slug', $slug);

            if (!$news) {
                abort(404);
            }

            $html = Http::get($news['link'])->body();

            // 🔥 ambil div content
            preg_match('/<div class="wrap__article-detail-content.*?>(.*?)<\/div>/s', $html, $matches);

            $content = $matches[1] ?? '<p>Konten tidak ditemukan</p>';

            // 🔥 bersihin
            $content = preg_replace('#<script.*?</script>#is', '', $content);
            $content = preg_replace('#<style.*?</style>#is', '', $content);
            $content = preg_replace('#<ins.*?</ins>#is', '', $content);
            $content = preg_replace('#class=".*?"#is', '', $content);
            $content = preg_replace('#style=".*?"#is', '', $content);

            return view('frontend.detail-news', compact('news', 'content'));
        } catch (\Exception $e) {
            return view('frontend.detail-news', [
                'news' => null,
                'content' => '<p>Error ambil konten</p>'
            ]);
        }
    }

        public function todayNews()
    {
        try {
            $url = "https://berita-indo-api-next.vercel.app/api/antara-news/terkini";

            $response = Http::get($url);

            if ($response->failed()) {
                return view('frontend.archive-news', [
                    'all_news' => []
                ]);
            }

            $result = $response->json();

            // ambil data array langsung
            $all_news = $this->formatNews($result['data']);
            session(['all_news' => $all_news]); // penting buat detail

            return view('frontend.archive-news', compact('all_news'));
        } catch (\Exception $e) {
            dd([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }
    }


    public function politikNews()
    {
        try {
            $url = "https://berita-indo-api-next.vercel.app/api/antara-news/politik";

            $response = Http::get($url);

            if ($response->failed()) {
                return view('frontend.archive-news', [
                    'all_news' => []
                ]);
            }

            $result = $response->json();

            // ambil data array langsung
            $all_news = $this->formatNews($result['data']);
            session(['all_news' => $all_news]);

            return view('frontend.archive-news', compact('all_news'));
        } catch (\Exception $e) {
            dd([
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
        }
    }
    public function teknoNews()
    {
        try {
            $url = "https://berita-indo-api-next.vercel.app/api/antara-news/tekno";

            $response = Http::get($url);

            if ($response->failed()) {
                return view('frontend.archive-news', [
                    'all_news' => []
                ]);
            }

            $result = $response->json();

            // ambil data array langsung
            $all_news = $this->formatNews($result['data']);
            session(['all_news' => $all_news]);

            return view('frontend.archive-news', compact('all_news'));
        } catch (\Exception $e) {
            dd([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }
    }
    public function hiburanNews()
    {
        try {
            $url = "https://berita-indo-api-next.vercel.app/api/antara-news/hiburan";

            $response = Http::get($url);

            if ($response->failed()) {
                return view('frontend.archive-news', [
                    'all_news' => []
                ]);
            }

            $result = $response->json();

            // ambil data array langsung
            $all_news = $this->formatNews($result['data']);
            session(['all_news' => $all_news]);

            return view('frontend.archive-news', compact('all_news'));
        } catch (\Exception $e) {
            dd([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }
    }
}
