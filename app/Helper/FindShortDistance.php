<?php

namespace App\Helper;

use App\Repositories\Admin\FacilitatorTrackRepository;
use App\Models\FacilitatorTrack; 

class FindShortDistance{

	protected $facilitatorTracks;


	public function __construct(FacilitatorTrackRepository $facilitatorTracks){
		$this->facilitatorTracks = $facilitatorTracks;
	}

	public function getFacilitatorTracks(array $addressNavigation){

		$allTrace = $this->facilitatorTracks->all()->toArray();



		$distances = array_map(function($item) use($addressNavigation) {
			$a = array($item['latitude'],$item['longitude']);
		    return $this->distance($a, $addressNavigation);
		}, $allTrace);

		asort($distances);

		return $distances[key($distances)];

	}

	
	public function distance($a, $b){
	    list($lat1, $lon1) = $a;
	    list($lat2, $lon2) = $b;

	    $theta = $lon1 - $lon2;
	    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	    $dist = acos($dist);
	    $dist = rad2deg($dist);
	    $miles = $dist * 60 * 1.1515;

	    return $miles;
	}




}