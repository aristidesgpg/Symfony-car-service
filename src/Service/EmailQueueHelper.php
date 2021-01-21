<?php

namespace App\Service;

class EmailQueueHelper {
    private const EMAIL_QUE_ENDPOINT = 'http://isre.us/api/add-to-email-que';
    private const ACCESS_TOKEN       = 'W*pmwqvH&@*2vd+w';

    /**
     * @param $to
     * @param $from
     * @param $cc
     * @param $subject
     * @param $body
     *
     * @return bool|mixed|string
     */
    public function addToEmailQue ($to, $from, $subject, $body, $cc = null) {
        $curl       = curl_init(self::EMAIL_QUE_ENDPOINT);
        $postFields = [
            'access_token' => self::ACCESS_TOKEN,
            'to_email'     => $to,
            'cc_emails'    => $cc,
            'from_email'   => $from,
            'subject'      => $subject,
            'body'         => $body
        ];
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }
}