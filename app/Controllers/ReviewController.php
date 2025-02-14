<?php

class ReviewController{

   public function index() {

    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $id_exp= 23 ;
        $id_cond= 21 ;
        $rating=$_POST["rating"];
        $comment=$_POST["comment"];
          echo $comment;
          echo $rating ;

        $review = new Review($rating,$comment, $status = 'En attente', $date_soumission = null , $id_cond ,$id_exp);
        $review->addReview();
        
        // header("Location: /EasyMatch-Transport/public/HomeController");
        header("Location: " . BASE_URL."/HomeController");



    }
    else{
                // header("Location: " . BASE_URL."app/View/expediteur/reviews.php");
                require_once  __DIR__ . '/../View/expediteur/reviews.php';

        // header("Location: /EasyMatch_Transport/public/HomeController");

    }
    
}


}