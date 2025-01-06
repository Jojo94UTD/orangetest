<div class="container">
    <h1>Liste des Articles</h1>
    @if($articles->isEmpty())
        <p>Aucun article à afficher.</p>
    @else
        @foreach($articles as $article)
            <div class="article">
                <h2>{{ $article['title'] ?? $article->title }}</h2>
                <p class="date">
                    Publié le {{ \Carbon\Carbon::parse($article['published_at'] ?? $article->published_at)->format('d M Y à H:i') }}
                </p>
                <p>{{ $article['content'] ?? $article->content }}</p>
            </div>
        @endforeach
    @endif
</div>
