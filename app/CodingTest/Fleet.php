<?php
namespace CodingTest;

use CodingTest\Contracts\FleetContract;

/**
 * Fleet class represents a fleet of vessels.
 */
class Fleet implements FleetContract
{

    protected $vessels;

    /**
     * Fleet constructor.
     * Initializes an empty array to store the vessels.
     */
    public function __construct(){
        $this->vessels = [];
    }

    /**
     * Add a vessel to the fleet.
     *
     * @param Vessel $vessel The vessel to add.
     */
    public function addVessel($vessel){
        $this->vessels[] = $vessel;
    }

    /**
     * Get the vessels in the fleet.
     *
     * @return array An array of vessels.
     */
    public function getVessels() {
        return $this->vessels;
    }
}