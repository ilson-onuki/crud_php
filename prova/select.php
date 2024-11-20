<?php
include 'config.php';

$stmt = $conn->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>




<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operações CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>


    </style>
</head>
<body>
    <div class="container ">
        <!-- Título da página -->
        <h1 class="mt-5">Operações CRUD em PHP</h1>

        <div id = "borda_externa">
            <h2 class="mt-4">Lista de usuarios</h2>
                     
            <table class="table table-bordered " >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            
                <?php foreach ($users as $user): ?>
                <tbody>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>
                            <a href="update.php?id=<?= $user['id']; ?>" class="btn btn-primary">Atualizar</a>
                            <a href="delete.php?id=<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?')">Deletar</a>
                        </td>
                    </tr>
                    
                </tbody>
                
                <?php endforeach; ?>
            </table>

        </div>
        
        <!-- Divisão para os botões de operações -->
        <div class="mt-4">
            <!-- Botão para Inserir Post -->
            <a href="index.html" class="btn btn-info">Voltar</a>
            
            <!-- Botão para Selecionar Posts -->
            <!-- <a href="select.php" class="btn btn-outline-primary">Selecionar Posts</a> -->
            
            <!-- Botão para Atualizar Post -->
            <!-- <a href="update.php" class="btn btn-outline-secondary">Atualizar Post</a> -->
            
            <!-- Botão para Deletar Post -->
            <!-- <a href="delete.php" class="btn btn-outline-danger">Deletar Post</a> -->
        </div>
    </div>
    
    <!-- Inclusão dos scripts do jQuery e Bootstrap JS para funcionalidades interativas -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


</body></html>