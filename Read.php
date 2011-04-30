<?php
        $x = unserialize(file_get_contents("sx"));
        for ($i=0;$i<=count($x);++$i) {
                if ( $x[$i] == "" || !($x[$i] == true) ) {
                        unset($x[$i]);
                        continue;
                }
                $z = $x[$i];
                for($y=0;$i<=strlen($z);++$y) {
                        if ( ord($z[$y]) > 127 )
                                str_replace($z[$y], "", $z[$y]);
                $x[$i] = $z;
                }
        }
        file_put_contents("sx", serialize($x));
        print_r(unserialize(file_get_contents("sx")));
?>