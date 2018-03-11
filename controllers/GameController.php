<?php

class GameController extends Controller
{

    /**
     * Actual game instance
     * @var
     */
    protected $game;

    public function __construct($action = null, $parameters = null)
    {
        parent::__construct($action, $parameters);
    }

    /**
     * Defualt action of game. Renders map, contains main game logic.
     * @param null $parameters
     */
    protected function defaultAction($parameters = null)
    {
        $this->redirect('/game/start');
    }


    /**
     * Start game action. Shows new game form and process it to start new game. Initialize whole game and save it to
     * SESSIONS.
     * @param null $parameters
     */
    protected function startAction($parameters = null)
    {
        $this->template = 'game/start.tpl';

        if (isset($_POST['P1_name']) && isset($_POST['P2_name'])) {

            $players[] = new Player($_POST['P1_name'], '#FF0000');
            $players[] = new Player($_POST['P2_name'], '#0000FF');

            $tank = new Tank();
            $tank->setPlayer($players[0]);
            $tank->setPositionX(1);
            $tank->setPositionY(1);
            $tank->setName('T1');
            $tank->setRange(10);
            $tank->setFireRange(10);
            $tank->setArmor(5);
            $tank->setPower(2);
            $tank->setMoveCost(3);
            $tank->setFireCost(2);

            $tanks[] = $tank;

            $tank = new Tank();
            $tank->setPlayer($players[1]);
            $tank->setPositionX(5);
            $tank->setPositionY(1);
            $tank->setName('T2');
            $tank->setRange(3);
            $tank->setFireRange(3);
            $tank->setArmor(5);
            $tank->setPower(3);
            $tank->setMoveCost(1);
            $tank->setMoveCost(4);

            $tanks[] = $tank;

            $tank = new Tank();
            $tank->setPlayer($players[0]);
            $tank->setPositionX(10);
            $tank->setPositionY(10);
            $tank->setName('T2');
            $tank->setRange(3);
            $tank->setFireRange(3);
            $tank->setArmor(5);
            $tank->setPower(3);
            $tank->setMoveCost(1);
            $tank->setMoveCost(4);

            $tanks[] = $tank;

            $tank = new Tank();
            $tank->setPlayer($players[1]);
            $tank->setPositionX(15);
            $tank->setPositionY(10);
            $tank->setName('T1');
            $tank->setRange(10);
            $tank->setFireRange(10);
            $tank->setArmor(5);
            $tank->setPower(2);
            $tank->setMoveCost(3);
            $tank->setFireCost(2);

            $tanks[] = $tank;

            $this->game = new Game();

            $this->game->setPlayers($players);
            $this->game->setTanks($tanks);
            $this->game->setActivePlayerId(0);
            $this->game->setActiveTankId(1);
            $this->game->setRemainingAP(Game::ACTION_POINTS);

            $_SESSION['game'] = $this->game;
            $this->redirect('/game');
        }
    }


    /**
     * End game action. Shows results.
     */
    protected function endAction()
    {
        $this->context['game'] = $this->game;
        $this->template = 'game/end.tpl';
    }


}
