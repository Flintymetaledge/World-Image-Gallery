<?php

class Image extends BaseModel
{
    private $id;
    private $title;
    private $description;
    private $createdAt;
    private $deleted;
    private $views;
    private $votes;
    private $user;
    private $category;
    private $path;

    function __construct($data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['title'])) {
            $this->title = $data['title'];
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['created_at'])) {
            $this->createdAt = $data['created_at'];
        }
        if (isset($data['deleted'])) {
            $this->deleted = $data['deleted'];
        }
        if (isset($data['views'])) {
            $this->views = $data['views'];
        }
        if (isset($data['votes'])) {
            $this->votes = $data['votes'];
        }
        if (isset($data['user'])) {
            $this->user = $data['user'];
        }
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
        if (isset($data['path'])) {
            $this->path = $data['path'];
        }
    }
    //save new image to database
    public function saveImage()
    {
        $sql =
            'INSERT INTO image (title, description, user, category, path) VALUES (:title, :description, :user, :category, :path)';
        $db = $this->connect();
        $query = $db->prepare($sql);
        $query->bindParam('title', $this->title);
        $query->bindParam('description', $this->description);
        $query->bindParam('user', $this->user);
        $query->bindParam('category', $this->category);
        $query->bindParam('path', $this->path);
        $query->execute();
    }
    //add +1 to views in database table-image
    public function incrementImageViews()
    {
        $sql = 'UPDATE image SET views = views + 1 WHERE id = :id';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('id', $this->id);
        $db->execute();
        $this->setViews($this->getViews() + 1);
    }
    //add +1 to votes in database
    public function incrementImageVotes()
    {
        $sql = 'UPDATE image SET votes = votes + 1 WHERE id = :id';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('id', $this->id);
        $db->execute();
        $this->setVotes($this->getVotes() + 1);
    }
    //subtract 1 to votes in database
    public function decrementImageVotes()
    {
        $sql = 'UPDATE image SET votes = votes - 1 WHERE id = :id';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('id', $this->id);
        $db->execute();
        $this->setVotes($this->getViews() - 1);
    }
    //return a image where id matchs
    public function getImageByID($id)
    {
        $sql = 'SELECT * FROM image WHERE id = :id AND deleted = false';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('id', $id);
        $db->execute();

        $result = $db->fetch(PDO::FETCH_ASSOC);
        return $result ? new Image($result) : $result;
    }
    //return all images if @searchQuery has value then return all images that match @searchQuery
    public function getAllImages($searchQuery = '')
    {
        $sql = 'SELECT * FROM image WHERE deleted = false';
        if ($searchQuery) {
            $sql .= " AND title LIKE concat( '%', :query, '%' )";
        }
        $db = $this->connect();
        $db = $db->prepare($sql);
        if ($searchQuery) {
            $db->bindParam('query', $searchQuery);
        }
        $db->execute();
        $result = $db->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($result as $image) {
            $data[] = new Image($image);
        }
        return $data;
    }

    //return all images that a @user has uploaded
    public function getAllImagesByUser($user)
    {
        $sql = 'SELECT * FROM image WHERE user = :user AND deleted = false';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('user', $user);
        $db->execute();

        $result = $db->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($result as $image) {
            $data[] = new Image($image);
        }
        return $data;
    }
    //return all images that have category = @category
    public function getImagesByCategories($category)
    {
        $sql =
            'SELECT * FROM image WHERE deleted = false AND category = :category';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('category', $category);
        $db->execute();
        $result = $db->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($result as $image) {
            $data[] = new Image($image);
        }
        return $data;
    }
    // return all categories
    public function getAllCategories()
    {
        $sql = 'SELECT DISTINCT category FROM image WHERE deleted = false';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->execute();
        $result = $db->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //setters
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setViews($views)
    {
        $this->views = $views;
    }
    public function setVotes($votes)
    {
        $this->views = $votes;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function setPath($path)
    {
        $this->path = $path;
    }

    //Getters
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function isDeleted()
    {
        return $this->deleted;
    }
    public function getViews()
    {
        return $this->views;
    }
    public function getVotes()
    {
        return $this->votes;
    }
    public function getUser()
    {
        return $this->user;
    }
    //return username where user id matches user in user-table
    public function getUserName()
    {
        $sql =
            'SELECT user.username FROM user JOIN image WHERE user.id = image.user AND user.id = :id';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('id', $this->user);
        $db->execute();
        $result = $db->fetch(PDO::FETCH_ASSOC);
        return $result['username'];
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getPath()
    {
        return $this->path;
    }
}
?>
