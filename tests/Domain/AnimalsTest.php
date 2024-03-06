<?php

namespace Domain;

use App\Domain\Exception\CannotEatThisMeal;
use App\Domain\Model\Animal\Elephant;
use App\Domain\Model\Animal\Fox;
use App\Domain\Model\Animal\Rabbit;
use App\Domain\Model\Animal\Rhino;
use App\Domain\Model\Animal\SnowIrbis;
use App\Domain\Model\Animal\Tiger;
use App\Domain\Model\Food\Meat;
use App\Domain\Model\Food\Plant;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AnimalsTest extends KernelTestCase
{
    public function testElephant()
    {
        $animal = new Elephant('Dumbo');

        $this->assertEquals('Dumbo', $animal->name);

        $this->assertEquals('Elephant Dumbo', (string) $animal);

        $this->assertEquals(0, $animal->feedsCount());
        $animal->feed(new Plant());
        $this->assertEquals(1, $animal->feedsCount());

        $this->expectExceptionMessage('Animal Elephant Dumbo cannot eat meal MEAT');
        $this->expectException(CannotEatThisMeal::class);
        $animal->feed(new Meat());
    }

    public function testFox()
    {
        $animal = new Fox('Lisek Łakomczuszek');

        $this->assertEquals('Lisek Łakomczuszek', $animal->name);

        $this->assertEquals('Fox Lisek Łakomczuszek', (string) $animal);

        $this->assertEquals(0, $animal->feedsCount());
        $animal->feed(new Plant());
        $this->assertEquals(1, $animal->feedsCount());
        $animal->feed(new Meat());
        $this->assertEquals(2, $animal->feedsCount());

        $this->assertFalse($animal->isCombed());
        $animal->comb();
        $this->assertTrue($animal->isCombed());
    }

    public function testRabbit()
    {
        $animal = new Rabbit('Bugs');

        $this->assertEquals('Bugs', $animal->name);

        $this->assertEquals('Rabbit Bugs', (string) $animal);

        $this->assertEquals(0, $animal->feedsCount());
        $animal->feed(new Plant());
        $this->assertEquals(1, $animal->feedsCount());
        $this->expectExceptionMessage('Animal Rabbit Bugs cannot eat meal MEAT');
        $this->expectException(CannotEatThisMeal::class);
        $animal->feed(new Meat());

        $this->assertFalse($animal->isCombed());
        $animal->comb();
        $this->assertTrue($animal->isCombed());
    }

    public function testRhino()
    {
        $animal = new Rhino('Rogatek');

        $this->assertEquals('Rogatek', $animal->name);

        $this->assertEquals('Rhino Rogatek', (string) $animal);

        $this->assertEquals(0, $animal->feedsCount());
        $animal->feed(new Plant());
        $this->assertEquals(1, $animal->feedsCount());
    }

    public function testSnowIrbis()
    {
        $animal = new SnowIrbis('Mruczuś');

        $this->assertEquals('Mruczuś', $animal->name);

        $this->assertEquals('Snow_Irbis Mruczuś', (string) $animal);

        $this->assertEquals(0, $animal->feedsCount());
        $animal->feed(new Meat());
        $this->assertEquals(1, $animal->feedsCount());

        $this->expectExceptionMessage('Animal Snow_Irbis Mruczuś cannot eat meal PLANT');
        $this->expectException(CannotEatThisMeal::class);
        $animal->feed(new Plant());

        $this->assertFalse($animal->isCombed());
        $animal->comb();
        $this->assertTrue($animal->isCombed());
    }

    public function testTiger()
    {
        $animal = new Tiger('Tygrysek');

        $this->assertEquals('Tygrysek', $animal->name);

        $this->assertEquals('Tiger Tygrysek', (string) $animal);

        $this->assertEquals(0, $animal->feedsCount());
        $animal->feed(new Meat());
        $this->assertEquals(1, $animal->feedsCount());

        $this->expectExceptionMessage('Animal Tiger Tygrysek cannot eat meal PLANT');
        $this->expectException(CannotEatThisMeal::class);
        $animal->feed(new Plant());

        $this->assertFalse($animal->isCombed());
        $animal->comb();
        $this->assertTrue($animal->isCombed());
    }
}
