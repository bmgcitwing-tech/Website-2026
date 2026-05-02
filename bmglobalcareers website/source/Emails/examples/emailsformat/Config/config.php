<?php 
error_reporting(1);



date_default_timezone_set('Asia/Kolkata');
// Database Parameters

$servername = "localhost";
$username = "letztravel_mlmSoftware";
$password = "mlmSoftware@1234";
$dbname = "letztravel_mlmSoftware";

// Connecting MYsql Server to be executed Database Functions

$mySql_Connecting = mysql_connect($hostname, $username, $password);
$Database_Connefinanace_appcting = mysql_select_db($dbname);


if($Database_Connecting)
{
	//echo "connected";
}


// basic functions


function userPackageDetails()
{
    $find = mysql_query("SELECT * FROM  product");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['prod_name']);

}

function memberIDDetails($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where member_id = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['memberID']);

}
function SponserplacementLEGDetails($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where member_id = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['placement_leg']);

}
function SponserplacementIDDetails($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where member_id = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['placementID']);

}

  function memberIDuniqueBYLTID($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);
               
 return($editres['member_id']);
  }

function IncomeTypeByMemberID($id, $id222)
{
	$find = mysql_query("SELECT * FROM  member_details WHERE memberID = '".$id222."' AND sponser_id = '".$id."'");
  echo "SELECT * FROM  member_details WHERE memberID = '".$id222."' AND sponser_id = '".$id."'";
          $sponser_id_member = mysql_num_rows($find);
         if($sponser_id_member > 0)
		 {
		  	return(1);  // Sponser Income
		 }else{     
 			return(2);  // Level Income
 			}


}
function memberIDDetailsBYID($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where member_id = ".$id."");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['memberID']);

}

function memberIDDetailsBYEpin($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where epin = ".$id."");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['memberID']);

}


function memberIDJoiningDtDetails($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where memberID = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['joining_date']);

}


function memberNameDetails($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where memberID = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['name']);

}

function memberEmailDetails($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where memberID = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['email']);

}


function UserWalletBalllance($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where memberID = '".$id."' OR member_id = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['cash_wallet_balance']);

}


function already_Income($id)
{
$find = mysql_query("SELECT * FROM  total_income_details WHERE whoose_income  = '".$id."' AND total_income <> 0");
  //echo "SELECT * FROM  total_income_details WHERE whoose_income  = '".$id."' AND total_income <> 0";
          $sponser_id_member = mysql_num_rows($find);
         if($sponser_id_member > 0)
		 {
		  return(1);
		 }else{     
 		return(0);
 			}


}

