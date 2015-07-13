<?php

include "/../Utils/OutputsProcessor.php";

class BaseFormatedOutputsProcessor extends OutputsProcessor
{  
   public function GenerateOutputs( &$outputs, &$entities )
   {
      parent::GenerateOutputs( $outputs, $entities );
      ////////////////////////////
      foreach ( $outputs as $k => $output )
      {
         Logger::log("Formating output \"$k\"");
         
         $output_path = $this->mBaseDirectory . DIRECTORY_SEPARATOR . $output["Path"] . DIRECTORY_SEPARATOR . $output["Name"];

         exec('xmllint.exe ' . $output_path . ' > ' . ' ' . $output_path .'Temp');
         unlink($output_path);
         rename($output_path .'Temp', $output_path);
      }
   }
}