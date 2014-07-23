--TEST--
GH-1340: Process isolation blocks infinitely upon fatal error
--FILE--
<?php

$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][3] = 'Issue1340Test';
$_SERVER['argv'][4] = dirname(__FILE__).'/1340/Issue1340Test.php';

require __DIR__ . '/../../bootstrap.php';
PHPUnit_TextUI_Command::main();
?>
--EXPECTF--
PHPUnit %s by Sebastian Bergmann.

.E.EE

Time: %s, Memory: %sMb

There were 3 errors:

1) Issue1340Test::testLargeStderrOutputDoesNotBlockInIsolation
PHPUnit_Framework_Exception: testLargeStderrOutputDoesNotBlockInIsolation: stderr:%d

%a

2) Issue1340Test::testPhpNoticeWithStderrOutputIsAnError
PHPUnit_Framework_Exception: shutdown: stderr:%d

%a

3) Issue1340Test::testFatalErrorDoesNotPass
PHPUnit_Framework_Exception: Fatal error: Call to undefined function undefined_function() in %s on line %d

Call Stack:
%a

shutdown: stderr:%d

%a

FAILURES!
Tests: 5, Assertions: 3, Errors: 3.