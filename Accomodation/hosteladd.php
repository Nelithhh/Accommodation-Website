<?php 
    
    class Hosteladd{

        private $conn;
        private $tableName="hosteladd";

        private $heading;
        private $address;
        private $lat;
        private $long;
        private $price;
        private $contact;
        private $addStatus;
        private $landloardUsername;
        private $image;

        function setHeading($heading) { $this->heading = $heading; }
        function getHeading() { return $this->heading; }
        function setAddress($address) { $this->address = $address; }
        function getAddress() { return $this->address; }
        function setLat($lat) { $this->lat = $lat; }
        function getLat() { return $this->lat; }
        function setLong($long) { $this->long = $long; }
        function getLong() { return $this->long; }
        function setPrice($price) { $this->price = $price; }
        function getPrice() { return $this->price; }
        function setContact($contact) { $this->contact = $contact; }
        function getContact() { return $this->contact; }
        function setAddStatus($addStatus) { $this->addStatus = $addStatus; }
        function getAddStatus() { return $this->addStatus; }
        function setLandloardUsername($landloardUsername) { $this->landloardUsername = $landloardUsername; }
        function getLandloardUsername() { return $this->landloardUsername; }
        function setImage($image) { $this->image = $image; }
        function getImage() { return $this->image; }

        public function __construct() {
			require_once('DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}

        public function getNullLatLong(){
            $sql="SELECT * FROM $this->tableName where latitude='' and longitude='' ";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        public function getAllAdds(){
            $sql="SELECT * FROM $this->tableName";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function updateAddWithLatLongById(){
            $sql="UPDATE $this->tableName SET latitude=:lat, longitude=:lng WHERE address=:address";
            $stmt=$this->conn->prepare($sql);
            $stmt->bindParam(':lat',$this->lat);
            $stmt->bindParam(':lng',$this->long); // Changed $lng to $this->long
            $stmt->bindParam(':address',$this->address);
        
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        
    }


?>