<?php

namespace VladNicu\RequestMailer;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class Mailer
{
    public static function sendMail($to, $subject, $body) {

        $emailData = [
            'name' => 'TEC Portal',
            'from' => 'c.sste@trw.com',
            'to' => $to,
            'mailPriority' => 'Normal',
            'subject' => $subject,
            'body' => $body,
            'isBodyHtml' => 'true',
        ];
        
        $client = new Client();
        
        try {

            dd(env('MAIL_API_URL'));

            $promis = $client->requestAsync('POST', env('MAIL_API_URL'), [
                'headers' => ['Content-Type' => 'application/json'],
                'connect_timeout' => 0.5,//set timeout 
                'body' => json_encode($emailData)
            ]);
            $promis->wait();
        } catch(ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            Log::debug('Failed to send email with status: ' . $statusCode);
        }
        catch(RequestException $e) {
            Log::debug('Failed to send email with exception: ' . $e);
        }
    }

}