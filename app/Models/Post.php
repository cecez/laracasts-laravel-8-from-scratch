<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class Post
{

    public static function find($slug)
    {
        if (!file_exists($caminho = resource_path("/../resources/posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        $post = cache()->remember("posts.{$slug}", 1200, function () use ($caminho) {
            return file_get_contents($caminho);
        });

        return $post;
    }

    public static function all()
    {
        return array_map(function(SplFileInfo $file) {
            return $file->getContents();
        }, File::files(resource_path("posts/")));
    }
}
