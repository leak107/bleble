<?php

namespace App;

use function Termwind\render;

class Tictac
{
    public function run(): void
    {

        render('<div class="px-1 bg-green-300">TicTacToe</div>');

        // multi-line html...
        render(<<<'HTML'
                <table>
                    <tr>
                        <td><p class="px-1">1</p></td>   
                        <td><p class="px-1">2</p></td>
                        <td><p class="px-1">3</p></td>
                        <td></td>
                        <td><p class="px-1">⭕</p></td>
                        <td><p class="px-1">❌</p></td>
                        <td><p class="px-1">⭕</p></td>
                    </tr>
                    <tr>
                        <td><p class="px-1">4</p></td>   
                        <td><p class="px-1">5</p></td>
                        <td><p class="px-1">6</p></td>
                        <td></td>
                        <td><p class="px-1">⭕</p></td>
                        <td><p class="px-1">❌</p></td>
                        <td><p class="px-1">⭕</p></td>
                    </tr>
                    <tr>
                        <td><p class="px-1">7</p></td>   
                        <td><p class="px-1">8</p></td>
                        <td><p class="px-1">9</p></td>
                        <td></td>
                        <td><p class="px-1">⭕</p></td>
                        <td><p class="px-1">❌</p></td>
                        <td><p class="px-1">⭕</p></td>
                    </tr>
                </table>
        HTML
        );
    }
}