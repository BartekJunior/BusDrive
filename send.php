<?php
header('Content-Type: text/plain; charset=UTF-8'); // Ustaw odpowiedni nagłówek

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Zbierz dane z formularza
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    $subject = htmlspecialchars($_POST['subject']); // Pobieramy temat wiadomości

    // Ustawienia wiadomości
    $to = "kontakt@busdrive.pl"; // Twój adres e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Treść e-maila
    $body = "Otrzymałeś nową wiadomość:\n\n";
    $body .= "Temat: $subject\n"; // Dodajemy temat do treści e-maila
    $body .= "Imię: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Telefon: $phone\n";
    $body .= "Wiadomość:\n$message\n";

    // Wysyłka e-maila
    if (mail($to, $subject, $body, $headers)) {
        echo "OK"; // Komunikat sukcesu dla JS
    } else {
        echo "Wystąpił błąd podczas wysyłania wiadomości.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
