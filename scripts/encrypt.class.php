<?php

	class encrypt{
		
		private $encr_pass; 
		
		function encrypt_pass($string){
			$this->encr_pass = md5($string);
			$this->encr_pass .='$ϵ®ʌϵ®';
			return $this->encr_pass  = md5($this->encr_pass);
		}
	}
?>