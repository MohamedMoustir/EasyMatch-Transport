<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    private $sujet;
    private $destinateur_nom;
    private $email_nom;
    private $destinataire;
    private $message;
    private $mail;

    public function __construct($sujet, $destinateur_nom, $email_nom, $destinataire, $message) {
        $this->sujet = $sujet;
        $this->destinateur_nom = $destinateur_nom;
        $this->email_nom = $email_nom;
        $this->destinataire = $destinataire;
        $this->message = $message;

        $this->mail = new PHPMailer(true);

        try {
            // Configuration SMTP
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'abdelhafid02002@gmail.com';
            $this->mail->Password = 'ooiu zqpf ylla wtvr';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
            $this->mail->CharSet = 'UTF-8';
        } catch (Exception $e) {
            die("Erreur SMTP : " . $this->mail->ErrorInfo);
        }
    }

    public function envoyerEmail() {
        try {
            $this->mail->setFrom($this->email_nom, $this->destinateur_nom);
            $this->mail->addAddress($this->destinataire);
            $this->mail->addReplyTo($this->email_nom, $this->destinateur_nom);

            $this->mail->isHTML(true);
            $this->mail->Subject = $this->sujet;
            $this->mail->Body = $this->message;
            $this->mail->AltBody = strip_tags($this->message);

            $this->mail->send();
            return "Email envoyé avec succès à {$this->destinataire} !";
        } catch (Exception $e) {
            return "Erreur lors de l'envoi : " . $this->mail->ErrorInfo;
        }
    }
}
