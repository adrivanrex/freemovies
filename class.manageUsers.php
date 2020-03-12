<?php

include_once('database.php');

$datetime = date_create()->format('Y-m-d H:i:s');

class ManageUsers{
    public $link;

    function __construct(){
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }


    function registerUsers($username,$password,$firstName,$middleName,$lastName,$mobileNumber){
        $datetime = date_create()->format('Y-m-d H:i:s');
        $reg_date = $datetime;
        $query = $this->link->prepare("INSERT INTO movies.users (username,password,firstName,middleName,lastName,mobileNumber,reg_date) VALUES (?,?,?,?,?,?,?)");
        $values = array($username,$password,$firstName,$middleName,$lastName,$mobileNumber,$reg_date);
        $query->execute($values);
        $counts = $query->rowCount();
        $register = $counts;
        // add subscription 

        $query = $this->link->query("SELECT * FROM movies.subscription WHERE username='$username'");
         $rowCount = $query->rowCount();

         if($rowCount == 0){
            $datetime = date_create()->format('Y-m-d H:i:s');
            $reg_date = $datetime;
            $query = $this->link->prepare("INSERT INTO movies.users (username,reg_date) VALUES (?,?)");
            $values = array($username,$datetime);
            $query->execute($values);
            $counts = $query->rowCount();
         }

        return $register;
    



    }

   

    function addMovie($title,$logo,$description,$category,$user,$filename){
        $datetime = date_create()->format('Y-m-d H:i:s');
        $reg_date = $datetime;
        $query = $this->link->prepare("INSERT INTO movies.movie (title,logo,description,creation_date,user,category,filename) VALUES (?,?,?,?,?,?,?)");
        $values = array($title,$logo,$description,$reg_date,$user,$category,$filename);
        $query->execute($values);
        $counts = $query->rowCount();
    }

    function movieList($title,$limit){
        $query = $this->link->query("SELECT * FROM movie WHERE title LIKE '$title'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowcount;
        }
    }

    function allMovieList($startLimit,$endLimit){
        $query = $this->link->query("SELECT * FROM movie  ORDER BY id DESC LIMIT ".$startLimit.",".$endLimit." ");
        $rowcount = $query->rowCount();
        if($rowcount == 0){
            return $rowcount;
        }else{
            $result = $query->fetchAll();
            return $result;
        }
    }

    function searchMovie($id){
        $query = $this->link->query("SELECT * FROM movie WHERE id = '$id'");
        $rowcount = $query->rowCount();
        if($rowcount == 0){
            return $rowcount;
        }else{
            $result = $query->fetchAll();
            return $result;
        }
    }

    function latestMovieList($startLimit,$endLimit){
        $query = $this->link->query("SELECT * FROM movie  ORDER BY id DESC LIMIT ".$startLimit.",".$endLimit."");
        $rowcount = $query->rowCount();
        if($rowcount == 0){
            return $rowcount;
        }else{
            $result = $query->fetchAll();
            return $result;
        }
    }



    function loginLog($username){
        $query = $this->link->query("SELECT * FROM loginLog WHERE username='$username'");
       
        $rowCount = $query->rowCount();
        if($rowCount == 0){
            $loginCount = 0;
            $query = $this->link->prepare("INSERT INTO loginLog (username,loginCount) VALUES (?,?)");
            $values = array($username,$loginCount);
            $query->execute($values);
        }else{
            $query = $this->link->query("SELECT * FROM loginLog WHERE username='$username'");
       
            $rowCount = $query->rowCount();
            if($rowCount == 1){
                $result = $query->fetchAll();
                $count = $result[0]["loginCount"];
                $count = $count+1;
                $query = $this->link->query("UPDATE loginLog SET loginCount ='$count' WHERE username='$username'");
                $rowcount = $query->rowCount();
            };

            

        }
    }
        function checkBalance($username){

        $query = $this->link->query("SELECT * FROM balance WHERE username='$username'");
       
        $rowCount = $query->rowCount();
        if($rowCount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowCount;
        }
        
     
        
    }


    function CheckUserExist($username){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
        $rowcount = $query->rowCount();
        return $rowcount;
    }

    function LoginUser($username,$password){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        return $rowcount;
    }

    function registerUserInfo($username,$password,$firstName,$middleName,$lastName){
        $query = $this->link->query("SELECT * FROM userinfo WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $query = $this->link->prepare("INSERT INTO userinfo (username,firstName,middleName,lastName) VALUES (?,?,?,?)");
            $values = array($username,$firstName,$middleName,$lastName);
            $query->execute($values);
            $counts = $query->rowCount();
            return $counts;
        }

    }

