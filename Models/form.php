<?php

require_once(MODEL_PATH.'field.php');

class Form
{
    private $dbh = null;
    private $field = null;

    function __construct() {
        $this->field = new Field();
        try {
            $this->dbh = new PDO(DB_SERVER.':host='.HOST.';dbname='.DB_NAME, USERNAME, PASSWORD);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

	public function InsertForm($name){
        $sql = 'INSERT INTO forms (name, creationdate)
				  VALUES (:name, NOW())';

        $sth = $this->dbh->prepare($sql);
        $sth->execute(
            array(
                ':name' => $name
            )
        );
        return intval($this->dbh->lastInsertId());
	}

	public function GetAllForms(){
		$sql = 'SELECT * FROM forms Order by id DESC';
        return $this->dbh->query($sql);
	}

	public function GetForm($selector){
		$sql = 'SELECT * FROM forms WHERE forms.id = '.$selector;
        return $this->dbh->query($sql)->fetch(PDO::FETCH_ASSOC);
	}
   
	public function DeleteForm($selector){
        $this->field->DeleteFields($selector);
        $sql = 'delete FROM forms where forms.id = '.$selector;
        return $this->dbh->query($sql);
	}   
 
	public function UpdateForm($name, $selector){
		$sql = 'UPDATE forms SET
                name = :name,
                creationdate = NOW()
                where forms.id = :selector';

        $sth = $this->dbh->prepare($sql);

        $sth->execute(
            array(
                ':name' => $name,
                ':selector' => $selector
            )
        );
	}
}
