<?php
namespace CodingTest;

use CodingTest\Fleet;
use CodingTest\Traits\FleetHelper;

/**
 * Fleetmanager class manages the fleet and positions the ship in a defensive formation.
 */
class FleetManager
{

    use FleetHelper;
    protected $fleet;
    protected $grid;
    
    /**
     * FleetManager constructor.
     * Initializes the fleet and grid.
     */
    public function __construct() {
        $this->fleet = new Fleet();
        $this->grid = array_fill(0, 100, array_fill(0, 100, null));
    }

    /**
     * Get the fleet of the FleetManager.
     *
     */
    public function getFleet(){
        return $this->fleet;
    }

    /**
     * Set the fleet for the FleetManager.
     *
     * @param Fleet $fleet The fleet to set.
     */
    public function setFleet(Fleet $fleet) {
        $this->fleet = $fleet;
    }

    /**
     * Set the grid for the FleetManager.
     *
     * @param array $grid The grid to set.
     */
    public function setGrid(array $grid) {
        $this->grid = $grid;
    }

    /**
     * Get the grid of the FleetManager.
     *
     * @return array The grid data.
     */
    public function getGrid() {
        return $this->grid;
    }
    
    /**
     * Generate the fleet by creating and adding offensive and support ships to it.
     */
    public function generateFleet() {
        $offensiveCount = 25;
        $supportCount = 25;

        // Create and add offensive ships to the fleet
        for ($i = 0; $i < $offensiveCount; $i++) {
            $offensiveShip = new OffensiveCraft("Offensive Ship " . ($i + 1), $this->generateRandomCoordinates(),24);
            $this->fleet->addVessel($offensiveShip);
        }

        // Create and add support ships to the fleet
        for ($i = 0; $i < $supportCount; $i++) {
            $supportShip = new SupportCraft("Support Ship " . ($i + 1), $this->generateRandomCoordinates(), "Medical Unit " . ($i + 1));
            $this->fleet->addVessel($supportShip);
        }
    }


    /**
     * Generate pairs of ships from the fleet.
     *
     * @return array An array of ship pairs.
     */
    public function generatePairs() {
        $pairs = [];
        $offensiveShips = $this->getOffensiveShips();
        $supportShips = $this->getSupportShips();

        $offensiveKeys = array_rand($offensiveShips, 25);
        $supportKeys = array_rand($supportShips, 25);

        for ($i = 0; $i < 25; $i++) {
            $offensiveIndex = $offensiveKeys[$i];
            $supportIndex = $supportKeys[$i];
            $pair = [$offensiveShips[$offensiveIndex], $supportShips[$supportIndex]];
            $pairs[] = $pair;
        }

        return $pairs;
    }

     /**
     * Position each pair of ships to be adjacent to each other on the grid.
     *
     */
    public function positionPairs($pairs) {
        foreach ($pairs as $pair) {
            $offensiveShip = $pair[0];
            $supportShip = $pair[1];
    
            $offensiveCoordinates = $offensiveShip->getCoordinates();
            $supportCoordinates = $supportShip->getCoordinates();
    
            $adjacentCoordinates = $this->getAdjacentCoordinates($offensiveCoordinates);
    
            // Check if the support ship is already adjacent to the offensive ship
            if (!in_array($supportCoordinates, $adjacentCoordinates)) {
                $foundEmptyCoordinate = false;
    
                foreach ($adjacentCoordinates as $adjacentCoordinate) {
                    // Check if the adjacent coordinate is unoccupied
                    if ($this->isCoordinateEmpty($adjacentCoordinate)) {
                        $supportShip->moveToCoordinates($adjacentCoordinate);
                        $this->grid[$adjacentCoordinate[0]][$adjacentCoordinate[1]] = $supportShip;
                        $foundEmptyCoordinate = true;
                        break;
                    }
                }
    
                // If no adjacent coordinate is available, skip this pair
                if (!$foundEmptyCoordinate) {
                    continue;
                }
            }
        }
    }

    /**
     * Issue movement commands to the ships to their new positions.
     */
    public function issueCommands() {
        foreach ($this->fleet->getVessels() as $vessel) {
            $coordinates = $vessel->getCoordinates();
            $command = "Move to coordinates (" . $coordinates[0] . ", " . $coordinates[1] . ")";
            echo $vessel->getName() . ": " . $command . "\n";
        }
    }
}