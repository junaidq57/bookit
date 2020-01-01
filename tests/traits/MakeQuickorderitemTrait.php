<?php

use Faker\Factory as Faker;
use App\Models\Quickorderitem;
use App\Repositories\Admin\QuickorderitemRepository;

trait MakeQuickorderitemTrait
{
    /**
     * Create fake instance of Quickorderitem and save it in database
     *
     * @param array $quickorderitemFields
     * @return Quickorderitem
     */
    public function makeQuickorderitem($quickorderitemFields = [])
    {
        /** @var QuickorderitemRepository $quickorderitemRepo */
        $quickorderitemRepo = App::make(QuickorderitemRepository::class);
        $theme = $this->fakeQuickorderitemData($quickorderitemFields);
        return $quickorderitemRepo->create($theme);
    }

    /**
     * Get fake instance of Quickorderitem
     *
     * @param array $quickorderitemFields
     * @return Quickorderitem
     */
    public function fakeQuickorderitem($quickorderitemFields = [])
    {
        return new Quickorderitem($this->fakeQuickorderitemData($quickorderitemFields));
    }

    /**
     * Get fake data of Quickorderitem
     *
     * @param array $postFields
     * @return array
     */
    public function fakeQuickorderitemData($quickorderitemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'order_id' => $fake->word,
            'item' => $fake->word,
            'quantity' => $fake->word,
            'category' => $fake->word,
            'price' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $quickorderitemFields);
    }
}
