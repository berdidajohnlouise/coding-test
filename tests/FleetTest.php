<?php
use CodingTest\Fleet;
use CodingTest\OffensiveCraft;
use CodingTest\SupportCraft;
use PHPUnit\Framework\TestCase;

class FleetTest extends TestCase
{
    protected $fleet;

    protected function setUp(): void
    {
        $this->fleet = new Fleet();
    }

    public function testAddVessel() {
        $supportCraft = new SupportCraft('Refueling Craft 1', [10, 20], 'Medical Unit 1');
        $this->fleet->addVessel($supportCraft);

        $offensiveCraft = new OffensiveCraft('Battleship 1', [50, 60], 24);
        $this->fleet->addVessel($offensiveCraft);

        $this->assertCount(2, $this->fleet->getVessels());
    }

    public function testSupportCraftTasks() {
        $supportCraft = new SupportCraft('Cargo Craft 1', [30, 40], 'Medical Unit 2');
        $supportCraft->addTask('cargo');
        $supportCraft->addTask('refueling');

        $tasks = $supportCraft->getTasks();

        $this->assertCount(2, $tasks);
        $this->assertContains('cargo', $tasks);
        $this->assertContains('refueling', $tasks);
    }

    public function testOffensiveCraftShields() {
        $offensiveCraft = new OffensiveCraft('Cruiser 1', [70, 80], 6);

        $this->assertFalse($offensiveCraft->areShieldsRaised());

        $offensiveCraft->raiseShields();
        $this->assertTrue($offensiveCraft->areShieldsRaised());

        $offensiveCraft->lowerShields();
        $this->assertFalse($offensiveCraft->areShieldsRaised());
    }
}