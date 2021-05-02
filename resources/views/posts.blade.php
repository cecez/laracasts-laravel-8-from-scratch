<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/app.css" rel="stylesheet">
        <title>Posts</title>
    </head>
    <body>

        <article>
            @foreach($posts as $post)
                <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <div>
                    {{ $post->excerpt }}
                </div>
            @endforeach
        </article>

    </body>
</html>
