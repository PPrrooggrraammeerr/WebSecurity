<?php

class Usuario {

    private $pdo;
    private $id;
    private $nome;
    private $senha;

    public function __construct() {
        $host = '127.0.0.1';
        $user = 'root';
        $password = '';
        $database = 'websecurity';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $password, $options);
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function verificarCredenciais($nome, $senha) {
        $sql = 'SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}

?>
