<?php
date_default_timezone_set("Europe/Istanbul");

$nick = htmlspecialchars($_POST['nick'] ?? "İsimsiz");
$msg = htmlspecialchars($_POST['msg'] ?? "");
$time = date("H:i");

if ($msg !== "") {
    // Emoji filtresi / XSS filtresi gibi işlemler eklenebilir
    $msg = str_replace(["<", ">"], ["&lt;", "&gt;"], $msg);

    // Mesaj satırı
    $line = "<div><b>[$time] $nick:</b> $msg</div>\n";
    file_put_contents("msg.html", $line, FILE_APPEND);
}
?>

<?php
if (file_exists("msg.html")) {
    readfile("msg.html");
} else {
    echo "<div>Henüz mesaj yok.</div>";
}
?>