function AlreadyInTotalIncomeTable($id)
{
$find = mysql_query("SELECT * FROM  total_income_details WHERE member_id  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
          $sponser_id_member = mysql_num_rows($find);
         if($sponser_id_member > 0)
		 {
		  return(1);
		 }else{     
 		return(0);
 			}


}

function minimum_one_sponser($id)
{
   $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $sponser_id_member = mysql_num_rows($find);
         if($sponser_id_member > 0)
		 {
		  return(1);

		 }else{     
 		return(0);
 			}
}

function PinUsedOnDte($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where epin = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['registration_date_time']);

}
function PinUsedBYMember($id)
{
    $find = mysql_query("SELECT * FROM  member_details Where epin = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['memberID']);

}

function qualifyForRewards($id)
{
   $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $sponser_id_member = mysql_num_rows($find);
         if($sponser_id_member > 3)
		 {
		  return(1);

		 }else{     
 		return("N/A");
 			}
}


function member_details($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE member_id  = ".$id."");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['username']);
  }
  
  function member_details_by_memberID($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['member_id']);
  }

  
  
  function memberUsername($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE username  = '".$id."' OR memberID = '".$id."' OR member_id = ".$id." ");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);
               
 return($editres['member_id']);
  }
  
  
  
  function memberFullName($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);
               
 return($editres['name']);
  }
  
   function sponsermemberFullName($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);
               
 return($editres['sponser_id']);
  }
  
  
   function getPlacementID($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);
               
 return($editres['placementID']);
  }
  
  function memberPhone($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);
               
 return($editres['phone']);
  }
    function root_level_users($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE memberID  =  '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $levels_1 = mysql_fetch_array($find);
               
 return($levels_1['name']);

  	
  }
  function level_users($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $levels_1 = mysql_fetch_array($find);
               
 return($levels_1['name']);

  	
  }
  
  function level_11_users($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'A'");
  //echo SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'A'
                $levels_1 = mysql_fetch_array($find);
               
 return($levels_1['memberID']);

  	
  }
  
    function level_12_users($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'B'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $levels_2 = mysql_fetch_array($find);
               
 return($levels_2['memberID']);

  	
  }

  function level_13_users($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'C'");
  //echo "SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'C'";
                $levels_3 = mysql_fetch_array($find);
   if(empty($id))
   {            
 return('');
	}else{
	 return($levels_3['memberID']);

	}
  	
  }
  
    function level_11_usersDownline($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'A'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $levels_1 = mysql_num_rows($find);
               
 return($levels_1);

  	
  }
  
    function level_12_usersDownline($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'B'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $levels_2 = mysql_num_rows($find);
               
 return($levels_2);

  	
  }

  function level_13_usersDownline($id)
  {
    $find = mysql_query("SELECT * FROM  member_details WHERE sponser_id  = '".$id."' AND position = 'C'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $levels_3 = mysql_num_rows($find);
               
 return($levels_3);

  	
  }

  
  function total_income_details($id)
  {
    $find = mysql_query("SELECT  SUM(level_income) AS level_income, SUM(sponser_income) AS sponser_income, SUM(total_income) AS total_income FROM  total_income_details WHERE member_id  = '".$id."' ");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $levels_3 = mysql_fetch_array($find);
               
 return($levels_3);

  	
  }
  
  
  function All_downList_List($memberID, $pos)
  {
  	$count = 0;
	$mainArraySent = array();
	 $ids1111 = array();
	 $ids2222 = array();
	 $ids3333 = array();
	 $ids4444 = array();
	 $ids5555 = array();
	 $ids6666 = array();
	 $ids7777 = array();
      
	  $find = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  = '".$memberID."' AND placement_leg = '".$pos."' ");
	  //echo "SELECT * FROM  total_income_details WHERE member_id  = '".$id."' AND total_income <> 0";
	  while($frtir = mysql_fetch_array($find))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids1111, $frtir['memberID']);
	  array_push($mainArraySent, $frtir['memberID']);
      }
	  $count = $count + count($ids1111);
		$ids1111 = join("','", $ids1111);   
		
		$find222 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids1111') ");
		
		 while($frtir222 = mysql_fetch_array($find222))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids2222, $frtir222['memberID']);
	  	  array_push($mainArraySent, $frtir222['memberID']);

      }
	  	  $count = $count + count($ids2222);
		$ids2222 = join("','", $ids2222);  
		
		
		$find333 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids2222') ");
		
		 while($frtir333 = mysql_fetch_array($find333))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids3333, $frtir333['memberID']);
	  	  array_push($mainArraySent, $frtir333['memberID']);

      }
	  	  $count = $count + count($ids3333);
		$ids3333 = join("','", $ids3333);   
 

		//print_r($ids1111);
		
		$find444 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids3333') ");
		
		 while($frtir444 = mysql_fetch_array($find444))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids4444, $frtir444['memberID']);
	  	  array_push($mainArraySent, $frtir444['memberID']);

      }
	  	  $count = $count + count($ids4444);
		$ids4444 = join("','", $ids4444); 
		
		$find555 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids4444') ");
		
		 while($frtir555 = mysql_fetch_array($find555))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids5555, $frtir555['memberID']);
	  	  array_push($mainArraySent, $frtir555['memberID']);

      }
	  	  $count = $count + count($ids5555);
		$ids5555 = join("','", $ids5555);   
		
		$find666 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids5555') ");
		
		 while($frtir666 = mysql_fetch_array($find666))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids6666, $frtir666['memberID']);
	  	  array_push($mainArraySent, $frtir666['memberID']);

      }
	  	  $count = $count + count($ids6666);
		$ids6666 = join("','", $ids6666);   
   
   $find777 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids6666') ");
		
		 while($frtir777 = mysql_fetch_array($find777))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids7777, $frtir777['memberID']);
	  	  array_push($mainArraySent, $frtir777['memberID']);

      }
	  	  $count = $count + count($ids7777);
		$ids7777 = join("','", $ids7777);   
   
  
  return($mainArraySent);
  
  
  }
  
  
  
   function All_downList_List_LeaderShipTree($memberID)
  {
  	$count = 0;
	$mainArraySent = array();
	 $ids1111 = array();
	 $ids2222 = array();
	 $ids3333 = array();
	 $ids4444 = array();
	 $ids5555 = array();
	 $ids6666 = array();
	 $ids7777 = array();
      
	  $find = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  = '".$memberID."'");
	  //echo "SELECT * FROM  total_income_details WHERE member_id  = '".$id."' AND total_income <> 0";
	  while($frtir = mysql_fetch_array($find))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids1111, $frtir['memberID']);
	  array_push($mainArraySent, $frtir['memberID']);
      }
	  $count = $count + count($ids1111);
		$ids1111 = join("','", $ids1111);   
		
		$find222 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids1111') ");
		
		 while($frtir222 = mysql_fetch_array($find222))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids2222, $frtir222['memberID']);
	  	  array_push($mainArraySent, $frtir222['memberID']);

      }
	  	  $count = $count + count($ids2222);
		$ids2222 = join("','", $ids2222);  
		
		
		$find333 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids2222') ");
		
		 while($frtir333 = mysql_fetch_array($find333))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids3333, $frtir333['memberID']);
	  	  array_push($mainArraySent, $frtir333['memberID']);

      }
	  	  $count = $count + count($ids3333);
		$ids3333 = join("','", $ids3333);   
 

		//print_r($ids1111);
		
		$find444 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids3333') ");
		
		 while($frtir444 = mysql_fetch_array($find444))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids4444, $frtir444['memberID']);
	  	  array_push($mainArraySent, $frtir444['memberID']);

      }
	  	  $count = $count + count($ids4444);
		$ids4444 = join("','", $ids4444); 
		
		$find555 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids4444') ");
		
		 while($frtir555 = mysql_fetch_array($find555))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids5555, $frtir555['memberID']);
	  	  array_push($mainArraySent, $frtir555['memberID']);

      }
	  	  $count = $count + count($ids5555);
		$ids5555 = join("','", $ids5555);   
		
		$find666 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids5555') ");
		
		 while($frtir666 = mysql_fetch_array($find666))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids6666, $frtir666['memberID']);
	  	  array_push($mainArraySent, $frtir666['memberID']);

      }
	  	  $count = $count + count($ids6666);
		$ids6666 = join("','", $ids6666);   
   
   $find777 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids6666') ");
		
		 while($frtir777 = mysql_fetch_array($find777))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids7777, $frtir777['memberID']);
	  	  array_push($mainArraySent, $frtir777['memberID']);

      }
	  	  $count = $count + count($ids7777);
		$ids7777 = join("','", $ids7777);   
   
  
  return($mainArraySent);
  
  
  }
  
  

 function DOwnLineCount($id)
 {
 	$count = 0;
	 $ids1111 = array();
	 $ids2222 = array();
	  $ids3333 = array();
	  $ids4444 = array();
	  $ids5555 = array();
	  $ids6666 = array();
      $find = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  = '".$id."' ");
	  //echo "SELECT * FROM  total_income_details WHERE member_id  = '".$id."' AND total_income <> 0";
	  while($frtir = mysql_fetch_array($find))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids1111, $frtir['memberID']);
      }
	  $count = $count + count($ids1111);
		$ids1111 = join("','", $ids1111);   
		
		$find222 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids1111') ");
		
		 while($frtir222 = mysql_fetch_array($find222))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids2222, $frtir222['memberID']);
      }
	  	  $count = $count + count($ids2222);
		$ids2222 = join("','", $ids2222);  
		
		
		$find333 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids2222') ");
		
		 while($frtir333 = mysql_fetch_array($find333))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids3333, $frtir333['memberID']);
      }
	  	  $count = $count + count($ids3333);
		$ids3333 = join("','", $ids3333);   
 

		//print_r($ids1111);
		
		$find444 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids3333') ");
		
		 while($frtir444 = mysql_fetch_array($find444))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids4444, $frtir444['memberID']);
      }
	  	  $count = $count + count($ids4444);
		$ids4444 = join("','", $ids4444); 
		
		$find555 = mysql_query("SELECT * FROM  member_downline WHERE sponser_id  IN ('$ids4444') ");
		
		 while($frtir555 = mysql_fetch_array($find555))
	  {
	  //echo 'Cominf'.$frtir['memberID'];
	  array_push($ids5555, $frtir555['memberID']);
      }
	  	  $count = $count + count($ids5555);
		$ids5555 = join("','", $ids5555);   
   
 

