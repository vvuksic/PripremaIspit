<?php
session_start();

// Inicijalizacija ploče ako nije postavljena
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = [
        ['x', '', ''],
        ['', '', ''],
        ['', '', '']
    ];
    $_SESSION['current_player'] = 'X'; // X počinje
}

// Funkcija za prikaz ploče
function display_board() {
    echo '<table style="width:300px; height:300px; text-align:center;">';
    for ($row = 0; $row < 3; $row++) {
        echo '<tr>';
        for ($col = 0; $col < 3; $col++) {
            echo '<td style="border:1px solid black;">';
            echo '<a href="?row=' . $row . '&col=' . $col . '" style="display: block; width: 100%; height: 100%; text-decoration: none; font-size: 24px;">' . $_SESSION['board'][$row][$col] . '</a>';
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    
}

// Funkcija za postavljanje poteza
function make_move($row, $col) {
    if ($_SESSION['board'][$row][$col] == '') {
        $_SESSION['board'][$row][$col] = $_SESSION['current_player'];
        $_SESSION['current_player'] = ($_SESSION['current_player'] == 'X') ? 'O' : 'X';
    }
}

// Provjera poteza
if (isset($_GET['row']) && isset($_GET['col'])) {
    make_move($_GET['row'], $_GET['col']);
}

// Prikaz ploče
display_board();

?>