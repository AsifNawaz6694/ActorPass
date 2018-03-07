<?php

namespace App\Listeners;

use App\Events\UserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use App\Profile;

class CreateCustomer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  User  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        //
        

        $client = new Client(['base_uri' => config('services.bookeo.Bookeo_base_uri')]);
        try{
            $response = $client->post('customers', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Bookeo-apiKey' => config('services.bookeo.Bookeo_apiKey'),
                    'X-Bookeo-secretKey' => config('services.bookeo.Bookeo_secretKey'),
                ],
                'json' => [
                    'firstName' => $event->user->fullname,
                    'emailAddress' => $event->user->email,
                    'phoneNumbers' => [
                        [
                            'number' => '', 
                            'type' => 'mobile'
                        ]
                    ]
                ]
            ]);
            $customer = $response->getHeader('location');
            $customerID = explode('/', $customer[0]);

            $id = end($customerID);
            $profile = Profile::where('user_id', $event->user->id)->update([
               'customer_id' => $id 
            ]);



        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
