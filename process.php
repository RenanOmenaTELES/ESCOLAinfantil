<?php
// Inclui a conexão com o banco de dados
include('includes/db.php');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];

    // Validação: Verifica se a data de nascimento é válida e se o aluno tem idade maior ou igual a 18 anos
    $idade = date_diff(date_create($data_nascimento), date_create('today'))->y;
    if ($idade < 18) {
        echo "O aluno deve ter 18 anos ou mais.";
        exit();
    }

    // Prepara a consulta SQL para inserir o aluno
    $sql = "INSERT INTO Alunos (nome, data_nascimento, email, telefone, endereco, sexo) VALUES ('$nome', '$data_nascimento', '$email', '$telefone', '$endereco', '$sexo')";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
