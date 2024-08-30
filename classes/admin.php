<?php
require_once __DIR__ . "/../classes/db.class.php";
class Admin extends DB
{
    public function getUsername($username)
    {
        $sql = "SELECT * FROM admin";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $value) {
            if ($value["username"] == $username) {
                return true;
            }
        }
        return false;
    }
    public function passwdControl($username,$password)
    {
        if($this->getUsername($username))
        {
            $sql = "SELECT * FROM admin WHERE username = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$username]);
            $result = $stmt->fetchAll();
            foreach ($result as $value) {
                if ($value["username"== $username] && $value["password"] == $password) {
                    return true;
                }
            }
            return false;
        }
        else
        return false;
    }
    public function getMeet()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getAdmins()
    {
        $sql = "SELECT id,name,username,created_at FROM admin";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getPriceList()
    {
        $sql = "SELECT * FROM price_list";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getPriceById($id)
    {
        $sql = "SELECT * FROM price_list WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
    public function updatePrice($name,$price,$id)
    {
        $sql = "UPDATE price_list SET name = ?, price = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name,$price,$id]);
        return $result;
    }
    public function createPrice($name,$price)
    {
        $sql = "INSERT INTO price_list(name,price) VALUES(?,?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name,$price]);
        return $result;
    }
    public function deletePrice($id)
    {
        $sql = "DELETE FROM price_list WHERE id=?;";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
    }

    public function getContactInfo()
    {
        $sql = "SELECT * FROM contact WHERE id=1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function updateContactInfo($mail,$phone,$working_time,$location,$bayiler,$acik_adres)
    {
        $sql = "UPDATE contact SET mail=?,phone=?,working_time=?,location=?,bayiler=?,acik_adres=? WHERE id=1";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$mail,$phone,$working_time,$location,$bayiler,$acik_adres]);
        return $result;
    }
    public function getServices()
    {
        $sql = "SELECT * FROM services";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getServicesById($id)
    {
        $sql = "SELECT * FROM services WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
    public function updateServices($id,$title,$price,$image)
    {
        $sql = "UPDATE services SET title=?,price=?,image=? WHERE id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$title,$price,$image,$id]);
        return $result;
    }
    public function deleteService($id)
    {
        $sql = "DELETE FROM services WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
    }
    public function createService($title,$price,$image)
    {
        $sql = "INSERT INTO services(title,price,image) VALUES(?,?,?) ";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$title,$price,$image]);
        return $result;
    }
    public function getPersonInfo()
    {
        $sql = "SELECT * FROM personal";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function createPersonal($title,$image)
    {
        $sql = "INSERT INTO personal(name,image) VALUES(?,?) ";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$title,$image]);
        return $result;
    }
    public function deletePersonal($id)
    {
        $sql = "DELETE FROM personal WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
    }
    public function updatePersonal($id,$title,$image)
    {
        $sql = "UPDATE personal SET name=?,image=? WHERE id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$title,$image,$id]);
        return $result;
    }
    public function getPersonInfoById($id)
    {
        $sql = "SELECT * FROM personal WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    
    
    



}
?>