<!DOCTYPE html>
<html>
<head>
    <title>Liste des articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        h1 {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 15px 0;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .article {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .article:last-child {
            border-bottom: none;
        }
        .article-title {
            font-size: 1.5em;
            color: #4CAF50;
            margin: 0;
        }
        .article-meta {
            font-size: 0.9em;
            color: #555;
            margin: 5px 0 10px;
        }
        .article-content {
            font-size: 1.1em;
            line-height: 1.6;
            margin: 10px 0;
        }
        .source {
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Liste des articles</h1>
    <div class="container">
        @foreach ($articles as $article)
            <div class="article">
                <h2 class="article-title">{{ $article->title }}</h2>
                <div class="article-meta">
                    <strong>Auteur :</strong> {{ $article->author ?? 'Anonyme' }}<br>
                    <strong>Date de publication :</strong> {{ $article->published_at ?? 'Non spécifiée' }}
                </div>
                <div class="article-content">
                    {{ $article->content }}
                </div>
                <div class="source">
                    <strong>Source :</strong> {{ $article->source ?? 'Inconnue' }}
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
