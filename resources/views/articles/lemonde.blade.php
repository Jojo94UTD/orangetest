<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles du journal Le Monde</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Articles du journal Le Monde</h1>

    @if(!empty($articles))
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Published At</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article['id'] }}</td>
                        <td>{{ $article['title'] }}</td>
                        <td>{{ $article['author'] }}</td>
                        <td>{{ $article['content'] }}</td>
                        <td>{{ $article['published_at'] }}</td>
                        <td>{{ $article['category'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun article trouvé.</p>
    @endif
</body>
</html>
