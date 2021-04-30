<?php

class Expense{
    public $db;

    public function __construct($db){
        $this->db=$db;
    }

    public function create($userId, $name){
        $sql    =   "INSERT INTO expenses (user_id, name) VALUES (:userId, :name)";
        $statement=$this->db->con->prepare($sql);
        $res=$statement->execute([
            ':userId'   =>  $userId,
            ':name'     =>  $name
        ]);

        if($res){
            return true;
        }
    }
}