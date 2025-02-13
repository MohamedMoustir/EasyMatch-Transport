<?php 

class ReviewController{

   public function index() {

    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $id_exp=$_POST['id_exp'];
        $id_cond=$_POST['id_cond'];
        $rating=$_POST["rating"];
        $comment=$_POST["comment"];


        $review = new Review($rating,$comment,$status = 'En attente', $date_soumission = null ,$id_exp,$id_cond);
        $review->addReview();
        
        // header("Location: /EasyMatch-Transport/public/HomeController");
        header("Location: " . BASE_URL."/HomeController");



    }
    else{
                header("Location: " . BASE_URL."/HomeController");

        // header("Location: /EasyMatch-Transport/public/HomeController");

    }
    
}


}