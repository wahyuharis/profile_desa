<?php
$output=null;
$retval=null;
$cmd='git log --pretty=format:%h,%an,%ae,%s';
exec($cmd, $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);