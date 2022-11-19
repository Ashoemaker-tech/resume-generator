<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;

// bring in vars from form
$name = $_POST["name"];
$email = $_POST["email"];
$linkedIn = $_POST["linkedIn"];
$summary = $_POST["summary"];
$skill1 = $_POST["skill1"];
$skill2 = $_POST["skill2"];
$skill3 = $_POST["skill3"];
$skill4 = $_POST["skill4"];
$languages = $_POST["languages"];
$frontend = $_POST["frontend"];
$backend = $_POST["backend"];
$database = $_POST["database"];
$workTitle1 = $_POST["workTitle1"];
$workDate1 = $_POST["workDate1"];
$workDescription1 = $_POST["workDescription1"];
$workTitle2 = $_POST["workTitle2"];
$workDate2 = $_POST["workDate2"];
$workDescription2 = $_POST["workDescription2"];
$workTitle3 = $_POST["workTitle3"];
$workDate3 = $_POST["workDate3"];
$workDescription3 = $_POST["workDescription3"];
$acc1 = $_POST["acc1"];
$acc2 = $_POST["acc2"];
$acc3 = $_POST["acc3"];
$acc4 = $_POST["acc4"];




$dompdf = new Dompdf;

// Get the html file to convert to pdf
$html = file_get_contents("template.html");

// Link template vars to vars from form
$html = str_replace([
    "{{ name }}",
    "{{ email }}",
    "{{ linkedIn }}",
    "{{ summary }}",
    "{{ skill1 }}",
    "{{ skill2 }}",
    "{{ skill3 }}",
    "{{ skill4 }}",
    "{{ languages }}",
    "{{ frontend }}",
    "{{ backend }}",
    "{{ database }}",
    "{{ workTitle1 }}",
    "{{ workDate1 }}",
    "{{ workDescription1 }}",
    "{{ workTitle2 }}",
    "{{ workDate2 }}",
    "{{ workDescription2 }}",
    "{{ workTitle3 }}",
    "{{ workDate3 }}",
    "{{ workDescription3 }}",
    "{{ acc1 }}",
    "{{ acc2 }}",
    "{{ acc3 }}",
    "{{ acc4 }}"
],
[
    $name,
    $email,
    $linkedIn,
    $summary,
    $skill1,
    $skill2,
    $skill3,
    $skill4,
    $languages,
    $frontend,
    $backend,
    $database,
    $workTitle1,
    $workDate1,
    $workDescription1,
    $workTitle2,
    $workDate2,
    $workDescription2,
    $workTitle3,
    $workDate3,
    $workDescription3,
    $acc1,
    $acc2,
    $acc3,
    $acc4
],
$html);



// Load html needed for Pdf
$dompdf->loadHtml($html);

// Replace placeholders with values from the form


// Render the Pdf file
$dompdf->render();

// Set title to pdf
$dompdf->addInfo("Title", "Resume");

// Set the Pdf to open in browser instead of downloading
$dompdf->stream("Resume.pdf", ["Attachment" => 0]);