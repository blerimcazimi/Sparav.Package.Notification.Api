<?php

namespace Sparav\Notification;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class PushNotificationTokenClientV1
{

    /**
     * @param string $token
     * @param int $customer_id
     * @param int $device
     * @return Response
     */
    public function addToken(string $token, int $customer_id, int $device)
    {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_NOTIFICATION_API_AUTH_USERNAME'), env('SPARAV_NOTIFICATION_API_AUTH_PASSWORD'))
            ->post('https://sparavnotificationapiprod.azurewebsites.net/api/v1/pushnotification/token', ['token' => $token, 'customer_id' => $customer_id, 'device' => $device]);
        return $response;
    }

}
