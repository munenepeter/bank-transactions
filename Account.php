<?php


class Account {
    public $pdo;
    /**
     * Class constructor.
     */
    public function __construct() {
        $this->pdo = (new Database())->pdo; 
    }
    public function deposit($id, $amount) {

        try {
            
            $this->pdo->beginTransaction();

            // insert new amount
            $sql_update_to = 'UPDATE accounts
                                SET amount = amount + :amount
                                WHERE id = :id';
            $stmt = $this->pdo->prepare($sql_update_to);
            $stmt->execute([":id" => $to, ":amount" => $amount]);


            // get available amount of the account after deposit
            $sql = 'SELECT amount FROM accounts WHERE id=:id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([":from" => $id]);
            $availableAmount = (int) $stmt->fetchColumn();
            $stmt->closeCursor();

            // commit the transaction
            $this->pdo->commit();

            echo "You have successfully deposited {$amount}: Total balance {$availableAmount}".PHP_EOL;

            return true;

        } catch (PDOException $e) {

            $this->pdo->rollBack();

            die($e->getMessage());
        }
    }

    public function transfer($from, $to, $amount) {

        try {

            $this->pdo->beginTransaction();

            // get available amount of the transferer account
            $sql = 'SELECT amount FROM accounts WHERE id=:from';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(":from" => $from));
            $availableAmount = (int) $stmt->fetchColumn();
            $stmt->closeCursor();

            if ($availableAmount < $amount) {
                echo 'Insufficient amount to transfer'.PHP_EOL;
                return false;
            }
            // deduct from the transferred account
            $sql_update_from = 'UPDATE accounts
				SET amount = amount - :amount
				WHERE id = :from';
            $stmt = $this->pdo->prepare($sql_update_from);
            $stmt->execute(array(":from" => $from, ":amount" => $amount));
            $stmt->closeCursor();

            // add to the receiving account
            $sql_update_to = 'UPDATE accounts
                                SET amount = amount + :amount
                                WHERE id = :to';
            $stmt = $this->pdo->prepare($sql_update_to);
            $stmt->execute(array(":to" => $to, ":amount" => $amount));

            // commit the transaction
            $this->pdo->commit();

            echo "The {$amount} has been transferred successfully".PHP_EOL;

            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
        }
    }
}
