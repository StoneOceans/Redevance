<?php

// Execute the Python script
$output = shell_exec('python3 /var/www/web/tests/test.py');

// Output the result
echo "<pre>$output</pre>";
