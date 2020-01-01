<?php

use Faker\Factory as Faker;
use App\Models\Quickorder;
use App\Repositories\Admin\QuickorderRepository;

trait MakeQuickorderTrait
{
    /**
     * Create fake instance of Quickorder and save it in database
     *
     * @param array $quickorderFields
     * @return Quickorder
     */
    public function makeQuickorder($quickorderFields = [])
    {
        /** @var QuickorderRepository $quickorderRepo */
        $quickorderRepo = App::make(QuickorderRepository::class);
        $theme = $this->fakeQuickorderData($quickorderFields);
        return $quickorderRepo->create($theme);
    }

    /**
     * Get fake instance of Quickorder
     *
     * @param array $quickorderFields
     * @return Quickorder
     */
    public function fakeQuickorder($quickorderFields = [])
    {
        return new Quickorder($this->fakeQuickorderData($quickorderFields));
    }

    /**
     * Get fake data of Quickorder
     *
     * @param array $postFields
     * @return array
     */
    public function fakeQuickorderData($quickorderFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->word,
            'destination_current_address' => $fake->word,
            'destination_other_address' => $fake->word,
            'totals' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $quickorderFields);
    }
}
