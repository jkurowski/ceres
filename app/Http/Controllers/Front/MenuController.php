<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Inline;
use App\Models\Page;
use App\Repositories\JobRepository;

class MenuController extends Controller
{
    private JobRepository $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($uri = null)
    {
        $page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function kredyty($locale = null)
    {
        $uri = 'kredyty';
        $page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }

    public function wykonczeniowe($locale)
    {
        $uri = 'programy-wykonczeniowe';
        $page = Page::where('uri', $uri)->firstOrFail();
        $inline = Inline::whereSlug($uri)->get()->toArray();

        if (!view()->exists('front.menupage.'.$uri)) {
            abort(404);
        }

        return view('front.menupage.'.$uri)
            ->with([
                'page' => $page,
                'uri' => $uri,
                'array' => $inline,
            ]);
    }
}
