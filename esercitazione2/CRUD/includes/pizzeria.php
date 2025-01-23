<?php include_once __DIR__ . '/connection.php';

class Pizzeria extends Connection {
    public function __construct() {
        parent::__construct('localhost', 'crud-obj', 'Marta', 'password');
    }
    public function getPizze(): array|null{

        $sql = "SELECT * FROM pizze ORDER BY prezzo DESC";

        $query = $this->db->prepare($sql);

        return $query->execute() ? $query->fetchAll(PDO::FETCH_ASSOC) : die();
    }

    public function getPizzaById(int $id): array|null{
        $sql = "SELECT * FROM pizze WHERE id = $id";

        $query = $this->db->prepare($sql);

        return $query->execute() ? $query->fetchAll(PDO::FETCH_ASSOC)[0] : die();
    }

    public function addPizza(Pizza $pizza): bool|array {
        $sql = "INSERT INTO pizze (gusto, prezzo, disponibilita) VALUES (:gusto, :prezzo, :disponibilita)";
        $query = $this->db->prepare($sql);

        $query->bindParam(':gusto',$pizza->gusto, PDO::PARAM_STR);
        $query->bindParam(':prezzo',$pizza->prezzo, PDO::PARAM_INT);
        $query->bindParam(':disponibilita',$pizza->disponibilita, PDO::PARAM_BOOL);

        return $query->execute() ? true : $query->errorInfo();
    }

    public function removePizzaById(int $id): bool|array{

        $sql = "DELETE FROM pizze WHERE id = :id";

        $query = $this->db->prepare($sql);

        $query->bindParam(":id",$id, PDO::PARAM_INT);

        return $query->execute() ? true : $query->errorInfo();
        
    }

    public function updatePizza(Pizza $pizza): bool{
        $sql = "UPDATE pizze 
        SET gusto=:gusto,prezzo=:prezzo,disponibilita=:disponibilita
        WHERE id = :id";
        
        $query = $this->db->prepare($sql);

        $query->bindParam(':id', $pizza->id, PDO::PARAM_INT);
        $query->bindParam(':gusto', $pizza->gusto, PDO::PARAM_STR);
        $query->bindParam(':prezzo', $pizza->prezzo, PDO::PARAM_INT);
        $query->bindParam(':disponibilita', $pizza->disponibilita, PDO::PARAM_BOOL);

        return $query->execute() ? true : $query->errorInfo();

    }
}