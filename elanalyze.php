<?php
/**
 * Analyze PHP Error log file
 * Run: php elanalyze.php --datafile="path/to/error_log"
 */
$shortopts  = "";
$shortopts .= "d:";  // Required value
$shortopts .= "v"; // These options do not accept values

$longopts  = array(
    "datafile:",     // Required value
    "verbose",       //No value (verbose)
);
$options = getopt($shortopts, $longopts);
//print_r($options);

$datafile = $options['datafile'] ?? $options['d'] ?? null;
$verbose = isset($options['verbose']) || isset($options['v']) || false;

if (empty($datafile)){
    throw new Exception('Invalid data file --datafile or -d');
}

$handle = fopen($datafile, "r");
$possible_errors = [];
$possible_files = [];
$count = 0;
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $count++;
        if (preg_match('/^\[[^\]]+\] (.*)$/m', $line, $regs)) {
            if ($verbose) {
                echo '.';
            }
            $error = $regs[1];
            $possible_errors[$error] = ($possible_errors[$error] ?? 0) + 1;

            if (preg_match('%in (/.*?) %m', $line, $regs)) {
                $file = $regs[1];
                $possible_files[$file] = ($possible_files[$file] ?? 0) + 1;
            }

        } else {
            if ($verbose) {
                echo '*';
            }
            $error = false;
        }
    }

    fclose($handle);

    if ($verbose) {
        echo $count . " lines read. \n";
    }

    echo "Errors and Times They Occur\n";
    asort($possible_errors);
    pretty_print($possible_errors);
    echo "\n";
    echo "Files and Num Errors occurred\n";
    asort($possible_files);
    pretty_print($possible_files);
} else {
    // error opening the file.
    throw new \Exception("Error opening the file: $datafile");
}





function pretty_print(array $array, string $separator = ': ', string $nl = PHP_EOL){
    foreach($array as $key => $value){
        echo $key .$separator.$value.$nl;
    }
}
