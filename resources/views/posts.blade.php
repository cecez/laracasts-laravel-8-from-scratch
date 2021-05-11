<x-layout>
        @foreach($posts as $post)
            <article>
                <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach
</x-layout>
