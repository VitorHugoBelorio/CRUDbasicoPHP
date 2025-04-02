<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'provap1';
    private $username = 'root';
    private $password = '';
    private $DBConn;

    public function __construct($servidor, $nomeBanco, $usuario, $senha) {
        $this->host = $servidor;
        $this->db_name = $nomeBanco;
        $this->username = $usuario;
        $this->password = $senha;
    }

    public function getConnection() {
        $this->DBConn = null;
        try {
            $this->DBConn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->DBConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erro na conexão: " . $exception->getMessage();
        }
        return $this->DBConn;
    }
}

class DBBarcos {
    private $conexao;
    private $tableName = 'barcos';

    public function __construct() {
        $database = new Database('localhost', 'provap1', 'root', '');
        $this->conexao = $database->getConnection();
    }

    public function create($modelo, $fabricante, $opcionais, $cor) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (bar_modelo, bar_fabricante, bar_opcionais, bar_cor) 
                    VALUES (:modelo, :fabricante, :opcionais, :cor)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':fabricante', $fabricante);
            $stmt->bindParam(':opcionais', $opcionais);
            $stmt->bindParam(':cor', $cor);

            return $stmt->execute();
        } catch (PDOException $exception) {
            echo "Erro ao inserir barco: " . $exception->getMessage();
            return false;
        }
    }

    public function recovery() {
        try {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Erro ao recuperar barcos: " . $exception->getMessage();
            return [];
        }
    }

    public function recoveryById($idBusca) {
        try {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $idBusca);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Erro ao recuperar barco por ID: " . $exception->getMessage();
            return null;
        }
    }

    public function update($id, $modelo, $fabricante, $opcionais, $cor) {
        try {
            $sql = "UPDATE " . $this->tableName . " 
                    SET bar_modelo = :modelo, bar_fabricante = :fabricante, bar_opcionais = :opcionais, bar_cor = :cor 
                    WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':fabricante', $fabricante);
            $stmt->bindParam(':opcionais', $opcionais);
            $stmt->bindParam(':cor', $cor);

            return $stmt->execute();
        } catch (PDOException $exception) {
            echo "Erro ao atualizar barco: " . $exception->getMessage();
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM " . $this->tableName . " WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (PDOException $exception) {
            echo "Erro ao deletar barco: " . $exception->getMessage();
            return false;
        }
    }
}
?>
