<?php

require_once('./config/configuration.php');
require_once('./lib/foncBase.php');

require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'MessageDAO.php');

require('extensions/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$user = new UserDAO();
$discussion = new MessageDAO();
$pdf->SetFont('Arial', '', 18);
$allDiscussion = $discussion->getUserDiscussions($_SESSION['user_id']);
foreach ($allDiscussion as $value) {
    $currentDiscussion = $discussion->getDiscussionById($value['DISCUSSION_ID']);
    $pdf->Cell(0, 10, $value['DISCUSSION_SUBJECT'], 0, 2);
    foreach ($currentDiscussion as $message) {
        $text = $user->getUserById($message['SENDER_ID'])['USER_FIRSTNAME'] . ' : ' . $message['MESSAGE_CONTENT'];
        $pdf->Cell(0, 10, $text, 0, 2);
    }
    $pdf->AddPage();
}

$pdf->Output();
