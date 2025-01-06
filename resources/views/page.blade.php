<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jojo Magazines</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5deb3; /* Couleur beige */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .box {
            background-color: #ffffff; /* Blanc pour le fond */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }

        h1 {
            color: #333333;
            font-size: 36px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .btn {
            background-color: #ff0000; /* Rouge */
            color: #ffffff; /* Blanc */
            border: none;
            padding: 15px 30px;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 200px;
        }

        .btn:hover {
            background-color: #cc0000; /* Rouge foncé au survol */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>JOJO MAGAZINES</h1>
            <button onclick="location.href='/articles'" class="btn">Naviguez ici</button>
            <button onclick="location.href='/login'" class="btn">Se connecter / S'inscrire</button>
        </div>
    </div>
</body>
</html>
