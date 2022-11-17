
<?php
	
		$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');

?>

<?php

	/**
	 * 
	 */
	class customer 
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			// code...
			$this->db = new Database();
			$this->fm = new Format();

		}
		public function insert_customer($data){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			$city = mysqli_real_escape_string($this->db->link,$data['city']);
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			$country = mysqli_real_escape_string($this->db->link,$data['country']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$password = mysqli_real_escape_string($this->db->link,md5($data['password']));

			if ($name == "" || $city == "" || $zipcode == "" ||
				$email == "" || $address == "" || $country == "" || $phone =="" || $password =="") {

				$alert = "<span class='error'> Fields must be empty  </span>";
				return $alert;
			} else {
				$check_email = "SELECT * FROM customer WHERE email ='$email' LIMIT 1 ";
				$res_check = $this->db->select($check_email);
				if ($res_check) {
					$alert = "<span class='error'> Email already existed </span>";
					return $alert;
				} else {
					$query = "INSERT INTO customer(name, city, zipcode, email, address, country, phone,password) VALUES('$name', '$city', '$zipcode', '$email', '$address', '$country', '$phone', '$password')";
				$result = $this->db->insert($query);

				if ($result) {
					$alert = "<span class='success'> Customer created successfully  </span>";
					return $alert;
				} else {
					$alert = "<span class='error'> Customer created not success  </span>";
					return $alert;
					}
				}
			}
		}

		public function login_customer($data){
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$password = mysqli_real_escape_string($this->db->link,md5($data['password']));


			if ($email == '' || $password =='') {
				$alert = "<span class='error'> Password and Email must be empty  </span>";
				return $alert;
			} else {
				$check_login = "SELECT * FROM customer WHERE email ='$email' AND password = '$password' LIMIT 1 ";
				$res_check = $this->db->select($check_login);
				if ($res_check) {
					$value = $res_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);	
					Session::set('customer_name', $value['name']);
					header('Location:order.php');			
				} else {
					$alert = "<span class='error'> Password and Email doesn't match </span>";
					return $alert;
				}
			}
		}

		public function show_customer($id) {
			$query = "SELECT * FROM customer WHERE id='$id' ";
			$res_check = $this->db->select($query);
			return $res_check;

		}

		public function update_customer($data,$id){
			$name = mysqli_real_escape_string($this->db->link,$data['name']);
			// $city = mysqli_real_escape_string($this->db->link,$data['city']);
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$address = mysqli_real_escape_string($this->db->link,$data['address']);
			// $country = mysqli_real_escape_string($this->db->link,$data['country']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			// $password = mysqli_real_escape_string($this->db->link,md5($data['password']));

			if ($name == "" || $zipcode == "" || $email == "" || $address == ""|| $phone =="") {

				$alert = "<span class='error'> Fields must be empty  </span>";
				return $alert;
			} else {				
				$query = "UPDATE customer SET name='$name' , zipcode='$zipcode' , email='$email' , address='$address' , phone='$phone' WHERE id ='$id' ";
				$result = $this->db->update($query);

				if ($result) {
					$alert = "<span class='success'> Customer updated successfully  </span>";
					return $alert;
				} else {
					$alert = "<span class='error'> Customer updated not success  </span>";
					return $alert;
				}
				
			}
		}


}

?>