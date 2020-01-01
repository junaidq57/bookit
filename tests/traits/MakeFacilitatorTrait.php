<?php

use Faker\Factory as Faker;
use App\Models\Facilitator;
use App\Repositories\Admin\FacilitatorRepository;

trait MakeFacilitatorTrait
{
    /**
     * Create fake instance of Facilitator and save it in database
     *
     * @param array $facilitatorFields
     * @return Facilitator
     */
    public function makeFacilitator($facilitatorFields = [])
    {
        /** @var FacilitatorRepository $facilitatorRepo */
        $facilitatorRepo = App::make(FacilitatorRepository::class);
        $theme = $this->fakeFacilitatorData($facilitatorFields);
        return $facilitatorRepo->create($theme);
    }

    /**
     * Get fake instance of Facilitator
     *
     * @param array $facilitatorFields
     * @return Facilitator
     */
    public function fakeFacilitator($facilitatorFields = [])
    {
        return new Facilitator($this->fakeFacilitatorData($facilitatorFields));
    }

    /**
     * Get fake data of Facilitator
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFacilitatorData($facilitatorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->word,
            'is_engaged' => $fake->word,
            'available' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $facilitatorFields);
    }
}
