<?php

use CodingTest\Fleet;
use CodingTest\FleetManager;
use CodingTest\SupportCraft;
use CodingTest\OffensiveCraft;
use PHPUnit\Framework\TestCase;

class FleetManagerTest extends TestCase
{
    protected $fleetManager;

    protected function setUp(): void
    {
        $this->fleetManager = new FleetManager();
    }

    public function testGenerateFleet()
    {
        $this->fleetManager->generateFleet();
        $fleet = $this->fleetManager->getFleet();
        $offensiveCount = 0;
        $supportCount = 0;

        foreach ($fleet->getVessels() as $vessel) {
            if ($vessel instanceof OffensiveCraft) {
                $offensiveCount++;
            } elseif ($vessel instanceof SupportCraft) {
                $supportCount++;
            }
        }

        $this->assertEquals(25, $offensiveCount);
        $this->assertEquals(25, $supportCount);
    }

    public function testGeneratePairs()
    {
        $this->fleetManager->generateFleet();
        $pairs = $this->fleetManager->generatePairs();
        $this->assertCount(25, $pairs);

        foreach ($pairs as $pair) {
            $this->assertInstanceOf(OffensiveCraft::class, $pair[0]);
            $this->assertInstanceOf(SupportCraft::class, $pair[1]);
        }
    }


}