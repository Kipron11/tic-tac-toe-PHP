<?php


class TicTacToe
{
    private $arr = [[" ", " ", " "], [" ", " ", " "], [" ", " ", " "]];
    private $turn = 'X';


    private function display_board()
    {

        echo $this->arr[0][0] . "|" . $this->arr[0][1] . "|" . $this->arr[0][2] . "\n";
        echo "-+-+-\n";
        echo $this->arr[1][0] . "|" . $this->arr[1][1] . "|" . $this->arr[1][2] . "\n";
        echo "-+-+-\n";
        echo $this->arr[2][0] . "|" . $this->arr[2][1] . "|" . $this->arr[2][2] . "\n";

    }

    private function makeTurn()
    {
        if ($this->turn == 'X') {
            $this->turn = 'O';
        } else {
            $this->turn = 'X';
        }
        while (true) {
            $x = (int)readline("Choose X coordinate,0-2 ");
            $y = (int)readline("Choose Y coordinate,0-2 ");

            if (
                $x > 2 || $y > 2 || $x < 0 || $y < 0
            ) {
                echo "Error, write correct numbers \n ";
            } else {
                if ($this->arr[$x][$y] == ' ') {
                    break;
                }
                echo "Error, choose another section \n";
            }

        }

        $this->arr[$x][$y] = $this->turn;


    }

    private function winner()
    {
        for ($i = 0; $i < count($this->arr) - 1; $i++) {
            for ($j = 0; $j < count($this->arr[$i]) - 1; $j++) {
                if ($i == 0 || $j == 0) {
                    if (
                        $this->arr[$i][$j] == $this->arr[$i + 1][$j + 1]
                        &&
                        $this->arr[$i + 1][$j + 1] == $this->arr[$i + 2][$j + 2]
                        &&
                        $this->arr[$i][$j] != ' '
                    ) {
                        return true;
                    }
                    if (
                        $this->arr[$i][$j + 2] == $this->arr[$i + 1][$j + 1]
                        &&
                        $this->arr[$i + 1][$j + 1] == $this->arr[$i + 2][$j]
                        &&
                        $this->arr[$i][$j + 2] != ' '
                    ) {
                        return true;
                    }
                }
                if (
                    $this->arr[$i][$j] == $this->arr[$i][$j + 1]
                    &&
                    $this->arr[$i][$j + 1] == $this->arr[$i][$j + 2]
                    &&
                    $this->arr[$i][$j] != ' '
                ) {
                    return true;
                }

                if (
                    $this->arr[$i][$j] == $this->arr[$i + 1][$j]
                    &&
                    $this->arr[$i + 1][$j] == $this->arr[$i + 2][$j]
                    &&
                    $this->arr[$i][$j] != ' '
                ) {
                    return true;
                }
            }
        }
        return false;
    }

    public function game()
    {
        while (true) {
            system('clear');
            $this->display_board();
            $this->makeTurn();

            if ($this->winner()) {
                system('clear');
                $this->display_board();
                die("Thank you for playing, you already know who wins \n");
            }
        }
    }


}

$newGame = new TicTacToe();
$newGame->game();
