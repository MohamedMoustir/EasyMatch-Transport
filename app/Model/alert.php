<?php
class Alert {


    public static function alerts($exit){
        if ($exit) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Succès!',
                    text: 'Trajet ajouté avec succès.'
                }).then(() => {
                    window.location.href = 'dashboard.php'; // Redirection
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur!',
                    text: 'Une erreur s'est produite lors de l'insertion.'
                });
            </script>";
        }
    }

    
}