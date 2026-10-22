<?php
declare(strict_types=1);
// Parse decimal currency into cents without binary floating point arithmetic.
function parseCents(string $amount): int {
    if (!preg_match('/^(0|[1-9][0-9]{0,9})(?:\.([0-9]{1,2}))?$/D',$amount,$m)) {
        throw new InvalidArgumentException('Expected positive decimal with at most two places');
    }
    return (int)$m[1]*100+(int)str_pad($m[2]??'',2,'0');
}
if (realpath($_SERVER['SCRIPT_FILENAME']??'')===__FILE__) {
    echo parseCents('12450.75').PHP_EOL;
}
