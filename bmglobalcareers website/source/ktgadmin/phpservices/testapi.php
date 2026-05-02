<?php

$result = array();


// $ipaddress = $_GET['ipaddress'];
// $dbname = $_GET['dbname'];
// $uname = $_GET['uname'];
// $password = $_GET['password'];

require_once('db_con.php');

try {

    $class_id = $_GET['class_id'];
    $sec_id = $_GET['sec_id'];
    $subj_id = $_GET['subj_id'];
    $staff_id = $_GET['staff_id'];
    $homework = $_GET['homework'];
    $hwdate = $_GET['hwdate'];
    $submittime = $_GET['submittime'];
    $sch_id = $_GET['sch_id'];

    $homework = stripslashes($homework);

    $response = mssql_query("insert into homework(hw_class_id,hw_sec_id,hw_subj_id,hw_homework,hw_staff_id,hw_sch_id,hw_date,hw_pubid,hw_time) values('" . $class_id . "','" . $sec_id . "','" . $subj_id . "','" . $homework . "','" . $staff_id . "','" . $sch_id . "','" . $hwdate . "',1,'" . $submittime . "')");

    if ($response) {
        $hw_id = 0;
        $qry = mssql_query("select MAX(hw_id) as hw_id from homework");
        if (mssql_num_rows($qry) > 0) {
            while ($row = mssql_fetch_assoc($qry)) {
                $hw_id = $row['hw_id'];
            }
            mssql_query("insert into homeworkstatus select '" . $hw_id . "' as hws_hw_id,std_id as hws_std_id,CONVERT(date,GETDATE()) as hws_sdate,0 as hws_sflag from std_master where std_class=" . $class_id . " and std_section=" . $sec_id . "");

           $qrymc=mssql_query("select distinct std_id,std_name,token,class_name+section_name as classname from std_master,NotifyMaster,class_master,section_master  where std_class=".$class_id." and std_section=".$sec_id." and std_id=User_Login_ID  and user_type=3 and n_Active=1 and section_id=std_section and std_class=class_id  ");

            if (mssql_num_rows($qrymc) > 0) {
                while ($rowp = mssql_fetch_assoc($qrymc)) {
                    $token = $rowp['token'];
                    
                    $stdname=$rowp['std_name'];
                    $classname=$rowp['classname'];

                    $notiTitle = "Homework ".$stdname."-".$classname."";
                    $notiMessage =$homework;
                    sendNotification($notiTitle, $notiMessage, $token);
                }
            }

            
        }
        $result['status'] = '1';
        echo json_encode($result);
        
    } else {
        $result['status'] = '0';
        echo json_encode($result);
    }
} catch (Exception $ex) {
    $result['status'] = $ex->getMessage();
    echo json_encode($result);
}

function sendNotification($title, $msg, $token) {

    $titlee = $title;
    $message = $msg;
    $path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
    $server_key = "AAAAxOYHZSw:APA91bHkl5vAePcpMEcaIogTUFaiZIyGC__4R9NuU2HYdE_tKfuP08-z76IaF7wcC8OPbgzUlbFqnZpbj6CRzBuLxfbRw1_RHmwS6Oo77w8z5d91LZyctC9SaGQ-FHISliSuQo18G9AK";

    $regkey[] = $token;

    $headers = array(
        'Authorization:key=' . $server_key,
        'Content-Type : application/json');

    $fields = array('registration_ids' => $regkey, 'notification' => array('title' => $titlee, 'body' => $message));

    $payload = json_encode($fields);


    $curl_session = curl_init();
	
	$options = array(
        CURLOPT_URL => $path_to_fcm,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => $headers
    );

		curl_setopt_array($curl_session, $options);
		$result = curl_exec($curl_session);
		curl_close($curl_session);
}
