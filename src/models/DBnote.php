<?php
namespace App\models;

class DBnote {
    private $pdo;

    public function __construct() {  
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Active les exceptions PDO
        } catch (\PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit();
        }
    }

    public function getId($parameter1, $value1) {
        try {
            $stmt = $this->pdo->prepare("SELECT id_note FROM note WHERE $parameter1 = :value1 LIMIT 1");
            $stmt->bindParam(':value1', $value1);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'ID de la note : " . $e->getMessage();
            return null;
        }
    }
    
    public function insertNote($crit1_note, $crit2_note, $crit3_note) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO note (crit1_note, crit2_note, crit3_note) 
                VALUES (:crit1_note, :crit2_note, :crit3_note)
            ");
            $stmt->bindParam(':crit1_note', $crit1_note);
            $stmt->bindParam(':crit2_note', $crit2_note);
            $stmt->bindParam(':crit3_note', $crit3_note);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo "Erreur lors de l'insertion de la note : " . $e->getMessage();
            return false;
        }
    }

    public function getNote($id_note) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM note WHERE id_note = :id_note");
            $stmt->bindParam(':id_note', $id_note);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de la note : " . $e->getMessage();
            return null;
        }
    }
}