<?
/***********************************************************************
  * dictionary.inc
  *
  * Computer Science 50
  * David J. Malan
  *
  * Implements a dictionary.
  **********************************************************************/
// size of dictionary
$size = 0;
// dictionary
$dictionary = array();
/*
  * bool
  * check($word)
  *
  * Returns TRUE if word is in dictionary else FALSE.
  */
function check($word)
{
     global $dictionary;
     if ($dictionary[strtolower($word)])
          return TRUE;
     else
          return FALSE;
}
/*
  * bool
  * load($dict)
  *
  * Loads dict into memory.   Returns TRUE if successful else FALSE.
  */
function load($dict)
{
     global $dictionary, $size;
     if (($fp = fopen($dict, "r")) === FALSE)
          return FALSE;
     while ((fscanf($fp, "%s", $word)) == 1)
     {
          $dictionary[$word] = TRUE;
          $size++;
     }
     fclose($fp);
     return TRUE;
}
/*
  * int
  * size()
  *
  * Returns number of words in dictionary if loaded else 0 if not yet
  loaded.
  */
function size()
{
    global $size;
    return $size;
}
?>	
