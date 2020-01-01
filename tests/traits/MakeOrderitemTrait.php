<?php

use Faker\Factory as Faker;
use App\Models\Orderitem;
use App\Repositories\Admin\OrderitemRepository;

trait MakeOrderitemTrait
{
    /**
     * Create fake instance of Orderitem and save it in database
     *
     * @param array $orderitemFields
     * @return Orderitem
     */
    public function makeOrderitem($orderitemFields = [])
    {
        /** @var OrderitemRepository $orderitemRepo */
        $orderitemRepo = App::make(OrderitemRepository::class);
        $theme = $this->fakeOrderitemData($orderitemFields);
        return $orderitemRepo->create($theme);
    }

    /**
     * Get fake instance of Orderitem
     *
     * @param array $orderitemFields
     * @return Orderitem
     */
    public function fakeOrderitem($orderitemFields = [])
    {
        return new Orderitem($this->fakeOrderitemData($orderitemFields));
    }

    /**
     * Get fake data of Orderitem
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrderitemData($orderitemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'order_id' => $fake->word,
            'item' => $fake->word,
            'quantity' => $fake->word,
            'category' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $orderitemFields);
    }
}
