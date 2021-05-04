<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        return self::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug) {
        $posts = self::find($slug);

        if (! $posts) {
            throw new ModelNotFoundException();
        }

        return $posts;
    }

    public static function all()
    {
        try {
            return cache()->rememberForever('posts.all', function () {
                return collect(File::files(resource_path('posts')))
                    ->map(function ($file) {
                        return YamlFrontMatter::parseFile($file);
                    })
                    ->map(function ($document) {
                        return new Post(
                            $document->title,
                            $document->excerpt,
                            $document->date,
                            $document->body(),
                            $document->slug
                        );
                    })
                    ->sortByDesc('date');
            });
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
