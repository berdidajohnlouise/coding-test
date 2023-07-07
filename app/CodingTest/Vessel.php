<?php
namespace CodingTest;

use CodingTest\Contracts\VesselContract;

/**
 * Vessel class represents a generic vessel in the fleet.
 */
class Vessel implements VesselContract
{
    protected $name;
    protected $coordinates;

    protected $task;

    /**
     * Vessel constructor.
     *
     * @param string $name The name of the vessel.
     * @param array $coordinates The coordinates of the vessel.
     */
    public function __construct($name, $coordinates){
        $this->name = $name;
        $this->coordinates = $coordinates;
        $this->task = [];
    }

    /**
     * Get the name of the vessel.
     *
     * @return string The name of the vessel.
     */
    public function getName(): string{
        return $this->name;
    }

    /**
     * Get the coordinates of the vessel.
     *
     * @return array The coordinates of the vessel.
     */
    public function getCoordinates(){
        return $this->coordinates;
    }

    /**
     * Add a task to the vessel.
     *
     * @param mixed $task The task to be added.
     */
    public function addTask($task)
    {
        $this->task[] = $task;
    }

    /**
     * Get the tasks assigned to the vessel.
     *
     * @return array The tasks assigned to the vessel.
     */
    public function getTasks(): array{
        return $this->task;
    }
}