//echo 'TOTAL DOWNLINE :::'.$count;
 return($count);

 
 }


function EmailUpLine($id)
 {
 	$count = 0;
	 $emailArray = array();
	  
      $find = mysql_query("SELECT * FROM  member_details WHERE email  = '".$id."' ");
	  //echo "SELECT * FROM  total_income_details WHERE member_id  = '".$id."' AND total_income <> 0";
	  	  while($frtir = mysql_fetch_array($find))
	  {
	   $find44444 = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$frtir['sponser_id']."' ");
	   while($frtir44444 = mysql_fetch_array($find44444))
	  {
		  $memberID = $frtir44444['sponser_id'];
	  	 array_push($emailArray, $frtir44444['email']);
	   }
	   
	   $find222 = mysql_query("SELECT * FROM  member_details WHERE memberID  = '".$memberID."' ");
	   //echo "SELECT * FROM  member_details WHERE memberID  = '".$memberID."' ";
	  	while($frtir2222 = mysql_fetch_array($find222))
	  {
	   array_push($emailArray, $frtir2222['email']);
	   }
	   
	  
      }

 

//echo 'TOTAL DOWNLINE :::'.$count;
 return($emailArray);

 
 }




  function levelCompletes($id)
  {
  $count = 0;
	$countLevel = 0;
	$leaders =   All_downList_List_LeaderShipTree($id);
		
		foreach($leaders as $row) 
				  {
	   $findminimum_one_sponser = minimum_one_sponser($row);
		if($findminimum_one_sponser == 1)
		{
		  $countLevel++;
		}
		}
		//echo 'MEMBER: '.$countLevel;
		 if($countLevel >= 3 && $countLevel <= 9)
	   {
	      
	    return(1);
		//echo 'Before'.$countLevel;
		$countLevel = $countLevel - 3;
		
		//echo 'After'.$countLevel;
	   }else if($countLevel >= 9 && $countLevel < 27)
	   {
	   	    return(2);
			$countLevel = $countLevel - 27;
	   }else
	   {
	    return(0);
	   }

  
  }
  
  function eligibleForWorldTourTree($id)
  {
  
  }
  


 function policyUsersCounts($username, $ID){
     $find = mysql_query("SELECT * FROM policy_purchase_details WHERE username='".$username."' AND purchase_id  =  ".$ID."");
                $editres = mysql_fetch_array($find);

$count22 = mysql_query("SELECT * FROM policy_purchase_details WHERE username='".$username."'  ORDER BY purchase_id DESC");
//echo "SELECT * FROM policy_purchase_details WHERE username='".$_SESSION['username']."'";

    $count = 0;
    $policyID = array();
    while($re=mysql_fetch_array($count22)){
      $count++;
      //echo 'YES'.$count;
      if($re['purchase_id'] == $editres['purchase_id']){
        //$policyID.push($count);
        //echo 'YES'.$count;
        array_push($policyID, $count);
      }
    }
    return($policyID[0]);      
    
    
}

