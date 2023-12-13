<?php

class LeagueTable
{   
    public $players;

    public function __construct(array $players)
    {
        $this->standings = [];
        $this->players = $players; 

        foreach($players as $index => $p) {
            $this->standings[$p] = [
                'index'        => $index,
                'games_played' => 0,
                'score'        => 0
            ];
        }
    }

    public function recordResult(string $player, int $score) : void
    {
        $this->standings[$player]['games_played']++;
        $this->standings[$player]['score'] += $score;
    }
    public function getRank() {

        return array_multisort($this->standings, array_column($this->standings, 'score',SORT_ASC));
        
    }
    public function playerRank(int $rank) : string
    {
        return '';
    }
}

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 3);

echo $table->playerRank(1);
echo "<pre>";
var_dump($table->standings);
echo "</pre>";


echo "<pre>";
print_r($table->getRank());
echo "</pre>";