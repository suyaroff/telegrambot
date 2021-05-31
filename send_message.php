<?php

define('BOT_TOKEN', '1785841571:AAFN8xC8YyBWHJHskVyoCfxOkMevdctJK4A');
define('BOT_CHANNEL', '@codemasterpro');

/**
 * Send message from bot to channel
 * @param $message
 * @return bool|string
 */
function botSendMessage($message)
{
    $url = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMessage';
    $ch = curl_init($url);
    $data = json_encode(['text' => $message, 'chat_id' => BOT_CHANNEL]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$message = "Test Message";
$result = botSendMessage($message);
