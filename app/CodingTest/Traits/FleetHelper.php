<?php
namespace CodingTest\Traits;

use CodingTest\OffensiveCraft;
use CodingTest\SupportCraft;


/**
 * The FleetHelper trait provides helper methods for the FleetManager class.
 */
trait FleetHelper
{   

    /**
     * Generate random coordinates that are not occupied by other ships.
     *
     * @return array An array of x and y coordinates.
     */
    public function generateRandomCoordinates() {
        // Logic to generate random coordinates
        do {
            $x = rand(0, 99);
            $y = rand(0, 99);
        } while (!$this->isCoordinateEmpty([$x, $y]));
    
        return [$x, $y];
    } 

    /**
     * Check if the given coordinates are unoccupied.
     *
     * @param array $coordinates An array of x and y coordinates.
     * @return bool True if the coordinates are empty, false otherwise.
     */
    public function isCoordinateEmpty($coordinates) {
        // Logic to check if the coordinates are empty
        return $this->grid[$coordinates[0]][$coordinates[1]] === null;
    }


    /**
     * Move a ship to new coordinates on the grid.
     *
     * @param Vessel $ship The ship to move.
     * @param array $newCoordinates An array of x and y coordinates.
     */
    public function moveShip($ship, $newCoordinates) {
        $currentCoordinates = $ship->getCoordinates();
        $this->grid[$currentCoordinates[0]][$currentCoordinates[1]] = null;
        $this->grid[$newCoordinates[0]][$newCoordinates[1]] = $ship;
        $ship->moveToCoordinates($newCoordinates);
    }

    /**
     * Find an empty coordinate on the grid.
     *
     * @return array|null An array of x and y coordinates, or null if no empty coordinate is found.
     */
    public function findEmptyCoordinate() {
        for ($i = 0; $i < 100; $i++) {
            for ($j = 0; $j < 100; $j++) {
                if ($this->grid[$i][$j] === null) {
                    return [$i, $j];
                }
            }
        }

        return null;
    }


    /**
     * Get the adjacent coordinates of a given set of coordinates.
     *
     * @param array $coordinates An array of x and y coordinates.
     * @return array An array of adjacent coordinates.
     */
    public function getAdjacentCoordinates($coordinates) {
        $x = $coordinates[0];
        $y = $coordinates[1];
        $adjacentCoordinates = [];

        if ($x > 0) {
            $adjacentCoordinates[] = [$x - 1, $y];
        }
        if ($x < 99) {
            $adjacentCoordinates[] = [$x + 1, $y];
        }
        if ($y > 0) {
            $adjacentCoordinates[] = [$x, $y - 1];
        }
        if ($y < 99) {
            $adjacentCoordinates[] = [$x, $y + 1];
        }

        return $adjacentCoordinates;
    }


     /**
     * Get the offensive ships from the fleet.
     *
     * @return array An array of offensive ships.
     */
    public function getOffensiveShips() {
        $offensiveShips = [];

        foreach ($this->fleet->getVessels() as $vessel) {
            if ($vessel instanceof OffensiveCraft) {
                $offensiveShips[] = $vessel;
            }
        }

        return $offensiveShips;
    }


    /**
     * Get the support ships from the fleet.
     *
     * @return array An array of support ships.
     */
    public function getSupportShips() {
        $supportShips = [];

        foreach ($this->fleet->getVessels() as $vessel) {
            if ($vessel instanceof SupportCraft) {
                $supportShips[] = $vessel;
            }
        }

        return $supportShips;
    }

    /**
     * Check if two sets of coordinates are adjacent to each other.
     *
     * @param array $coordinates1 The first set of coordinates.
     * @param array $coordinates2 The second set of coordinates.
     * @return bool True if the coordinates are adjacent, false otherwise.
     */
    public function areCoordinatesAdjacent($coordinates1, $coordinates2)
    {
        $x1 = $coordinates1[0];
        $y1 = $coordinates1[1];
        $x2 = $coordinates2[0];
        $y2 = $coordinates2[1];

        return abs($x1 - $x2) + abs($y1 - $y2) === 1;
    }
}