//userWithdrawn
   function userWithdrawn($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT SUM(amount) AS totalBal FROM  user_account_balance WHERE username  = '".$id."' AND    accept_reject = 1");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);
if(mysql_num_rows($find) < 1)
{
    $editres['totalBal'] = 0;
}
               
 return($editres['totalBal']);
  }
  
  //userDownLine
   function userDownLine($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE sponser_id  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $total = mysql_num_rows($find);
 return($total);
  }
  
   //userDownLine
   function userSponser($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE username  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                 $editres = mysql_fetch_array($find);
                  return($editres['sponser_id']);
 //return($total);
  }
  
    //userEpins

function userEpins($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  epin_details WHERE username  = '".$id."' AND status = 1");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $total = mysql_num_rows($find);
 return($total);
  }
  function EpinAmount($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  epin_details WHERE epin  = '".$id."' AND status = 1");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
           $editres = mysql_fetch_array($find);

               
 return($editres['package']);
 //return($total);
  }
  

// counters
     function withdrawnCounts()
     {
          // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM withdrawn_request WHERE accept_reject <> 0  ORDER BY withdrawn_id DESC");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $rescount = mysql_num_rows($ViewQuery);
 //echo $res['user_id'];
 return($rescount);
     }

     function policySurrenderCounts()
     {
          // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM policy_purchase_details WHERE surrender = 1");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $rescount = mysql_num_rows($ViewQuery);
 //echo $res['user_id'];
 return($rescount);
     }

     function userDetailsCounts()
     {
          // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM users_details WHERE  user_status = 1 AND blocked_user = 0");
   //echo "SELECT * FROM users_details WHERE  user_status = 1 AND bloked_user = 0";
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $rescount = mysql_num_rows($ViewQuery);
 //echo $res['user_id'];
 return($rescount);
     }

      function policyDetailsCounts()
     {
          // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM policy_details WHERE  policy_status = 1");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $rescount = mysql_num_rows($ViewQuery);
 //echo $res['user_id'];
 return($rescount);
     }
     
     function ViewUserNameDetails($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE username  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['user_id']);
  }




  function client_name($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM clients WHERE client_id = $id");
 $res = mysql_fetch_array($ViewQuery);
 echo $res['name'];
  }

   function period_name($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM financial_year WHERE fy_id = $id");
 $res = mysql_fetch_array($ViewQuery);
 echo $res['financial_year'];
  }
  function username($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM users_login WHERE username  = '".$id."'");
 //echo "SELECT * FROM users_login WHERE username  = '".$id."'";
 $res = mysql_fetch_array($ViewQuery);
 //echo $res['user_id'];
 return($res['user_id']);
  }

   function username22($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM users_details WHERE user_id  = ".$id."");
 //echo "SELECT * FROM users_details WHERE user_id  = ".$id."";
 $res = mysql_fetch_array($ViewQuery);
 //echo $res['user_id'];
 return($res['username']);
  }

  function userTxnpassword($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM users_details WHERE username  = '".$id."'");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $res = mysql_fetch_array($ViewQuery);
 //echo $res['user_id'];
 return($res['txn_password']);
  }


