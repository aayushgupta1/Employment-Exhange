<?php 
class DB_Functions {
 
    public $conn='default value' ;
	public $db='default value' ;
 
    function __construct() {
        require_once __DIR__ . '/db_connect.php';
        // connecting to database
        $this->db = new db_connect();
        $this->conn = $this->db->connect();
		
		if (!$this->conn) {
			echo $abc;
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
    }
 
    function __destruct() {
         
    }
 /*

Store the applicant and his respective login details 

 */

    public function storeApplicant($username, $id, $password,$type,$NAME,$PWD,$DOB,$EMAIL,$ADDR,$PHONE,$RELIGION,$CASTE,$M_STATUS,$CODE,$SUB_TYPE) {
 
        $stid = oci_parse($this->db->con, 'INSERT INTO LOGIN (USERNAME,PASSWORD,TYPE,ID ) VALUES(:INSUSERNAME,:INSPASSWORD,:INSTYPE,:INSID)');
        $stid1 = oci_parse($this->db->con,'INSERT INTO APPLICANT (ID,NAME,PWD,DOB,EMAIL,ADDR,PHONE,RELIGION,CASTE,M_STATUS,CODE,SUB_TYPE) VALUES (INSID1,INSNAME,INSPWD,INSDOB,INSEMAIL,INSADDR,INSPHONE,INSRELIGION,INSCASTE,INSM_STATUS,INSCODE,INSSUB_TYPE)');
        oci_bind_by_name($stid,':INSUSERNAME',$username);
		oci_bind_by_name($stid,':INSID',$id);
		oci_bind_by_name($stid,':INSPASSWORD',$password);
		oci_bind_by_name($stid,':INSTYPE',$type);
        oci_bind_by_name($stid1,':INSID1',$id);
        oci_bind_by_name($stid1,':INSNAME',$NAME);
        oci_bind_by_name($stid1,':INSPWD',$PWD);
        oci_bind_by_name($stid1,':INSDOB',$DOB);
        oci_bind_by_name($stid1,':INSEMAIL',$EMAIL);
        oci_bind_by_name($stid1,':INSADDR',$ADDR);
        oci_bind_by_name($stid1,':INSPHONE',$PHONE);
        oci_bind_by_name($stid1,':INSRELIGION',$RELIGION);
        oci_bind_by_name($stid1,':INSCASTE',$CASTE);
        oci_bind_by_name($stid1,':INSM_STATUS',$M_STATUS);
        oci_bind_by_name($stid1,':INSCODE',$CODE);
        oci_bind_by_name($stid1,':INSSUB_TYPE',$SUB_TYPE);
        

		$ttt = oci_execute($stid);
        oci_free_statement($stid);
 
        // check for successful store
        if ($ttt) {
          $ttt1 = oci_execute($stid1);
        oci_free_statement($stid1);
        if ($ttt1) {
           $stid = oci_parse($this->conn,'SELECT * FROM LOGIN WHERE USERNAME = :USERNAME');
            oci_bind_by_name($stid,':USERNAME',$username);
            $r = oci_execute($stid);
            $user = oci_fetch_assoc($stid);
            oci_free_statement($stid);
            return $user;
        }
        else {
            $stid = oci_parse($this->conn,'DELETE FROM LOGIN WHERE USERNAME = :USERNAME');
            oci_bind_by_name($stid,':USERNAME',$username);
            $r = oci_execute($stid);
            return false;

         }
        }

        else 
        {
            return false;
        }
    }
/*

Store the COMPANIES and THEIR respective login details 

 */

    public function storeCompanies($username, $id, $password,$type,$NAME,$ADDR,$HR_NAME,$HR_EMAIL,$HR_PHONE,$VERIFIED,$TENDERS_FLOATED,$JOBS_FLOATED,$SUB_TYPE) {
 
        $stid = oci_parse($this->db->con, 'INSERT INTO LOGIN (USERNAME,PASSWORD,TYPE,ID ) VALUES(:INSUSERNAME,:INSPASSWORD,:INSTYPE,:INSID)');
        $stid1 = oci_parse($this->db->con,'INSERT INTO COMPANIES (ID,NAME,ADDR,HR_NAME,HR_EMAIL,HR_PHONE,VERIFIED,TENDERS_FLOATED,JOBS_FLOATED,SUB_TYPE) VALUES (INSID1,INSADDR,INSHR_NAME,INSHR_EMAIL,INSHR_PHONE,INSVERIFIED,INSTENDERS_FLOATED,INSJOBS_FLOATED,INSSUB_TYPE)');
        oci_bind_by_name($stid,':INSUSERNAME',$username);
        oci_bind_by_name($stid,':INSID',$id);
        oci_bind_by_name($stid,':INSPASSWORD',$password);
        oci_bind_by_name($stid,':INSTYPE',$type);
        oci_bind_by_name($stid1,':INSID1',$id);
        oci_bind_by_name($stid1,':INSNAME',$NAME);
        oci_bind_by_name($stid1,':INSADDR',$ADDR);
        oci_bind_by_name($stid1,':INSHR_NAME',$HR_NAME);
        oci_bind_by_name($stid1,':INSHR_EMAIL',$HR_EMAIL);
        oci_bind_by_name($stid1,':INSHR_PHONE',$HR_PHONE);
        oci_bind_by_name($stid1,':INSVERIFIED',$VERIFIED);
        oci_bind_by_name($stid1,':INSTENDERS_FLOATED',$TENDERS_FLOATED);
        oci_bind_by_name($stid1,':INSJOBS_FLOATED',$JOBS_FLOATED);
        oci_bind_by_name($stid1,':INSSUB_TYPE',$SUB_TYPE);
        

        $ttt = oci_execute($stid);
        oci_free_statement($stid);
 
        // check for successful store
        if ($ttt) {
          $ttt1 = oci_execute($stid1);
        oci_free_statement($stid1);
        if ($ttt1) {
           $stid = oci_parse($this->conn,'SELECT * FROM LOGIN WHERE USERNAME = :USERNAME');
            oci_bind_by_name($stid,':USERNAME',$username);
            $r = oci_execute($stid);
            $user = oci_fetch_assoc($stid);
            oci_free_statement($stid);
            return $user;
        }
        else {
            $stid = oci_parse($this->conn,'DELETE FROM LOGIN WHERE USERNAME = :USERNAME');
            oci_bind_by_name($stid,':USERNAME',$username);
            $r = oci_execute($stid);
            return false;

         }
        }

        else 
        {
            return false;
        }
    }
/*

Store the CONTRACTOR and THEIR respective login details 

 */

    public function storeContractor($username, $id, $password,$type,$NAME,$ADDR,$HR_NAME,$HR_EMAIL,$HR_PHONE,$VERIFIED,$TENDERS_RESPONDED,$JOBS_FLOATED,$SUB_TYPE) {
 
        $stid = oci_parse($this->db->con, 'INSERT INTO LOGIN (USERNAME,PASSWORD,TYPE,ID ) VALUES(:INSUSERNAME,:INSPASSWORD,:INSTYPE,:INSID)');
        $stid1 = oci_parse($this->db->con,'INSERT INTO CONTRACTOR (ID,NAME,ADDR,HR_NAME,HR_EMAIL,HR_PHONE,VERIFIED,JOBS_FLOATED,TENDERS_RESPONDED,SUB_TYPE) VALUES (INSID1,INSADDR,INSHR_NAME,INSHR_EMAIL,INSHR_PHONE,INSVERIFIED,INSJOBS_FLOATED,INSTENDERS_RESPONDED,INSSUB_TYPE)');
        oci_bind_by_name($stid,':INSUSERNAME',$username);
        oci_bind_by_name($stid,':INSID',$id);
        oci_bind_by_name($stid,':INSPASSWORD',$password);
        oci_bind_by_name($stid,':INSTYPE',$type);
        oci_bind_by_name($stid1,':INSID1',$id);
        oci_bind_by_name($stid1,':INSNAME',$NAME);
        oci_bind_by_name($stid1,':INSADDR',$ADDR);
        oci_bind_by_name($stid1,':INSHR_NAME',$HR_NAME);
        oci_bind_by_name($stid1,':INSHR_EMAIL',$HR_EMAIL);
        oci_bind_by_name($stid1,':INSHR_PHONE',$HR_PHONE);
        oci_bind_by_name($stid1,':INSVERIFIED',$VERIFIED);
        oci_bind_by_name($stid1,':INSJOBS_FLOATED',$JOBS_FLOATED);
        oci_bind_by_name($stid1,':INSTENDERS_RESPONDED',$TENDERS_RESPONDED);
        oci_bind_by_name($stid1,':INSSUB_TYPE',$SUB_TYPE);
        


        $ttt = oci_execute($stid);
        oci_free_statement($stid);
 
        // check for successful store
        if ($ttt) {
          $ttt1 = oci_execute($stid1);
        oci_free_statement($stid1);
        if ($ttt1) {
           $stid = oci_parse($this->conn,'SELECT * FROM LOGIN WHERE USERNAME = :USERNAME');
            oci_bind_by_name($stid,':USERNAME',$username);
            $r = oci_execute($stid);
            $user = oci_fetch_assoc($stid);
            oci_free_statement($stid);
            return $user;
        }
        else {
            $stid = oci_parse($this->conn,'DELETE FROM LOGIN WHERE USERNAME = :USERNAME');
            oci_bind_by_name($stid,':USERNAME',$username);
            $r = oci_execute($stid);
            return false;

         }
        }

        else 
        {
            return false;
        }
    }
     /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($username, $password) {
		
        $stmt = oci_parse($this->db->con, 'SELECT * FROM LOGIN WHERE USERNAME = :USERNAME');
		oci_bind_by_name($stmt,':USERNAME',$username);
        if ($ttt = oci_execute($stmt)) {
            $user = oci_fetch_assoc($stmt);
            // verifying user password
            $fetched_password = $user['PASSWORD'];
			oci_free_statement($stmt);
            // check for password equality
            if ($fetched_password == $password) {
                // user authentication details are correct
                return $user;
            }
        } else {
			echo 'abc';
            return NULL;
        }
    }
 
    /**
     * Check user is existed or not
     */
    public function doesUserExist($username) {
        $stmt = oci_parse($this->conn, 'SELECT count(*) AS COUNT FROM LOGIN WHERE USERNAME = :USERNAME');
		oci_bind_by_name($stmt,':USERNAME',$username);        
		oci_define_by_name($stmt, 'COUNT', $num_rows);
        oci_execute($stmt);
		oci_fetch($stmt);
        if ($num_rows > 0) {
            // user existed 
            oci_free_statement($stmt);
            return true;
        } else {
            // user not existed
            oci_free_statement($stmt);
            return false;
        }
    } 
 
}
 
?>