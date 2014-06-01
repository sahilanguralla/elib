<?php

/**
 * This class generates hashes required in authentications
 *
 * @param string $hash stores hash generated
 */
class hash {
    private $hash;
    function __construct($text=""){
        if(!empty($text))
            $this->hash=sha1(md5($text).'$ϵ®ʌϵ®');
        else
            $this->hash=sha1('$ϵ®ʌϵ®'.md5(substr(str_shuffle('quick$brown@fox#jumps%over^the&lazy9dog'),0,10)));
    }
    
    /*
     * This method function return the generated hash
     */
    function getHash(){
        return $this->hash;
    }
}