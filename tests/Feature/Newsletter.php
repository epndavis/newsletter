<?php

namespace Tests\Feature;

use App\Http\Requests\StoreNewsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Newsletter extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the validtion fails with no data
     *
     * @return void
     */
    public function test_validation_fails()
    {
        $request = new StoreNewsletter();

        $data = [];

        $validator = Validator::make($data, $request->rules(), $request->messages());

        $this->assertTrue($validator->fails());
    }

    /**
     * Test  if the validtion succeeds with data
     *
     * @return void
     */
    public function test_validation_succeeds()
    {
        $request = new StoreNewsletter();

        $data = [
            'email' => 'epn.davis@gmail.com',
            'first_name' => 'Elliot',
            'last_name' => 'Davis',
        ];

        $validator = Validator::make($data, $request->rules(), $request->messages());

        $this->assertTrue(!$validator->fails());
    }

    /**
     * Test if the validtion catches duplicate email in database
     *
     * @return void
     */
    public function test_validation_for_duplicate_email()
    {
        //Create new email in database
        $email = new Email();

        $email->email = 'epn.davis@gmail.com';
        $email->first_name = 'Elliot';
        $email->last_name = 'Davis';

        $email->save();


        $request = new StoreNewsletter();

        $data = [
            'email' => 'epn.davis@gmail.com',
            'first_name' => 'Elliot',
            'last_name' => 'Davis',
        ];

        $validator = Validator::make($data, $request->rules(), $request->messages());

        $this->assertTrue($validator->fails());
    }

    /**
     * Test success api json call
     *
     * @return void
     */
    public function test_json_response()
    {
        $this->post(route('api.register'), [
            'email' => 'epn.davis@gmail.com',
            'first_name' => 'Elliot',
            'last_name' => 'Davis',
        ])->seeJson([
            'success' => true,
        ]);
    }
}
