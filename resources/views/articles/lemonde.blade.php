<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - Le Monde</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            margin: 0;
            color: #007BFF;
        }
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Articles du journal Le Monde</h1>
    <ul>
        @forelse ($articles as $article)
            <li>
                <h2>{{ $article['title'] }}</h2>
                <p><strong>Auteur :</strong> {{ $article['author'] }}</p>
                <p>{{ $article['content'] }}</p>
            </li>
        @empty
            <p>Aucun article disponible pour aujourd'hui.</p>
        @endforelse
    </ul>
</body>
</html>
