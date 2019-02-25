<?php
	class basicData {
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "bds";

		public $connection;

		public function __construct(){
			$conn = new mysqli($this-> host,$this-> user,$this-> pass,$this-> db);
			$this-> connection = $conn;
		}

		//data insert method ------>
		public function studentDataInsert($name,$email,$cell,$batch,$uimage,$imaget){
			$sql ="INSERT INTO student_info (name,email,cell,batch,image) VALUES('$name','$email','$cell','$batch','$uimage')";
			$data = $this-> connection-> query($sql);
			move_uploaded_file($imaget,'img/'.$uimage);

			if($data){
				return "<h2 style ='color: green;'> Data Insert Successfull</h2>";
			}else{
				return "<h2 style ='color: red;'> Data Insert Field!</h2>";
			}
		}

		// data dorar way database theke 
		public function dataaso(){
			$sql = "SELECT * FROM student_info ORDER BY id DESC ";
			$data = $this-> connection -> query($sql);
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		// delete method delete query 
		public function deletekoren($id){
			$sql = "DELETE FROM student_info WHERE id = '$id'";
			$data = $this-> connection -> query($sql);

			if($data){
				return true;
			}else{
				return false;
			}
		}

	}

?>