    function GetUserInfo($username){

        $query = $this->link->query("SELECT * FROM userinfo WHERE username = '$username'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowcount;
        }
    }

    function paypalTopup($username,$amount,$paymentId){

        /** Check if paypal transaction is already used **/

        $query = $this->link->query("SELECT * FROM paypal WHERE username = '$username' AND paymentId = '$paymentId'");
        $rowcount = $query->rowCount();
        if($rowcount === 0){
            $query = $this->link->prepare("INSERT INTO paypal (username,paymentId,amount) VALUES (?,?,?)");
            $values = array($username,$paymentId,$amount);
            $query->execute($values);

            // Top up to balance
            $query = $this->link->query("UPDATE balance SET balance ='$amount' WHERE username='$username'");
            $rowcount = $query->rowCount();
            return $rowcount;

        }else{
            return 0;

        }


    }

    function generateInviteCode($username,$password,$inviteCode,$userInviter,$status){
        $inviteDate = date("H:i:s");

        /** check Login User **/
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            /** Insert Invite Code or generate Invite Code **/
            if($inviteCode){
                
            }else{
                $inviteCode = time();
            }

            $query = $this->link->prepare("INSERT INTO invite (user,userInviter,inviteDate,status,inviteCode) VALUES (?,?,?,?,?)");
            $values = array($username,$userInviter,$inviteDate,$status,$inviteCode);
            $query->execute($values);
            $counts = $query->rowCount();
            return $counts;
        }
    }

    function showInviteCodeInfo($username,$password,$inviteCode){
        $query = $this->link->query("SELECT * FROM invite WHERE user = '$username'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowcount;
        }
    }

    function checkInvitationCode($username,$password){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();

        if($rowcount == 1){
            $query = $this->link->query("SELECT * FROM invite WHERE user = '$username'");
            $rowcount = $query->rowCount();
            return $rowcount;
        }
    }

    function topup($username,$amount){
         $timestamp = date("Y-m-d H:i:s");

        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
            $result = $query->fetchAll();
            

            $balance = $result[0]["balance"];
            $finalBalance = $balance + $amount;

            if($balance == 0){
                return 0;
            }else{

                if($amount > $balance){
                    return 3;
                }else{
                    $query = $this->link->prepare("INSERT INTO topup (username,amount,date) VALUES (?,?,?)");
                $values = array($username,$amount,$timestamp);
                $query->execute($values);
                $counts = $query->rowCount();
                }

                

            $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
            $rowcount = $query->rowCount();
            return $rowcount;
            }

            

                
    }

    function updateBalance($username,$status,$bet){
            //var_dump($bet);
            $query = $this->link->query("SELECT * FROM balance WHERE username = '$username' ");
            $result = $query->fetchAll();

            $balance = $result[0]["balance"];
            
            $balance = (int)$balance;
            //var_dump($balance);

            $query = $this->link->query("SELECT * FROM (SELECT * FROM playbets where username = '".$username."' ORDER BY id DESC LIMIT 5) sub ORDER BY id ASC");
            $winCount = $query->rowCount();
            $win = array();
            
            for($i = 0; $i < count($win); $i++) {
  
                if($winCount[i]["status"] == "WIN"){
                    array_push($win,$winCount);

                }
            };
            if(count($win) > 4){
                $finalBalance = 0;
                echo count($win);
                $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
                $rowcount = $query->rowCount();

                $query = $this->link->prepare("INSERT INTO bannedUser (username,lastBalance) VALUES (?,?)");
                $values = array($username,$balance);
                $query->execute($values);
                $counts = $query->rowCount();
                
            }

            

            
            $finalBalance = $balance+$bet;
            
            /** REMOVE CHEATERS ***/


            /** Add balance if win **/

            if($status === "WIN"){
                //var_dump($status);
                //var_dump($balance);

                $bet = $bet/2;
                $bet = round($bet);
            
                if($bet > $balance){
                $finalBalance = 0;
                
                $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
                $rowcount = $query->rowCount();

                $query = $this->link->prepare("INSERT INTO bannedUser (username,lastBalance) VALUES (?,?)");
                $values = array($username,$balance);
                $query->execute($values);
                $counts = $query->rowCount();
                }else{
                $finalBalance = $balance+$bet;
                
                $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
                $rowcount = $query->rowCount();

                $query = $this->link->prepare("INSERT INTO bannedUser (username,lastBalance) VALUES (?,?)");
                $values = array($username,$balance);
                $query->execute($values);
                $counts = $query->rowCount();
            }

                
            }

            if($status === "LOSE"){
                //var_dump($status);
                
                //echo "balance:";
                //var_dump($balance);
                //var_dump($bet);
                
                /** award affiliate **/
                
                $tax = 10;
                $referalAmount = $bet/$tax;
                $referalAmount = round($referalAmount);
                if($referalAmount > 0){
                    //echo "test";
                    
                    $query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
                    $result = $query->fetchAll();
                    $referalUsername = $result[0]["referalUsername"];
                    //var_dump($referalUsername);
                    
                   $datetime = date_create()->format('Y-m-d H:i:s');
                    
                    $query = $this->link->query("SELECT * FROM balance WHERE username = '$referalUsername'");
                    $result = $query->fetchAll();
                    $referalBalance = $result[0]["balance"];
                    //var_dump($referalBalance);
                    
                    $finalReferalBalance = $referalBalance+$referalAmount;
                    
                    $query = $this->link->query("UPDATE balance SET balance ='$finalReferalBalance' WHERE username='$referalUsername'");
                    
                    $query = $this->link->prepare("INSERT INTO affiliate (sponsor,awardedUser,amount,date) VALUES (?,?,?,?)");
                    $values = array($username,$referalUsername,$referalAmount,$datetime);
                    $query->execute($values);
                    
            
                    

                    
                    
                    
                    
                    
                }
                

                $query = $this->link->prepare("INSERT INTO playbets (status,amount,balance,username) VALUES (?,?,?,?)");
                $values = array($status,$bet,$balance,$username);
                $query->execute($values);

                $finalBalance = $balance-$bet;
                $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
                $rowcount = $query->rowCount();

                return $rowcount;
            
            }

    }

    function cashoutCode($username){
            $query = $this->link->query("SELECT * FROM cashout WHERE username = '$username' AND status = 'withdrawable'");
            $result = $query->fetchAll();
            return $result;
    }

    function cashout($username){
        $datetime = date_create()->format('Y-m-d H:i:s');

        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
        $result = $query->fetchAll();
        $balance = $result[0]["balance"];
        /** INSERT TO CASHOUT logs **/
        if($balance > 10){
            
        // get tax percentage 10% /
        $totalAmount = $balance;
        $percentTax = 10;

        $totalTax = ($totalAmount/$percentTax);

        $balance = $balance - $totalTax;

        // + reward affiliate 

        $query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
        $rowcount = $query->rowCount();
        $result = $query->fetchAll();
        $referalUsername = $result[0]["referalUsername"];
        $sponsor = $result[0]["username"];

        $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
        $result = $query->fetchAll();
        $refererBalance = $result[0]["balance"];
        $refererBalance = $refererBalance + $totalTax;

        $query = $this->link->query("UPDATE balance SET balance ='$refererBalance' WHERE username='$referalUsername'");


        $query = $this->link->prepare("INSERT INTO affiliate (sponsor,awardedUser,amount,date) VALUES (?,?,?,?)");
        $values = array($sponsor,$referalUsername,$totalTax,$datetime);
        $query->execute($values);


        $status = "withdrawable";
        $query = $this->link->prepare("INSERT INTO cashout (username,date,cashoutMoney,status) VALUES (?,?,?,?)");
        $values = array($username,$datetime,$balance,$status);
        $query->execute($values);
        
        $finalBalance = 0;
        $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
        $rowcount = $query->rowCount();
        return $rowcount;
        
        }else{
            return 0;
        }
        
        
        
    }

    function transact($username,$password,$sentFrom,$sendTo,$price){
        /* check Logged in user */





        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            /* check Balance */
            $query = $this->link->query("SELECT * FROM balance WHERE username = '$username'");
            $result = $query->fetchAll();

            $balance = $result[0]["balance"];
            $senderBalance = $result[0]["balance"];
            $finalBalance = $balance - $price;

            /* update remaining balance */

            $query = $this->link->query("UPDATE balance SET balance ='$finalBalance' WHERE username='$username'");
            $rowcount = $query->rowCount();

            /* check reciever balance */

            $query = $this->link->query("SELECT * FROM balance WHERE username = '$sendTo'");
            $result = $query->fetchAll();
            $recieverBalance = $result[0]["balance"];
            $finalRecieverBalance = $result[0]["balance"] + $price;

            $query = $this->link->prepare("INSERT INTO transaction (username,sentFrom,sendTo,price,senderBalance,recieverBalance) VALUES (?,?,?,?,?,?)");
            $values = array($username,$sentFrom,$sendTo,$price,$senderBalance,$recieverBalance);
            $query->execute($values);
            $counts = $query->rowCount();



            /* update reciever balance */
            $query = $this->link->query("UPDATE balance SET balance ='$recieverBalance' WHERE username='$sendTo'");
            $rowcount = $query->rowCount();
            return $counts;
        }

    }

}

?>