function LevelDetails($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM users_details WHERE sponser_id  = '".$id."'");
 //echo "SELECT * FROM users_details WHERE sponser_id  = '".$id."'";
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $res = mysql_fetch_array($ViewQuery);
 $count = mysql_num_rows($ViewQuery);
 //echo 'YES'.$count;
  if($count>=1 && $count <= 2)
  {
    //echo 'YES';
      $level = 1;
     
  }else if($count>=3 && $count <= 4){
      $level = 2;
  }else if($count>=7 && $count <= 8){
      $level = 3;
  }else if($count>=15 && $count <= 16){
      $level = 4;
  }else if($count>=31 && $count <= 32){
      $level = 5;
  }else if($count>=63 && $count <= 64){
      $level = 6;
  }else{
      $level = 0;
  }
  //echo $level;

 //echo $res['user_id'];
 return($level);
  }

   function user_account_balance($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM user_account_balance WHERE username  = '".$id."'");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $res = mysql_fetch_array($ViewQuery);
 //echo $res['user_id'];
   if(mysql_num_rows($ViewQuery)>0){
       return($res['amount']);
   }else{
       return('No Balance');
   }

  }




   function PolicyName($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM policy_details WHERE policy_id  = ".$id."");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $res = mysql_fetch_array($ViewQuery);
 //echo $res['user_id'];
 return($res['policy_name']);
  }

  function PolicyAmount($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM policy_details WHERE policy_id  = ".$id."");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $res = mysql_fetch_array($ViewQuery);
 //echo $res['user_id'];
 return($res['amount']);
  }

  
  function policy_duration($id){

    // fetch exiisting Queries 

 $ViewQuery = mysql_query("SELECT * FROM policy_details WHERE policy_id  = ".$id."");
 //echo "SELECT * FROM users_details WHERE username  = '".$id."'";
 $res = mysql_fetch_array($ViewQuery);
 //echo $res['user_id'];
 return($res['policy_duration']);
  }

  


  function ViewPhoneDetails($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE username  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['mobile_number']);
  }

 function ViewPackageDetails($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  epin_details WHERE epin  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['package']);
  }

  function ViewFullNameDetails($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE username  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['fullName']);
  }

  function ViewAcc_NODetails($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE username  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['ac_number']);
  }
   function ViewBankDetails($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE username  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['bank_name']);
  }

   function ViewIFSCDetails($id){

    // fetch exiisting Queries 

  $find = mysql_query("SELECT * FROM  users_details WHERE username  = '".$id."'");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
                $editres = mysql_fetch_array($find);

               
 return($editres['ifsc_code']);
  }





