<?php
namespace CodingTest\Contracts;

interface VesselContract
{
    public function getName(): string;

    public function getCoordinates();

    public function addTask($task);

    public function getTasks(): array;
}