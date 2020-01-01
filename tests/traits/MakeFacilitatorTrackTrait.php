<?php

use Faker\Factory as Faker;
use App\Models\FacilitatorTrack;
use App\Repositories\Admin\FacilitatorTrackRepository;

trait MakeFacilitatorTrackTrait
{
    /**
     * Create fake instance of FacilitatorTrack and save it in database
     *
     * @param array $facilitatorTrackFields
     * @return FacilitatorTrack
     */
    public function makeFacilitatorTrack($facilitatorTrackFields = [])
    {
        /** @var FacilitatorTrackRepository $facilitatorTrackRepo */
        $facilitatorTrackRepo = App::make(FacilitatorTrackRepository::class);
        $theme = $this->fakeFacilitatorTrackData($facilitatorTrackFields);
        return $facilitatorTrackRepo->create($theme);
    }

    /**
     * Get fake instance of FacilitatorTrack
     *
     * @param array $facilitatorTrackFields
     * @return FacilitatorTrack
     */
    public function fakeFacilitatorTrack($facilitatorTrackFields = [])
    {
        return new FacilitatorTrack($this->fakeFacilitatorTrackData($facilitatorTrackFields));
    }

    /**
     * Get fake data of FacilitatorTrack
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFacilitatorTrackData($facilitatorTrackFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'facilitator_id' => $fake->word,
            'longitude' => $fake->word,
            'latitude' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $facilitatorTrackFields);
    }
}
