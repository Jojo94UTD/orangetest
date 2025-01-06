<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles de L'Équipe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1 {
            text-align: center;
            background-color: #007BFF;
            color: white;
            padding: 20px;
            margin: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 800px;
        }
        li {
            background-color: white;
            margin: 15px 0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin: 0 0 10px;
            color: #007BFF;
        }
        p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin: 20px 0;
            color: #777;
        }
        .category {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
        }
        .author {
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Articles de L'Équipe</h1>

    @if (!empty($articles))
        <ul>
            @foreach ($articles as $article)
                <li>
                    <h2>{{ $article['title'] }}</h2>
                    <p><span class="author">Auteur : {{ $article['author'] }}</span></p>
                    <p><strong>Contenu :</strong> {{ $article['content'] }}</p>
                    <p><strong>Publié le :</strong> {{ $article['published_at'] }}</p>
                    <p><span class="category">{{ $article['category'] }}</span></p>
                </li>
            @endforeach
        </ul>
    @else
        <p style="text-align: center; color: #777;">Aucun article disponible.</p>
    @endif

    <div class="footer">© {{ date('Y') }} L'Équipe - Tous droits réservés</div>
</body>
</html>
