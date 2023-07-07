<?php
namespace CodingTest\Contracts;

interface FleetContract
{
    public function addVessel($vessel);

    public function getVessels();
}