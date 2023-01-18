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
$i = 0;
foreach ($allDiscussions as $discussion) {
    $currentDiscussion = $discussions->getDiscussionById($discussion['DISCUSSION_ID']);
    $pdf->Cell(0, 10, SUBJECT . ' : ' . $discussion['DISCUSSION_SUBJECT'], 0, 2);
    $pdf->Cell(0, 10, DATE . ' : ' . $discussion['CREATION_TIME'], 0, 2);
    foreach ($currentDiscussion as $message) {
        $text = $user->getUserById($message['SENDER_ID'])['USER_FIRSTNAME'] . ' : ' . $message['MESSAGE_CONTENT'];
        $pdf->MultiCell(0, 10, $text, 0, 2);
    }
    if ($i < count($allDiscussions) - 1){
        $pdf->AddPage();
    }
    $i++;
}
$pdf->Output();
