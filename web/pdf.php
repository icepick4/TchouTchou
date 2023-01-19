<?php

require_once('./config/configuration.php');
require_once('./lib/foncBase.php');
require_once(PATH_TEXTES . LANG . '.php');
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'MessageDAO.php');

require('extensions/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$user = new UserDAO();
$discussions = new MessageDAO();
$pdf->SetFont('Arial', '', 18);
$allDiscussions = $discussions->getUserDiscussions($_SESSION['user_id']);
$userData = $user->getUserById($_SESSION['user_id']);
$i = 0;
$pdf->Cell(0,20, 'INFORMATIONS PERSONNELLES', 0, 2);
$pdf->Cell(0,10, 'Prenom' . ' : ' . $userData['USER_FIRSTNAME'], 0, 2);
$pdf->Cell(0,10, 'Nom' . ' : ' . $userData['USER_LASTNAME'], 0, 2);
$pdf->Cell(0,10, 'Email' . ' : ' . $userData['USER_MAIL'], 0, 2);
$pdf->Cell(0,10, 'Telephone' . ' : ' . $userData['USER_PHONE'], 0, 2);
$pdf->AddPage();
foreach ($allDiscussions as $discussion) {
    $currentDiscussion = $discussions->getDiscussionById($discussion['DISCUSSION_ID']);
    $pdf->Cell(0, 10, SUBJECT . ' : ' . $discussion['DISCUSSION_SUBJECT'], 0, 2);
    $pdf->Cell(0, 10, DATE . ' : ' . $discussion['CREATION_TIME'], 0, 2);
    foreach ($currentDiscussion as $message) {
        $text = $userData['USER_FIRSTNAME'] . ' : ' . $message['MESSAGE_CONTENT'];
        $pdf->MultiCell(0, 10, $text, 0, 2);
    }
    if ($i < count($allDiscussions) - 1){
        $pdf->AddPage();
    }
    $i++;
}
$pdf->Output();
