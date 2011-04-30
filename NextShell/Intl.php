<?php
	/* Copyright (c) Kenan Sulayman. All Rights reserved.
	 * The NextShell implementation is based on the .Core-Kernel by Kenan Sulayman.
	 *
	 * This is not meant to be reviewed without permission.
	 */
	
	final class NextShell {
		// C-Scope Variables.
		private $cache, $ext, $a = array();
		private $v = "I-r5-1386-64 ";
		private $g = array(
			"",
			"-- Welcome to NextShell %v%--",
			"Copyright (c) Kenan Sulayman. Authorized use only.",
			""
		);
		
		// Kernel Functions
		public function __construct() { $this -> a[0] = time(); $this -> a[1] = true; }
		
		public function __init () {
			foreach($this->g as $p) { print (strstr($p, "%v%") ? str_replace("%v%", $this->v, $p) : $p) . "\r\n"; }
			while(!!(1&true)) { print "$ " . getcwd() . " >> "; $x = trim(fgets(fopen("php://stdin", "w"), 4096)); print "\r\n" . $this->__parse($x) . "\r\n"; }
		}
		
		// Handler
		public function __parse( $i ) {if(is_null($i) or !$i or $i=="") {print "fail."; return;} $y = $i; $i = explode(" ", $i); return $this->__handle($i, $y);}
		
		public function __handle( $i, $y ) {
			$func = $i[0]; $ffunc = $y; $fparams = $i;
			
			$x = array(
				"lock",
				"unlock",
				"exit",
				"del",
				"init"
				
			);
			
			switch ( $i [0] ) {
				case $x[0]:
					if ( file_exists("lock") ) {
						print "\tAlready locked. (0)";
					} else {
						file_put_contents("lock", "");
						print "\tSystem has been locked. (1)";
					}
					break;
				case $x[1]:
					if ( !file_exists("lock") ) {
						print "\tSystem hasn't been locked, yet. (0)";
					} else {
						if (unlink("lock"))
							print "\tSystem has been ulocked. (1)";
						else
							print "\tThe process of unlocking failed. (-1)";
					}
					break;
				case $x[2]:
					print "\tConsole is shutting down.. (1)\r\n";
					return exit;
					break;
				case $x[3]:
					if (file_exists("../".$i [1])) {
						if (unlink("../"."{$i[1]}"))
							print "\tFile: {$i[1]} has been deleted successfully (1)";
						else
							print "\tFile: {$i[1]} could not be deleted. (-1)";
					} else
						print "\tThe file {$i[1]} does not exists, abort! (0)";
					break;
				case $x[4]:
					print "\tUserbase is being initialized... ";
					if ( file_exists("udb") )
						print "failed.\r\n\tThe userbase to be build is existent.";
					else
						print "started.";
					$a = array(
						"users" => array(
							// arr => users { => paths, => posts, =>}
						)
					);
					file_put_contents("udb", serialize($a));
					print "\r\n\tUserbase has been initialized.";
			}
			
		}
		
		// Toolchain
		
		public function __initialized(){return (!(!$this->a[1]));}
		
		// Handler-Functions
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////
	
//for ($port=1;$port<32769;$port++) { 
//    //print $port . " ";
//    //GET AVERAGE as OF ITERATE. 1 2 3 4 5 ..... -----> X / N whereas X implies OFFSET_Y <----- .1^x
//    $socket=@fsockopen("192.168.172.1",$port, $errno, $errst, .001);
//    if ($socket != false) { 
//        print $port . " (" . getservbyport($port, "tcp") . ")"."\r\n";
//        fclose($socket); 
//    }
//    //print "\r\n";
//} 
	////////////////////////////////////////////////////////////////////////////////////////////////////
	$k = new NextShell(); chdir(".."); $k->__init();
?>