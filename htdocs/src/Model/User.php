<?php
class User extends BaseModel
{
    private $id;
    private $userName;
    private $email;
    private $password;
    private $deleted;
    private $createdAt;

    function __construct($data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['username'])) {
            $this->userName = $data['username'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['password'])) {
            $this->password = $data['password'];
        }
        if (isset($data['deleted'])) {
            $this->deleted = $data['deleted'];
        }
        if (isset($data['created_at'])) {
            $this->createdAt = $data['created_at'];
        }
    }
    //return user where email matches @email
    public function getUserByEmail($email)
    {
        $sql = 'SELECT * FROM user WHERE email = :userEmail';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('userEmail', $email);
        $db->execute();

        $result = $db->fetch(PDO::FETCH_ASSOC);
        return $result ? new User($result) : $result;
    }
    //return user where id mathes @id
    public function getUserByID($id)
    {
        $sql = 'SELECT * FROM user WHERE id = :id AND deleted = false';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('id', $id);
        $db->execute();

        $result = $db->fetch(PDO::FETCH_ASSOC);
        return $result ? new User($result) : $result;
    }
    //save new user to database
    public function saveUser()
    {
        $sql =
            'INSERT INTO user (username, email, password) VALUES (:username, :email, :password)';

        $db = $this->connect();
        $db = $db->prepare($sql);

        $db->bindParam('username', $this->userName);
        $db->bindParam('email', $this->email);
        $db->bindParam('password', $this->password);

        return $db->execute();
    }

    //setters
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function isDeleted()
    {
        return $this->deleted;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
?>
