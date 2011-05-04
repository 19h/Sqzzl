<?php
        /*
         *      (c) The nCoreDB Algorithm. By Kenan Sulayman. All rights reserved.
         *      (c) The nCoreDB Implementation. By Kenan Sulayman. All rights reserved.
         */
        
        define( "Interfaced", true );
        define( "wAuth", __FILE__ );
        require( "nCdb" ); // there shouldn't be any suffix.
        
        // there's a Singleton.
        
        final class __nCdb {
                private static $instance = null;
                private $v, $c, $p, $d;
                
                public function __establish ( $db, $keys, $salt /* App-ID */ ) {
                        if ( !$this->d->__exists($db) ) true;
                                
                }
                
                public function __construct ()  {
                        $this->d = new nCdb;
                }
                
                public static function getInstance(  ) { if ( self::$instance === null ) self::$instance = new self; return self::$instance; }
                private function __clone(  ) { }
        }
        // __nCdb::getInstance(  );
?>