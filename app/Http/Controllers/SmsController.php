<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;


use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function getToken()
    {
        $client = new Client();
        $options = [
            'multipart' => [
                [
                    'name' => 'email',
                    'contents' => 'nursultanxabipnazarov@gmail.com',
                ],
                [
                    'name' => 'password',
                    'contents' => 'woJOrfkunKzkXe9jrX3kVVqcg6TavcBucwPMvbYV',
                ],
            ],
        ];

        try {
            $response = $client->post('http://notify.eskiz.uz/api/auth/login', $options);
            $body = $response->getBody();
            $data = json_decode($body, true);

            // Save the token for future use
            $token = $data['data']['token'];

            // Use $token in subsequent requests
            echo "Token: $token";
        } catch (\Exception $e) {
            // Handle exception (e.g., log error, return error response)
            echo $e->getMessage();
        }
    }

    // Boshqa SMS bilan bog'liq metodlarni shu yerga qo'shishingiz mumkin


    public function smsSend()
    {
        $client = new Client();
        $headers = [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MDkwOTkzMjUsImlhdCI6MTcwNjUwNzMyNSwicm9sZSI6InRlc3QiLCJzaWduIjoiYzM3NTMwNTdhOWM2Mzk4M2Y1YjNlMTJiMGNkY2Y4ZmNlNjk1OWRjOTJmZWJiNWE1NDExZDMxZDJmNGRhZWRhMSIsInN1YiI6IjYyODgifQ.3OYxboi3tU1yZMahmVF4_zsdRzs00E2CGE3mE3kFp8o', // YOUR_ACCESS_TOKEN ni o'zgartiring
                // Add any other headers you need
            ],
        ];

        $options = [
            'multipart' => [
                [
                    'name' => 'mobile_phone',
                    'contents' => '998907071905',
                ],
                [
                    'name' => 'message',
                    'contents' => 'Kabuloov.m ',
                ],

                [
                    'name' => 'from',
                    'contents' => 'ARM',
                ],
                [
                    'name' => 'callback_url',
                    'contents' => 'http://127.0.0.1:8000/',
                ],
            ],
        ];

        try {
            $response = $client->post('http://notify.eskiz.uz/api/message/sms/send', $headers + $options);
            $body = $response->getBody();
            $data = json_decode($body, true);

            // Process the response as needed
            echo "ID: " . $data['id'] . "\n";
            echo "Message: " . $data['message'] . "\n";
            echo "Status: " . $data['status'] . "\n";
        } catch (\Exception $e) {
            // Handle exception (e.g., log error, return error response)
            echo $e->getMessage();
        }
    }



}
