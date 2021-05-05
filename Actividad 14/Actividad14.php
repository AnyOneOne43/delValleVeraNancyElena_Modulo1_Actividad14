<?php
    $app=$_POST["Enviar"];

    if($app=="Consultar")
    {
        echo "<h1>Reloj Mundial</h1>";
        echo "<table border='1'>";
            echo "<tr>";
                echo "<th colspan=3>Reloj Mundial</th>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Ciudad de México</td>";
                echo "<td>";
                    $act=$_POST["HoraMex"];
                    echo $act;
                echo "</td>";
            echo "<tr>";
            if(isset($_POST["NY"])){
                echo "<tr>";
                echo "<td>Nueva York</td>";
                echo "<td>";
                $NY= strtotime( '+1 hour' , strtotime ($act) ) ;
                $NY=date ('H:i', $NY);
                echo $NY;
                echo "</td>";
            echo "<tr>";
            }
            if(isset($_POST["AP"])){
                echo "<tr>";
                echo "<td>Sao Paulo</td>";
                echo "<td>";
                $SP= strtotime( '+2 hour' , strtotime ($act) ) ;
                $SP=date ('H:i', $SP);
                echo $SP;
                echo "</td>";
            echo "<tr>";
            }
            if(isset($_POST["M"])){
                echo "<tr>";
                echo "<td>Madrid</td>";
                echo "<td>";
                $M= strtotime( '+7 hour' , strtotime ($act) ) ;
                $M=date ('H:i', $M);
                echo $M;
                echo "</td>";
            echo "<tr>";
            }
            if(isset($_POST["P"])){
                echo "<tr>";
                echo "<td>Paris</td>";
                echo "<td>";
                $P= strtotime( '+7 hour' , strtotime ($act) ) ;
                $P=date ('H:i', $P);
                echo $P;
                echo "</td>";
            echo "<tr>";
            }
            if(isset($_POST["R"])){
                echo "<tr>";
                echo "<td>Roma</td>";
                echo "<td>";
                $R= strtotime( '+7 hour' , strtotime ($act) ) ;
                $R=date ('H:i', $R);
                echo $R;
                echo "</td>";
            echo "<tr>";
            }
            if(isset($_POST["A"])){
                echo "<tr>";
                echo "<td>Atenas</td>";
                echo "<td>";
                $A= strtotime( '+8 hour' , strtotime ($act) ) ;
                $A=date ('H:i', $A);
                echo $A;
                echo "</td>";
            echo "<tr>";
            }
            if(isset($_POST["B"])){
                echo "<tr>";
                echo "<td>Beijin</td>";
                echo "<td>";
                $B= strtotime( '+13 hour' , strtotime ($act) ) ;
                $B=date ('H:i', $B);
                echo $B;
                echo "</td>";
            echo "<tr>";
            }
            if(isset($_POST["T"])){
                echo "<tr>";
                echo "<td>Tokio</td>";
                echo "<td>";
                $T= strtotime( '+14 hour' , strtotime ($act) ) ;
                $T=date ('H:i', $T);
                echo $T;
                echo "</td>";
            echo "<tr>";
            }
        echo "</table>"; 
    }
    else if($app=="Calcular"){
        echo "<h1>Calculadora de Cumpleaños</h1>";
        echo "<table border='1'>";
            echo "<tr>";
                echo "<th>Cumpleaños</th>";
                echo "<th>";
                $cumple=$_POST["fechacumple"];
                $cumple=date('d-m',strtotime($cumple));
                date_default_timezone_set("America/Mexico_City");
                $fecha=date("d-m-Y");
                $fecha=date('d-m',strtotime($fecha));
                $cumpleaños=explode("-",$cumple);
                $hoy=explode("-",$fecha);

                
                
                if(($cumpleaños[1]>$hoy[1]) || (($cumpleaños[1]==$hoy[1])&&($cumpleaños[0]>$hoy[0]))){
                    $año=date("Y");
                    echo $cumple ."-" .$año;
                    $prox=$cumple ."-" .$año;
                }
                else{
                    $año=date("Y");
                    $año= date("Y",strtotime($año."+ 1 year"));
                    echo $cumple ."-" .$año;
                    $prox=$cumple ."-" .$año;
                }
                echo "</th>";
            echo "<tr>";

            $h=localtime(time(), true);
            $c=localtime(mktime(0,0,0,$cumpleaños[1],$cumpleaños[0], $año), true);
            if(($cumpleaños[1]>$hoy[1]) || (($cumpleaños[1]==$hoy[1])&&($cumpleaños[0]>$hoy[0]))){
                $dias=$c["tm_yday"]-$h["tm_yday"];
                if($dias<0){
                    abs($dias);
                }
            }
            else{
                $dias=(365-$h["tm_yday"])+$c["tm_yday"];
            }

            if(isset($_POST["diascumple"])){
                echo "<tr>";
                    echo "<td>";
                        echo "Dias:";
                    echo "</td>";
                    echo "<td>";
                    echo $dias;
                    echo "</td>";
                echo "</tr>";
            }
            if(isset($_POST["horascumple"])){
                echo "<tr>";
                    echo "<td>";
                        echo "Horas:";
                    echo "</td>";
                        
                    echo "<td>";
                    $horas=$dias*24;
                    echo $horas;
                    echo "</td>";
                echo "</tr>";

            }
            if(isset($_POST["minutoscumple"])){
                echo "<tr>";
                    echo "<td>";
                        echo "Minutos:";
                    echo "</td>";
                        
                    echo "<td>";
                    $minutos=$dias*24*60;
                    echo $minutos;
                    echo "</td>";
                echo "</tr>";

            }
            if(isset($_POST["cuandocumple"])){
                echo "<tr>";
                    echo "<td>";
                        echo "¿Sera en fin de Semana?";
                    echo "</td>";
                    echo "<td>";
                    switch($c["tm_wday"]){
                        case 0:
                            echo "Domingo";
                        break;
                        case 1:
                            echo "Lunes";
                        break;
                        case 2:
                            echo "Martes";
                        break;
                        case 3:
                            echo "Miercoles";
                        break;
                        case 4:
                            echo "Jueves";
                        break;
                        case 5:
                            echo "Viernes";
                        break;
                        case 6:
                            echo "Sabado";
                        break;
                    }
                    echo "</td>";
                echo "</tr>";

            }
            
        echo "</table>";
    }
?>