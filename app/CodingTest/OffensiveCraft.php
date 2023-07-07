<?php
namespace CodingTest;
use CodingTest\Contracts\OffensiveCraftContract;

/**
 * OffensiveCraft class represents an offensive ship in the fleet.
 */
class OffensiveCraft extends Vessel implements OffensiveCraftContract
{
    protected $cannons;
    protected $shields;

    /**
     * OffensiveCraft constructor.
     *
     * @param string $name The name of the offensive ship.
     * @param array $coordinates The coordinates of the offensive ship.
     * @param int $cannons The number of cannons on the offensive ship.
     */
    public function __construct($name, $coordinates, $cannons){
        parent::__construct($name, $coordinates);
        $this->cannons = $cannons;
        $this->shields = false;
    }

    /**
     * Get the number of cannons on the offensive ship.
     *
     * @return int The number of cannons.
     */
    public function getCannons() {
        return $this->cannons;
    }

    /**
     * Raise the shields of the offensive ship.
     */
    public function raiseShields() {
        $this->shields = true;
    }

    /**
     * Lower the shields of the offensive ship.
     */
    public function lowerShields() {
        $this->shields = false;
    }

    /**
     * Check if the shields of the offensive ship are raised.
     *
     * @return bool True if the shields are raised, false otherwise.
     */
    public function areShieldsRaised() {
        return $this->shields;
    }
}