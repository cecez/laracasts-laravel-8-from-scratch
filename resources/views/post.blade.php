<x-layout>
        <article>
            <h1>{{ $post->title}}</h1>
            <div>
                {!! $post->body !!}
            </div>
        </article>

        <a href="/">Voltar</a>
</x-layout>
