<?php 
class UserRepository {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function check_cityzen($name, $national_id, $phone_number, $date_dose,  $location, $vaccine){
        try{
            $cr = $this->db->prepare
            ("SELECT id FROM citizen WHERE name = :name AND national_id = :national_id");
            $cr->bindParam(':name',$name);
            $cr->bindParam(':national_id',$national_id);
            $cr->execute();

            if($cr->rowCount()>0){
                $row = $cr->fetch(PDO::FETCH_ASSOC);
                $citizen_id = $row['id'];
            }
            else{
                $cr = $this->db->prepare("INSERT INTO `citizen`(`citizen_id`, `name`, `national_id`, `phone_number`)
                                     VALUES (NULL,:name,:national_id,:phone_number)");
                $cr->bindParam(':name',$name);
                $cr->bindParam(':national_id',$national_id);
                $cr->bindParam(':phone_number',$phone_number);
                $cr->execute();
                $citizen_id = $this->db->lastInsertId();
            }
                $cr1 = $this->db->prepare("INSERT INTO `vaccine_record`(`id`, `date_dose`,`citizen_id`, `vaccine_id`, `location_id`) 
                                    VALUES (NULL, :date_dose, :citizen_id, :vaccine_id, :location_id )");
                $cr1->bindParam(':date_dose',$date_dose);
                $cr1->bindParam(':citizen_id',$citizen_id);
                $cr1->bindParam(':vaccine_id',$vaccine);
                $cr1->bindParam(':location_id',$location);
                $cr1->execute();
                return true;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
    
    public function readLocation(){
        try{
            $cr = $this->db->prepare("SELECT * FROM `location`");
            $cr -> execute();
            $result = $cr -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
    public function readVaccine(){
        try{
            $cr = $this->db->prepare("SELECT * FROM `vaccine`");
            $cr -> execute();
            $result = $cr -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
    public function read(){
        try{
            $cr = $this->db->prepare("SELECT c.citizen_id, c.name, c.national_id,vr.date_dose, c.phone_number, l.location_name, v.vaccine_name, vr.vr_id
                                    FROM vaccine_record vr
                                    JOIN citizen c
                                    ON vr.citizen_id = c.citizen_id
                                    JOIN vaccine v
                                    ON vr.vaccine_id = v.id
                                    JOIN location l
                                    ON vr.location_id = l.id
                                    ");
            $cr -> execute();
            $result = $cr -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
    public function getUserById($id){
        try{
            $cr = $this->db->prepare("SELECT c.citizen_id, c.name, c.national_id,vr.date_dose, c.phone_number, l.location_name, v.vaccine_name, vr.vr_id
                                    FROM vaccine_record vr
                                    JOIN citizen c
                                    ON vr.citizen_id = c.citizen_id
                                    JOIN vaccine v
                                    ON vr.vaccine_id = v.id
                                    JOIN location l
                                    ON vr.location_id = l.id
                                    WHERE `vr`.`vr_id` = ?
                                    ");
            $cr->execute([$id]);
            $result = $cr -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }

    public function delete($id){
        try{
            $cr = $this->db->prepare("DELETE FROM `vaccine_record` WHERE `vr_id`=:id");
            $cr->bindParam(':id',$id);
            $cr->execute();
            return true;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }

    public function update($citizen_id, $id, $name, $national_id,$date_dose, $phone_number,$location, $vaccine){
        try {
            $cr=$this->db->prepare("UPDATE `citizen` 
                                    SET 
                                    `name`=:name,
                                    `national_id`=:national_id,
                                    `phone_number`=:phone_number
                                    WHERE `citizen_id`=:citizen_id");
            $cr->bindParam(':citizen_id',$citizen_id);
            $cr->bindParam(':name',$name);
            $cr->bindParam(':national_id',$national_id);
            $cr->bindParam(':phone_number', $phone_number);
            $cr->execute();
            $cr=$this->db->prepare("UPDATE `vaccine_record`
                                    SET
                                    `date_dose`=:date_dose,
                                    `citizen_id`=:citizen_id,
                                    `vaccine_id`=:vaccine_id,
                                    `location_id`=:location_id
                                    WHERE vr_id=:vr_id");
            $cr->bindParam(':date_dose',$date_dose);
            $cr->bindParam(':citizen_id',$citizen_id);
            $cr->bindParam(':vaccine_id',$vaccine);
            $cr->bindParam(':location_id',$location);
            $cr->bindParam(':vr_id',$id);
            $cr->execute();
            return true;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>