<?php
include 'config.php';

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta para obter o usuário com o ID passado
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário foi encontrado
    if (!$user) {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    // Redireciona de volta para a página principal se o ID não for fornecido
    header("Location: index.php");
    exit;
}

// Processa o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Usuário</title>
</head>
<body style="margin-top: 50px;">
    <h1 class = "container d-flex flex-column align-items-center">Editar Usuário</h1>

    <div class = "container d-flex flex-column align-items-center">
        <form method="POST" class="mb-3 w-50">
            <label for="formGroupExampleInput" class="form-label">Nome:</label><br>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($user['name']); ?>" required><br><br>
            <label for="formGroupExampleInput" class="form-label">Email:</label><br>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']); ?>" required><br><br>
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="index.html" class="btn btn-info">Voltar</a>
        </form>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
