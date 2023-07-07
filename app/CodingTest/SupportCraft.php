<?php
namespace CodingTest;
use CodingTest\Contracts\SupportCraftContract;
use CodingTest\Vessel;

/**
 * SupportCraft class represents a support ship in the fleet.
 */
class SupportCraft extends Vessel implements SupportCraftContract
{
    protected $medicalUnit;

    /**
     * SupportCraft constructor.
     *
     * @param string $name The name of the support ship.
     * @param array $coordinates The coordinates of the support ship.
     * @param string $medicalUnit The medical unit assigned to the support ship.
     */
    public function __construct($name, $coordinates, $medicalUnit)
    {
        parent::__construct($name, $coordinates);
        $this->medicalUnit = $medicalUnit;
    }

    /**
     * Get the medical unit assigned to the support ship.
     *
     * @return string The medical unit of the support ship.
     */
    public function getMedicalUnit()
    {
        return $this->medicalUnit;
    }

    /**
     * Move the support ship to new coordinates.
     *
     * @param array $newCoordinates The new coordinates for the support ship.
     */
    public function moveToCoordinates($newCoordinates)
    {
        $this->coordinates = $newCoordinates;
    }

}