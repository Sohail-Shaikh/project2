
<?php
require_once('database.php');
class manage_list extends MySQLi_Db
{
	public $myemail;
	public $list;
	public $result;
	public $row;
	public $rows;
	public $detail;
	public $db;
	public $lists;
	public $mypassword;

		public function __construct()
		{
        	$this->list ='';
        	$this->result ='';
        	$this->row ='';
        	$this->rows ='';
        	$this->detail ='';
        	$this->lists ='';
        	$this->myemail ='';
        	$this->mypassword ='';
        	parent::__construct();
    	}

		public function user_list()
		{
			$this->list.="<div class='table-responsive'>".
			"<div class='container'>".
			"<table class='table' border='1'>".
			"<thead>".
			"<tr id='column'>".
			"<th>"."user no"."</th>".
			"<th>"."FirstName"."</th>".
			"<th>"."LastName". "</th>".
			"<th>"."User Profile". "</th>".
			"<th>"."Action". "</th>".    
			"<th>"."Action". "</th>".
			"</tr>";
			$q="SELECT user_no,FirstName,LastName,user_img FROM manage_list";
			$result = parent::query($q);
			$this->rowss=parent::fetch();
			
			foreach($this->rowss as $this->row)
			{
				$this->list.="<tr>".
				"<td>" . $this->row['user_no'] . "</td>".
				"<td><a href='detail.php?id=" . $this->row['user_no'] . "'>" .$this->row['FirstName']. "</a> </td>".
				"<td><a href='detail.php?id=" . $this->row['user_no'] . "'>".$this->row['LastName']. "</a> </td>".
				"<td><img src=".$this->row['user_img']." width='80' height='60'></td>".
				"<td><a href='edit.php?id=" . $this->row['user_no'] . "'>Edit</a></td>".
				"<td><a href='user_lists.php?id=". $this->row['user_no']."' onClick=\"return confirm('are you sure you want to delete??');\">Delete</a></td>".
				"</tr>";
			}
			
			return $this->list;
		}

		public function user_search_list($data)
		{
			$this->lists.="<table class='table' border='1'><tr>".
			"<tr>".
			"<th>"."user no"."</th>".
			"<th>"."FirstName"."</th>".
			"<th>"."LastName". "</th>".
			"<th>"."User Profile". "</th>".
			"<th>"."Action". "</th>".    
			"<th>"."Action". "</th>".
			"</tr>";
			$q="SELECT user_no,FirstName,LastName,user_img FROM manage_list WHERE FirstName LIKE '$data'";
			$result = parent::query($q);
			$this->rowss=parent::fetch();
			foreach ($this->rowss as $this->rows) 
			{
  				$this->lists.="<tr>".
				"<td>" . $this->rows['user_no'] . "</td>".
				"<td><a href='detail.php?id=" . $this->rows['user_no'] . "'>" .$this->rows['FirstName']. "</a> </td>".
				"<td><a href='detail.php?id=" . $this->rows['user_no'] . "'>".$this->rows['LastName']. "</a> </td>".
				"<td><img src=".$this->rows['user_img']." width='80' height='60'></td>".
				"<td><a href='edit.php?id=" . $this->rows['user_no'] . "'>Edit</a></td>".
				"<td><a href='user_lists.php?id=" . $this->rows['user_no'] . "' onClick=\"return confirm('are you sure you want to delete??');\">Delete</a></td>".
				"</tr>";
			} 
			return $this->lists;
		}

		public function delete($data,$table)
		{
				$del="DELETE from $table WHERE user_no=".$data." limit 1";
				$result = parent::query($del);
				if($result)
				{
					//query executed
				}
				else
				{
					echo"Error";
				}
		}

		public function detail($data,$table)
		{
			echo "<table border='1'><tr>";
			$query="select * from ".$table." where user_no=".$data."";
			$result = parent::query($query);
			$fields_num = mysqli_num_fields($result);
			echo "<table border='1'><tr>";
			for($i=0; $i<$fields_num; $i++)
			{
			    $field = mysqli_fetch_field($result);
			    echo "<td>{$field->name}</td>";
			}
			echo "</tr>\n";
			while($this->row = mysqli_fetch_row($result))
			{
			    $this->detail.="<tr>".
			  	"<td width='10%'>" . $this->row['0'] . "</td>".
			    "<td>" . $this->row['1'] . "</td>".
				"<td>" . $this->row['2'] . "</td>".
				"<td>" . $this->row['3'] . "</td>".
				"<td>" . $this->row['4'] . "</td>".
				"<td>" . $this->row['5'] . "</td>".
				"<td>" . $this->row['6'] . "</td>".
				"<td>" . $this->row['7'] . "</td>".
				"<td>" . $this->row['8'] . "</td>".
				"<td>" . "<img src='".$this->row['9']."' width='80' height='60'>" . "</td>".
		 		"<td>" . $this->row['10'] . "</td>".
			    "</tr>";
			}
				echo $this->detail;
		}

		public function update(array $data)
		{
			$checkbox1=$_POST['language'];
			$data_lang=implode(",",$checkbox1);
			$sql="UPDATE manage_list SET FirstName='".$data['update_fnamee']."',LastName='".$data['update_lnamee']."', user_city='".$data['update_city']."',user_mobile_no='".$data['emp_mo']."',user_email='".$data['user_email']."', user_dob='".$data['user_dob']."',user_lang='$data_lang',user_gender='".$data['update_gender']."',user_img='".$data['user_images']."' where user_no='".$data['user_noo']."'";
			return $result=parent::query($sql);
		}

		public function update_img(array $data)
		{
			$sql="update manage_list set user_img='".$data['user_image']."' where user_no='".$data['user_nooo']."'";
			return $result=parent::query($sql);
		}

		public function create(array $data,$img)
		{
			$data_lang=implode(",",$data['language']);
			$sql="insert into manage_list (FirstName,LastName,user_gender,user_no,user_city,user_dob,user_mobile_no,user_email,user_img,user_lang)values('".$data['user_fname']."','".$data['user_lname']."','".$data['gender']."','".$data['user_noo']."','".$data['city']."','".$data['user_dob']."','".$data['user_mob']."','".$data['user_email']."','$img','$data_lang')";
			return $result=parent::query($sql);	
		}

		public function display_Old_Data($data)
		{
			$query="SELECT * FROM manage_list WHERE user_no='$data'";
			$result = parent::query($query);
			$this->row=mysqli_fetch_array($result);
			return $this->row;
		}

		public function logout()
		{
			session_start();
			if(session_destroy())
			{
				header("Location: admin.php");
			}
		}

		public function admin_login(array $data)
		{
			$this->myemail=$_POST['emails']; 
			$this->mypassword=md5($_POST['passwords']); 
			$sql="SELECT id FROM admin_login WHERE Email='$this->myemail' and Password='$this->mypassword'";
			$this->result=parent::query($sql);
			$this->row=mysqli_fetch_array($this->result,MYSQLI_ASSOC);
			$count=mysqli_num_rows($this->result);
			//If result matched $myusername and $mypassword, table row must be 1 row
			if($count==1)
			{
				if (session_id() == '') 
				{
			  		session_start();
				}
				$_SESSION['login_user']=$this->myemail;
				header("location: user_lists.php");
			}
			else 
			{
				echo"<script type='text/javascript'>alert('Your Email or Password is invalid!')</script>";
			}
		}
}




?>