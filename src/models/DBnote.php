<?php
namespace App\models;

class DBnote {
    private $pdo;

    public function __construct(){  
        $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
    }

    public function getId($parameter1, $value1){
        $stmt = $this->pdo->prepare("SELECT id_note FROM note WHERE $parameter1 = :value1 LIMIT 1");
        $stmt->bindParam(':value1', $value1);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function insertNote($crit1_note, $crit2_note, $crit3_note){
        $stmt = $this->pdo->prepare("INSERT INTO note (id_note, crit1_note, crit2_note, crit3_note) VALUES (:id_note, :crit1_note, :crit2_note, :crit3_note)");
        $stmt->bindParam(':crit1_note', $crit1_note);
        $stmt->bindParam(':crit2_note', $crit2_note);
        $stmt->bindParam(':crit3_note', $crit3_note);
        return $stmt->execute();
    }

    public function getNote($id_note){
        $stmt = $this->pdo->prepare("SELECT * FROM note WHERE id_note = :id_note");
        $stmt->bindParam(':id_note', $id_note);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}