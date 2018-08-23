#!/usr/bin/php
<?php
require_once(__DIR__.'/configure.php');
require_once(__DIR__.'/escreva.php');
execute(IP_CGNAT);

function execute($cgnat)
{
    $s = 1;
    $i = 1;
    $e = $cgnat;
    $ip1 = ip2long(IP_PUB_START);
    $ip2 = ip2long(IP_PUB_STOP);
    $ip3 = ip2long(IP_PRI_START);
    
    /**
     * Loop IP Pub Range
     */    
    write::file("/ip firewall nat");
    while ($ip1 <= $ip2) {
        
        $ip = long2ip($ip1);        
       
        // 4o Octeto
        $ipx = explode('.', $ip);
        if( $ipx[3] > 0 && $ipx[3] < 255 ){
                        
            /**
             * Faixa IP Pri
             */            
            $p = ceil((65535-1024)/$cgnat);
            $port_s = 1025;
            $port_e = $port_s + $p;
            for($pri = $i; $pri <= $e; $pri++) {
                                
                // 4o Octeto
                $ipp = explode('.', long2ip($ip3));
                if( $ipp[3] > 0 && $ipp[3] < 255 ){
                    {
                    }
                    write::file("add  action=src-nat  chain=srcnat  comment=CGNAT>$ip<para_".long2ip($ip3)." disabled=yes  protocol=tcp  src-address=".long2ip($ip3)." to-addresses=".$ip." to-ports=".$port_s."-".$port_e);
                    write::file("add  action=src-nat  chain=srcnat  comment=CGNAT>$ip<para_".long2ip($ip3)." disabled=yes  protocol=udp  src-address=".long2ip($ip3)." to-addresses=".$ip." to-ports=".$port_s."-".$port_e);
                    
                    $port_s = $port_e + 1;
                    $port_e = $port_e + $p;
                    if($port_e > 65535){
                        $port_e = 65535;
                    }
                    
                }
                
                $ip3++;
                $s = $s+1;    

            }
            $i = $s;
            $e = $e+$cgnat;
        }
        
        $ip1 ++;
        
    }
    
}
