<?php

class GameTest extends Test {

    protected $testCount = 14;
    public function testSetGetTanks() {
        $testGame = new Game();

        $t1 = new Tank();
        $seed = rand(10,1000);
        $t1->setName($seed);

        $t2 = new Tank();
        $seed2 = rand(10,1000);
        $t2->setName($seed2);

        $t3 = new Tank();
        $seed3 = rand(10,1000);
        $t3->setName($seed3);

        $this->assertEqual(gettype($testGame->getTanks()), 'array', 'Game set/get tanks - correct null type');
        $testGame->setTanks([$t1, $t2, $t3]);
        $this->assertEqual(count($testGame->getTanks()), 3, 'Game set/get tanks - correct lenght');
        $this->assertEqual(gettype($testGame->getTanks()), 'array', 'Game set/get tanks - correct type');
        $this->assertEqual($testGame->getTanks()[0]->getName(), $seed, 'Game set/get tanks - correct data 1 ');
        $this->assertEqual($testGame->getTanks()[1]->getName(), $seed2, 'Game set/get tanks - correct data 2');
        $this->assertEqual($testGame->getTanks()[2]->getName(), $seed3, 'Game set/get tanks - correct data 3');
    }

    public function testSetGetPlayers() {
        $testGame = new Game();

        $p1 = new Player();
        $seed = rand(10,1000);
        $p1->setName($seed);

        $p2 = new Player();
        $seed2 = rand(10,1000);
        $p2->setName($seed2);

        $p3 = new Player();
        $seed3 = rand(10,1000);
        $p3->setName($seed3);

        $this->assertEqual(gettype($testGame->getPlayers()), 'array', 'Game set/get tanks - correct null type');
        $testGame->setPlayers([$p1, $p2, $p3]);
        $this->assertEqual(count($testGame->getPlayers()), 3, 'Game set/get players - correct lenght');
        $this->assertEqual($testGame->getPlayers()[0]->getName(), $seed, 'Game set/get players - correct data 1 ');
        $this->assertEqual($testGame->getPlayers()[1]->getName(), $seed2, 'Game set/get players - correct data 2');
        $this->assertEqual($testGame->getPlayers()[2]->getName(), $seed3, 'Game set/get players - correct data 3');
    }

    public function testGetGameInstance() {
        $testGame = new Game();

        $reflection = new ReflectionMethod('Game', 'getGameInstance');
        $this->assertEqual($reflection->isStatic(), true, 'Game getGameInstance - is static');

        $_SESSION['game'] = null;
        $this->assertEqual(get_class(Game::getGameInstance()), 'Game', 'Game getGameInstance - create new game if null');


        $_SESSION['game'] = $testGame;
        $this->assertEqual(Game::getGameInstance(), $testGame, 'Game getGameInstance - get current game');
    }

}
