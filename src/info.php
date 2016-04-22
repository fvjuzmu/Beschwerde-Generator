<pre>
<?php
//phpinfo();

$bla[] = "anrede_01";
$bla[] = "anrede_02";
$bla[] = "mitte_01";
$bla[] = "mitte_02";
$bla[] = "mitte";
$bla[] = "";
$bla[] = "schluss_02";
$bla[] = "schluss_01";

echo "anrede\n";
print_r(preg_grep("/^anrede.*/", $bla));
echo "mitte\n";
print_r(preg_grep("/^mitte.*/", $bla));
echo "schluss\n";
print_r(preg_grep("/^schluss.*/", $bla));


/*$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "example.com");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);
