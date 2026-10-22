<?php
declare(strict_types=1);
require __DIR__.'/main.php';
function check(bool $ok): void { if (!$ok) { throw new RuntimeException('Check failed'); } }
function invalid(callable $f): void { try { $f(); } catch (InvalidArgumentException $e) { return; } throw new RuntimeException('Expected rejection'); }
check(parseCents('12.5')===1250); check(parseCents('0.01')===1); invalid(fn()=>parseCents('1.234')); invalid(fn()=>parseCents('1e9'));
echo "Tests passed\n";
