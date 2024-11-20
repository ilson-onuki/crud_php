<?php
include 'config.php';

// SQL - Script Query Language

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare(query: "INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Adicionar Usuário</title>
</head>
<body style="margin-top: 50px;">
    <h1 class = "container d-flex flex-column align-items-center">Adicionar Usuário</h1>
    
    <div class="container d-flex flex-column align-items-center">
        <form method="POST" class="mb-3 w-50">
            <label for="formGroupExampleInput" class="form-label">Nome:</label><br>
            <input type="text" class="form-control" name="name" required><br><br>
            <label for="formGroupExampleInput" class="form-label">Email:</label><br>
            <input type="email" class="form-control" name="email" required><br><br>
            <button type="submit" class = "btn btn-success">Salvar</button>
            <a href="index.html" class="btn btn-info">Voltar</a>
        </form>
    </div>
    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
