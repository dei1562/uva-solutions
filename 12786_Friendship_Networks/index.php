<?php

    /*
        // 1
        4 3 2 2 3

        // 0
        4 1 3 2 3

        // 1
        8 2 5 4 5 4 3 5 2

        6 5 3 2 3 2 5

        7 2 3 3 4 3 3 2
    */

    $input = "6 3 3 2 3 2 5";
    $arrRedSocial = explode(" ", $input);
    
    $N = $arrRedSocial[0];
    $arrValores = [];
    for($i=1; $i <= $N; $i++){
        $arrValores[] = (int) -$arrRedSocial[$i];
    }

    $fb = new FriendshipNetworks();

    $solucion = $fb->getRespesta($arrValores);
    echo 'Resultado:' . $solucion;


    class FriendshipNetworks{

        public function getRespesta($arr){

            while(count($arr) > 0){
                
                $tmp = asort($arr);
                $u = array_splice($arr,0,1);

                if(!isset($u[0])){
                    return 0;
                }
                
                $u = -$u[0];

                if($u > count($arr)){
                    return 0;
                }

                $bordes = array();

                for($i=0; $i < $u; $i++){
                    $bordes[] = $arr[$i] + 1;
                }

                $arr = array();

                for($i=0; $i < $u; $i++){
                    if($bordes[$i] < 0){
                        $arr[] = $bordes[$i];
                    }
                }                
            }
    
            return 1;
        }

    }
    
    

?>