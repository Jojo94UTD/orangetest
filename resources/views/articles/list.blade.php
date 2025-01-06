<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Articles</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5deb3; /* Couleur beige */
            color: #333333;
        }

        header {
            background-color: #ff0000; /* Rouge */
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .filters {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .filters h2 {
            margin-top: 0;
            color: #333333;
        }

        .filters form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .filters label {
            font-weight: bold;
        }

        .filters select, .filters input[type="date"], .filters button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
        }

        .filters button {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .filters button:hover {
            background-color: #cc0000;
        }

        .articles {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .article {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }

        .article h3 {
            margin-top: 0;
            color: #ff0000; /* Rouge */
        }

        .article p {
            margin: 5px 0;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333333;
            color: #ffffff;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>Jojo Magazines - Liste des Articles</header>
    <div class="container">
        <!-- Section des Filtres -->
        <div class="filters">
            <h2>Filtres</h2>
            <form method="GET" action="{{ url('/articles/all') }}">
    <label for="category">Catégorie :</label>
    <select id="category" name="category">
        <option value="">Toutes</option>
        <option value="Sport" {{ request('category') == 'Sport' ? 'selected' : '' }}>Sport</option>
        <option value="Politique" {{ request('category') == 'Politique' ? 'selected' : '' }}>Politique</option>
        <option value="Culture" {{ request('category') == 'Culture' ? 'selected' : '' }}>Culture</option>
    </select>

    <label for="journal">Journal :</label>
    <select id="journal" name="journal">
        <option value="">Tous</option>
        <option value="LeMonde" {{ request('journal') == 'LeMonde' ? 'selected' : '' }}>Le Monde</option>
        <option value="LEquipe" {{ request('journal') == 'LEquipe' ? 'selected' : '' }}>L'Équipe</option>
        <option value="LeParisien" {{ request('journal') == 'LeParisien' ? 'selected' : '' }}>Le Parisien</option>
    </select>

    <label for="date">Date de publication :</label>
    <input type="date" id="date" name="date" value="{{ request('date') }}">

    <button type="submit">Appliquer les filtres</button>
</form>

<div class="articles">
    @foreach ($articles as $article)
        <div class="article">
            <h3>{{ $article['title'] ?? $article->title }}</h3>
            <p><strong>Journal :</strong> {{ $article['journal'] ?? 'Inconnu' }}</p>
            <p><strong>Catégorie :</strong> {{ $article['category'] ?? 'N/A' }}</p>
            <p><strong>Date :</strong> {{ $article['published_at'] ?? 'N/A' }}</p>
        </div>
    @endforeach
</div>


        </div>
    </div>
    <footer>&copy; 2025 Jojo Magazines</footer>
</body>
</html>
