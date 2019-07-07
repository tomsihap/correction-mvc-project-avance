<?php

class Example extends Db {

    const TABLE_NAME = "Example";

    protected $id;
    protected $field1;
    protected $field2;
    protected $field3;
    protected $field4;
    protected $photo;


    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setField1($field1) {
        $this->field1 = $field1;
        return $this;
    }

    public function setField2($field2) {
        $this->field2 = $field2;
        return $this;
    }

    public function setField3($field3) {
        $this->field3 = $field3;
        return $this;
    }

    public function setField4($date, $time) {
        $dateFormat = DateTime::createFromFormat('Y-m-d', $date);

        if (!$dateFormat) {
            throw new Exception('La date a un format incorrect.');
        }

        $this->field4 = $date . ' ' . $time;
        return $this;
    }

    public function setPhoto($photo) {
        if (isset($photo) and $photo['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            if ($photo['size'] <= 10000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($photo['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($photo['tmp_name'],  './public/uploads/' . $photo['name']);

                    $this->photo = $photo['name'];
                    return $this;
                }
            } else {
                throw new Exception('photo trop grande');
            }
        } else {
            throw new Exception('une erreur est survenue à l\'upload du fichier');
        }
    }

    public function getField1() {
        return $this->field1;
    }
    public function getField2() {
        return $this->field2;
    }
    public function getField3() {
        return $this->field3;
    }
    public function getField4() {
        return $this->field4;
    }
    public function getPhoto() {
        return $this->photo;
    }

    public function save()
    {
        $data = [
            "field1"    => $this->getField1(),
            "field2"    => $this->getField2(),
            "field3"    => $this->getField3(),
            "field4"    => $this->getField4(),
            "photo"     => $this->getPhoto(),
        ];
        //if ($this->id > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public static function findAll() {
        $data = Db::dbFind(self::TABLE_NAME);
        return $data;
    }
}