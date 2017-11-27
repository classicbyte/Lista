<?php
class Random
{
  public static function AlphaNumeric($length)
      {
          $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
          $clen   = strlen( $chars )-1;
          $id  = '';

          for ($i = 0; $i < $length; $i++) 
          {
                  $id .= $chars[mt_rand(0,$clen)];
          }
          return ($id);
      }
}
  echo $result = Random::AlphaNumeric(5); 

?>