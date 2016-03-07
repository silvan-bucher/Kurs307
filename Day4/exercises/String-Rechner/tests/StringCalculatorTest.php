<?php echo "\n";
include __DIR__ . '/../src/StringCalculator.php';

/**
 * Testfälle
 */
test("Ist nur eine Zahl vorhanden, wird diese ausgegeben",
calculateSum("4") == 4
);

test('Zwei Zahlen werden richtig summiert',
    calculateSum("2, 3") == 5
);

test('Drei Zahlen werden richtig summiert',
    calculateSum("2, 3, 3") == 8
);

test('Vier Zahlen werden richtig summiert',
    calculateSum("2, 3, 3, 1") == 9
);

test('Zahlen > 100 werden ignoriert',
    calculateSum("2, 200") == 2
);

test('Zahlen < 0 werden ignoriert',
    calculateSum("3, -6") == 3
);

test('Es können maximal 6 Zahlen eingegeben werden',
    calculateSum('1,2,3,4,5,6,7') === false
);

test('Leerer Input wird nicht verarbeitet',
    calculateSum('') === false
);

test('Sind Buchstaben im Input wird nichts verarbeitet',
    calculateSum('1,2,C,D') === false
);

test('Alternatives Trennzeichen | funktioniert auch',
    calculateSum('3|3|3') == 9
);

/**
 * Gibt den Namen und das Resultat eines Tests aus.
 *
 * @param string  $name
 * @param bool    $assertion
 */
function test(string $name, bool $assertion)
{
    // Testname bis auf 60 Zeichen mit Leerzeichen füllen
    // damit die Ausrichtung der Ausgabe stimmt
    echo str_pad($name, 60) . '-> ';

    // Testergebnis anzeigen
    echo $assertion === true ? 'OK' : 'FEHLER';
    echo "\n";
}

echo "\n";
?>