// DATABASE FUNCTIONS

function insert_data($table_name, $data)
      {
        //echo 'COmig';
        $query = "insert into ".$table_name." (";
        foreach($data as $column => $values)
          {
            if(!is_numeric($column))
              {
                $query .= "".$column.",";
              }
          }
        $query = substr($query, 0, -1) . ") values (";
        foreach($data as $column => $values)
          {
            if(!is_numeric($column))
              {
                $query .= "'".$values."',";
              }
          }
        $query = substr($query, 0, -1) . ")";
        //echo 'QRY '.$query;
        $res = mysql_query($query);
        if($res)
        {
          return $res;

        }
        else
        {
          $mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
            //echo sql_err($mysql_error);
            echo '++++===='.$mysql_error;
        }
        
      }
      
      function update_data($table_name, $data, $condition)
      {
        $query = "update ".$table_name." set ";
        foreach($data as $column => $values)
          {
            if(!is_numeric($column))
              {
                $query .= "".$column."='".$values."', ";
              }
          }
        $query = substr($query, 0, -2) ." where ";
          $query .= "".$condition."";
        
        $res = mysql_query($query);
        if($res)
        {
          return $res;
        }
        else
        {
          $mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
            echo $mysql_error;
        }
        
      }
      
      function delete_data($table_name, $condition)
        {
          $query = "delete from ".$table_name." where ";
          //$query .= "".key($condition)." = '". $condition[key($condition)]."' limit 1";
          $query .= "".$condition." limit 1";
          
          $res = mysql_query($query);
          if($res)
          {
            return $res;
          }
          else
          {
            $mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
            echo sql_err($mysql_error);
          }
          
        }
    
// sending sms to users
      
function sendSMStoUsers($number, $username, $password, $txnpassword)
{

      // Account details
      $apiKey = urlencode('0104i0NW40DDYK7EtvtflhsXOovaLK');
      
      // Message details
      $numbers = array('91'.$number);
      $sender = urlencode('BUSNSS');
      $message = "Welcome to wealthindiaenterprises
          Hi, your username is ".$username." and password is ".$password." and Transaction password is ".$txnpassword."";
         
     
      $numbers = implode(',', $numbers);
     
      
      // Prepare data for POST request
      $data = array('usr'=> 717470, 'apikey' => $apiKey, 'ph' => $numbers, "sndr" => $sender, "text" => $message, "rpt" => 1);
     
      // Send the POST request with cURL
      $ch = curl_init('http://sender.dhgv.net/api/pushsms.php');
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);
      
      // Process your response here
     if($response)
     {
        return(1);
     }
  
}
	
				
				

?>
