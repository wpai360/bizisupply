<?php
//https://codeinphp.github.io/post/sharing-functionality-using-traits-in-php/
abstract class comman_order {

	public function ignor_all(){
		echo "ignore_all";
	} 
	public function mark_all_offer(){
		echo "mark_all_offers";
	}
}

//-----------------------Trait--------------------------
trait use_tarit {

public static function call_trait(){
     return "finally you have called tarit";
}

}
//----------------------------------------------
class buyer extends comman_order {
use use_tarit;
  echo $this->call_trait();	
     function show_ignore(){ 
	    
        return   $this->ignor_all();
		  }
        
}

class supplier extends comman_order {

     function show_ignore(){ 
        return   $this->ignor_all();
		  }
        
}


//create object 
$fire = new buyer();
$fire_fast = new supplier();  // use same function for ABSTARCT CALLED
echo $fire->show_ignore();// use same function for ABSTARCT class CALLED
echo "++++++++++++++++++++++++++++++++++";
echo $fire_fast->show_ignore();
 
// NOW I am going to use trait





?>