<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Anggota Badminton</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        body {
            background-color: skyblue;
            font-family: Times New Roman, cursive;
            text-align: center;
        }

        h1 {
            color: pink;
        }

        nav ul li a {
            color: white;
        }

        .container {
            background-color: pink;
            border: 5px solid grey;
            padding: 20px;
            margin-top: 50px;
        }

        footer {
            background-color: white;
            color: black;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1><marquee behavior="scroll" direction="left">Form Pendaftaran Anggota Badminton</marquee></h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Daftar Anggota</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Pendaftaran Anggota Baru</h2>
        <form method="post" action="proses_register.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Telepon:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" required></textarea>

            <button type="submit" name="submit">Daftar</button>
        </form>
    </div>

    <footer>
        <p>&copy; Badminton Club - We bring laughter to the court!</p>
    </footer>
</body>
</html>
