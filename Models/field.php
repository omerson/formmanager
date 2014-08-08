<?php

require_once(SHARED_PATH.'database.php');

class Field
{
    private $dbh;

    function __construct() {
        try {
            $this->dbh = new PDO(DB_SERVER.':host='.HOST.';dbname='.DB_NAME, USERNAME, PASSWORD);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

	public function InsertField($form, $namelabel, $type, $value = null){

        $sql = 'INSERT INTO fields (form, namelabel, value, type)
				VALUES (:form, :namelabel, :value, :type)';

        $sth = $this->dbh->prepare($sql);
        $sth->execute(
            array(
                ':form' => $form,
                ':namelabel' => $namelabel,
                ':value' => $value,
                ':type' => $type
            )
        );
        return intval($this->dbh->lastInsertId());
	}

    public function SaveField($selector, $value){
        $sql = 'UPDATE fields SET value= :value WHERE id = :selector';
        $sth = $this->dbh->prepare($sql);
        $sth->execute(
            array(
                ':value' => $value,
                ':selector' => $selector
            )
        );
        $multiFields = $this->GetMultiFields($selector)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($multiFields as $multiField) {
            if($multiField['optionlabel'] == $value){
                $this->SetMultiField(intval($multiField['id']), 1);
            }else{
                $this->SetMultiField(intval($multiField['id']), 0);
            }
        }
    }

    public function UpdateField($selector, $namelabel, $type){
        $sql = 'UPDATE fields SET namelabel= :namelabel, type = :type WHERE id = :selector';
        $sth = $this->dbh->prepare($sql);
        $sth->execute(
            array(
                ':selector' => $selector,
                ':namelabel' => $namelabel,
                'type' => $type
            )
        );        
    }

    public function DeleteMultiFields($selector){
        $sql = 'SELECT optionlabel FROM multifields WHERE field = '.$selector.' and selected = 1';
        $selected = $this->dbh->query($sql);

        $sql = 'delete FROM multifields where multifields.field = '.$selector;
        $this->dbh->query($sql);        

        return $selected->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetType($selector){
        $sql = 'SELECT type FROM fields WHERE id = '.$selector;
        $type = $this->dbh->query($sql);

        return $type->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ResetValue($selector){
        $this->DeleteMultiFields($selector);
        $sql = 'UPDATE fields SET value = NULL WHERE id = '.$selector;
        return $this->dbh->query($sql);
    }

    public function SetMultiField($selector, $selected){
        $sql = 'UPDATE multifields SET selected = '.$selected.' WHERE id = '.$selector;
        return $this->dbh->query($sql);
    }

    public function SetSelectedMultiField($selector, $optionlabel){
        if($optionlabel){
            $sql = 'UPDATE multifields SET selected = 1 WHERE field = '.$selector.' and optionlabel = "'.$optionlabel.'"';
            $this->dbh->query($sql);
            $sql = 'UPDATE multifields SET selected = 0 WHERE field = '.$selector.' and optionlabel != "'.$optionlabel.'"';
            $this->dbh->query($sql);
        }
    }

    public function UpdateMultiField($selector, $optionlabel){
        $sql = 'UPDATE multifields SET optionlabel = '.$optionlabel.' WHERE id = '.$selector;
        return $this->dbh->query($sql);
    }

    public function InsertMultiField($field, $optionlabel, $selected = 0){
        if($optionlabel == '') return;
        $sql = 'INSERT INTO multifields (field, optionlabel, selected)
                VALUES ('.$field.', "'.$optionlabel.'", '.$selected.')';

        return $this->dbh->query($sql);
    }

    public function GetMultiFields($selector){
        $sql = 'SELECT * FROM multifields WHERE field = '.$selector;
        return $this->dbh->query($sql);
    }

    public function GetFieldType($selector){
        $sql = 'SELECT * FROM fieldtypes WHERE fieldtypes.id = '.$selector;
        return $this->dbh->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function GetFields($selector){
        $sql = 'SELECT fields.id, name, namelabel, value
                FROM fields
                left join fieldtypes
                on fields.type = fieldtypes.id
                WHERE fields.form = '.$selector;
        return $this->dbh->query($sql);
    }

    public function GetFieldTypes(){
        $sql = 'SELECT *
                FROM fieldtypes
                Order by fieldtypes.id DESC';
        return $this->dbh->query($sql);
    }

    public function DeleteFields($selector){
        $fields = $this->GetFields($selector)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fields as $field) {
            $this->DeleteMultiFields(intval($field['id']));
        }

        $sql = 'delete FROM fields where fields.form  = '.$selector;
        return $this->dbh->query($sql);
    }

    public function DeleteField($selector){
        $this->DeleteMultiFields($selector);

        $sql = 'delete FROM fields where fields.id  = '.$selector;
        return $this->dbh->query($sql);
    }
}