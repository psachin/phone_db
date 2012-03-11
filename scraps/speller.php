		
 <?		
 		
	/*******	****************************************************************
       *			 speller.php
       *		 	 
       * Computer Science 50
       * David J. Malan	  
       * 
       *	Implements a spell-checker.
       
 ******	****************************************************************/
 
	    require("dictionary.inc");
	    
     // suppress notices and warnings
     error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
     

     // maximum length for a word
     // (e.g., pneumonoultramicroscopicsilicovolcanoconiosis)
     define("LENGTH", 45);

     // default dictionary
     $WORDS = "/home/c/s/cs50/pub/share/dict/words";

     // check for correct number of args
     if ($argc != 2 && $argc != 3)
     {
          print("Usage: speller.php [dict] file\n");
          return 1;
     }

     // benchmarks
     $startup = 0.; $lookups = 0.; $sizing = 0.;

     // determine dictionary to use
     $dict = ($argc == 3) ? $argv[1] : $WORDS;

     // load dictionary
     $before = microtime(TRUE);
     $loaded = load($dict);
     $after = microtime(TRUE);

     // abort if dictionary not loaded
     if (!$loaded)
     {
          print("Could not load $dict.\n");
          return 2;
     }

     // calculate time to load dictionary
     $startup = $after - $before;

     // try to open file
     $file = ($argc == 3) ? $argv[2] : $argv[1];
     $fp = fopen($file, "r");

     // prepare to report misspellings
     //printf("\nMISSPELLED WORDS\n\n");

     // prepare to spell-check
     $word = "";
     $index = 0; $misspellings = 0; $words = 0;

     // spell-check each word in file

for ($c = fgetc($fp); $c !== FALSE; $c = fgetc($fp))
{
    // allow alphabetical characters and apostrophes (for possessives)
    if (preg_match("/[a-zA-Z]/", $c) || ($c == "?" && $index > 0))
    {
        // append character to word
        $word .= $c;
        $index++;
        // ignore alphabetical strings too long to be words
        if ($index >= LENGTH)
        {
            // consume remainder of alphabetical string
            while (($c = fgetc($fp)) !== FALSE &&
	    preg_match("/[a-zA-Z]/", $
            // prepare for new word
            $index = 0;$word = " ";
        }
    }
  // ignore words with numbers (like MS Word)
  else if (ctype_digit($c))
  {
      // consume remainder of alphabetical string
      while (($c = fgetc($fp)) !== FALSE && ctype_digit($c));
      // prepare for new word
      $index = 0; $word = "";
  }
  // we must have found a whole word
  else if ($index > 0)
  {
      // update counter
      $words++;
      // check word?s spelling
      $before = microtime(TRUE);
      $misspelled = !check($word);
      $after = microtime(TRUE);
      // update benchmark
      $lookups += $after - $before;
      // print word if misspelled
      if ($misspelled)
      {
          print("$word\n");
          $misspellings++;
      }
      // prepare for next word
      $index = 0; $word = "";
  }
}
// close file
fclose($fp);
// determine dictionary?s size
$before = microtime(TRUE);
$n = size();
$after = microtime(TRUE);


// calculate time to determine dictionary?s size
$sizing = $after - $before;
// report benchmarks
printf("\nWORDS MISSPELLED:     %d\n", $misspellings);
printf("WORDS IN DICTIONARY:  %d\n", $n);
printf("WORDS IN FILE:        %d\n", $words);
printf("STARTUP TIME:         %f\n", $startup);
printf("LOOKUP TIME:          %f\n", $lookups);
printf("SIZING TIME:          %f\n", $sizing);
printf("TOTAL TIME:           %f\n\n", $startup + $lookups + $sizing);
?>
