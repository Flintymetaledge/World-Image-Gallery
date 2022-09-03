<?php
class UserVotes extends BaseModel
{
    private $id;
    private $userId;
    private $imageId;
    private $vote;

    function __construct($data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['userid'])) {
            $this->userId = $data['userid'];
        }
        if (isset($data['imageid'])) {
            $this->imageId = $data['imageid'];
        }
        if (isset($data['vote'])) {
            $this->vote = $data['vote'];
        }
    }
    // returns if user has voted on image
    public function checkUserVote($userId, $imageId)
    {
        $sql =
            'SELECT * FROM uservotes WHERE userid = :userid AND imageid = :imageid';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('userid', $userId);
        $db->bindParam('imageid', $imageId);
        $db->execute();

        $result = $db->fetch(PDO::FETCH_ASSOC);
        return $result ? new UserVotes($result) : $result;
    }
    //save user vote to data base
    public function saveUserVote()
    {
        $sql =
            'INSERT INTO uservotes (userid, imageid, vote) VALUES (:userid, :imageid, :vote)';
        $db = $this->connect();
        $query = $db->prepare($sql);
        $query->bindParam('userid', $this->userId);
        $query->bindParam('imageid', $this->imageId);
        $query->bindParam('vote', $this->vote);
        $query->execute();
    }
    //change user vote in database
    public function changeUserVote()
    {
        $sql =
            'UPDATE uservotes SET vote = :vote WHERE userid = :userid And imageid = :imageid';
        $db = $this->connect();
        $db = $db->prepare($sql);
        $db->bindParam('vote', $this->vote);
        $db->bindParam('userid', $this->userId);
        $db->bindParam('imageid', $this->imageId);
        $db->execute();
    }

    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function getImageId()
    {
        return $this->imageId;
    }
    public function getVote()
    {
        return $this->vote;
    }

    //setter
    public function setUserId($userId)
    {
        return $this->userId = $userId;
    }
    public function setImageId($imageId)
    {
        return $this->imageId = $imageId;
    }
    public function setVote($vote)
    {
        return $this->vote = $vote;
    }
}
?>
