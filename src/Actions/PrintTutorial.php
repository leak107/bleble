<?php

namespace App\Actions;

use function Termwind\render;

class PrintTutorial
{
    public function __invoke(): void
    {
        render(<<<'HTML'
            <p class="bg-yellow-300 text-gray-900">TicTacToe</p>
        HTML);

        render(<<<'HTML'
            <pre>
        Tic Tac Toe is a game played on a three-by-three grid by two players,
        who alternatively place the marks X and O in one of the nine spaces in the grid.

        There will be two Players, You and your friend will play against each other in
        this game, as you have understand the rules. 

        If you choose 1 as depicted as yellow colored cell, your mark will be placed 
        right on the yellow colored cell and so on and so forth for the other cell
        according to the coloring below on each cell.
            </pre>
        HTML);

        render(<<<'HTML'
                <table>
                    <tr border="1">
                        <td><p class="px-1 bg-yellow-300 text-gray-900">1</p></td>   
                        <td><p class="px-1 bg-blue-300 text-gray-900">2</p></td>
                        <td><p class="px-1 bg-gray-300 text-gray-900">3</p></td>
                        <td colspan="2"></td>
                        <td><p class="px-1 bg-yellow-300 text-gray-900">⭕</p></td>
                        <td><p class="px-1 bg-blue-300 text-gray-900">❌</p></td>
                        <td><p class="px-1 bg-gray-300 text-gray-900">❌</p></td>
                    </tr>
                    <tr border="1">
                        <td><p class="px-1 bg-orange-300 text-gray-900">4</p></td>   
                        <td><p class="px-1 bg-lime-300 text-gray-900">5</p></td>
                        <td><p class="px-1 bg-emerald-300 text-gray-900">6</p></td>
                        <td colspan="2"></td>
                        <td><p class="px-1 bg-orange-300 text-gray-900">❌</p></td>
                        <td><p class="px-1 bg-lime-300 text-gray-900">⭕</p></td>
                        <td><p class="px-1 bg-emerald-300 text-gray-900">⭕</p></td>
                    </tr>
                    <tr>
                        <td><p class="px-1 bg-cyan-300 text-gray-900">7</p></td>   
                        <td><p class="px-1 bg-pink-300 text-gray-900">8</p></td>
                        <td><p class="px-1 bg-violet-300 text-gray-900">9</p></td>
                        <td colspan="2"></td>
                        <td><p class="px-1 bg-cyan-300 text-gray-900">⭕</p></td>
                        <td><p class="px-1 bg-pink-300 text-gray-900">❌</p></td>
                        <td><p class="px-1 bg-violet-300 text-gray-900">⭕</p></td>
                    </tr>
                </table>
        HTML
        );

        render(<<<'HTML'
            <p>
                Let's decide who will be player one and who will be player two.
                <br>
                <br>
                <span class="bg-yellow-300 text-gray-900">Game On!</span>
            </p>
        HTML);
    }
}
