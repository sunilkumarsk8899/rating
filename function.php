<?php
$con = mysqli_connect('localhost','root','','rating');
if(isset($_POST)){

    if($_POST['action']){

        if($_POST['action'] == 'rating'){

            $rating = $_POST['rating_val'];
            $after_rating = mysqli_query($con,'SELECT * FROM `rating`');
            if($after_rating){

                if($num_row = mysqli_num_rows($after_rating) > 0){

                    /**
                     * if exist any record and update callbacl
                     */
                    if($result = mysqli_fetch_object($after_rating)){

                        $result = mysqli_query($con,'UPDATE `rating` SET `rating`="'.$rating.'",`after_rating`="'.$result->rating.'" WHERE status = 1');
                        echo ($result) ? true : false;

                    }

                }else{

                    /**
                     * if not any found data than insert new record callback
                     */
                    $result = mysqli_query($con,'INSERT INTO `rating`(`rating`, `after_rating`) VALUES ("'.$rating.'","'.$rating.'")');
                    echo ($result) ? true : false;

                }
                
            }else{

                echo 00;

            }

        }
        
    }

}


?>