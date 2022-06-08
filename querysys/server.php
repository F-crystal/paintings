<?php
//连接上数据库
include("./mysql_connect.php");	
$keyword=$_POST["keyword"];
$keywords=explode("and ", $keyword);
$s1='TI=';
$s2='AU=';
$s3='DY=';
$s4='FR=';
$s5='CO=';
$s11='TI%';
$s22='AU%';
$s33='DY%';
$s44='FR%';
$s55='CO%';
$tiaojian='';
for($i=0;$i<count($keywords);$i++){
    $str=str_replace("'", "", $keywords[$i]);
    if(substr($str,0,strlen($s1)) ===$s1){
        $temp=str_replace($s1,'',$str);
        
        if(strpos($temp,'*')!==false||strpos($temp,'+')!==false||strpos($temp,'-')!==false){
            if(strpos($temp,'*')!==false){
                $arr_star=explode("*", $temp);
                for($j=0;$j<count($arr_star);$j++){
                    if(strpos($arr_star[$j],'+')!==false||strpos($arr_star[$j],'-')!==false){
                        if(strpos($arr_star[$j],'+')!==false){
                            $arr_add=explode("+",$arr_star[$j]);
                            for($k=0;$k<count($arr_add);$k++){
                                $temp2=$arr_add[$k];
                                if(strpos($arr_add[$k],'(')!==false){
                                    $temp2=str_replace("(","",$arr_add[$k]);
                                }
                                if(strpos($arr_add[$k],')')!==false){
                                    $temp2=str_replace(")","",$arr_add[$k]);
                                }
                                if(strpos($temp2,'-')!==false){
                                    $arr_jian=explode("-",$temp2);
                                    for($m=0;$m<count($arr_jian);$m++){
                                        if($m==0){
                                            if($k==0){
                                                if(empty($tiaojian)){
                                                    $tiaojian=" 标题 like '%".$arr_jian[$m]."%'";
                                                }else{
                                                    $tiaojian.=" and 标题 like '%".$arr_jian[$m]."%'";
                                                }
                                            }
                                            else if($k==count($arr_add)-1){
                                                $tiaojian.=" or 标题 like '%".$arr_jian[$m]."%')";
                                            }
                                            else{
                                                $tiaojian.=" or 标题 like '%".$arr_jian[$m]."%'";
                                            }
                                        }else{
                                            $tiaojian.=" and 标题 not like '%".$arr_jian[$m]."%'";
                                        }
                                    }
                                }else{
                                    if($k==0){
                                        if(empty($tiaojian)){
                                            $tiaojian="(标题 like '%".$temp2."%'";
                                        }else{
                                            $tiaojian.="(标题 like '%".$temp2."%'";
                                        }
                                    }
                                    else if($k==count($arr_add)-1){
                                        $tiaojian.=" or 标题 like '%".$temp2."%')";
                                    }
                                    else{
                                        $tiaojian.=" or 标题 like '%".$temp2."%'";
                                    }
                                }
                            }
                        }
                        else if(strpos($arr_star[$j],'-')!==false){
                            $arr_jian=explode("-",$arr_star[$j]);
                            for($m=0;$m<count($arr_jian);$m++){
                                if($m==0){
                                    if(empty($tiaojian)){
                                        $tiaojian=" 标题 like '%".$arr_jian[$m]."%'";
                                    }else{
                                        $tiaojian.=" and 标题 like '%".$arr_jian[$m]."%'";
                                    }
                                }else{
                                    $tiaojian.=" and 标题 not like '%".$arr_jian[$m]."%'";
                                }
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="标题 like '%".$arr_star[$j]."%'";
                        }else{
                            $tiaojian.=" and 标题 like '%".$arr_star[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'+')!==false){
                $arr_add=explode("+", $temp);
                for($j=0;$j<count($arr_add);$j++){
                    if(strpos($arr_add[$j],'-')!==false){
                        $arr_jian=explode("-",$arr_add[$j]);
                        for($m=0;$m<count($arr_jian);$m++){
                            if($m==0){
                                if(empty($tiaojian)){
                                    $tiaojian=" 标题 like '%".$arr_jian[$m]."%'";
                                }else{
                                    $tiaojian.=" or (标题 like '%".$arr_jian[$m]."%'";
                                }
                            }
                            else if($m==count($arr_jian)-1){
                                $tiaojian.=" and 标题 not like '%".$arr_jian[$m]."%')";
                            }
                            else{
                                $tiaojian.=" and 标题 not like '%".$arr_jian[$m]."%'";
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="标题 like '%".$arr_add[$j]."%'";
                        }
                        else{
                            $tiaojian.=" or 标题 like '%".$arr_add[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'-')!==false){
                $arr_jian=explode("-",$temp);
                for($m=0;$m<count($arr_jian);$m++){
                    if($m==0){
                        if(empty($tiaojian)){
                            $tiaojian=" 标题 like '%".$arr_jian[$m]."%'";
                        }else{
                            $tiaojian.=" 标题 like '%".$arr_jian[$m]."%'";
                        }
                    }else{
                        $tiaojian.=" and 标题 not like '%".$arr_jian[$m]."%'";
                    }
                }
            }
        }else{
            $tiaojian="标题 like '%".$temp."%'";
        }
    }
    if(substr($keywords[$i],0,strlen($s2)) ===$s2){
        $temp=str_replace($s2,'',$str);
        
        if(strpos($temp,'*')!==false||strpos($temp,'+')!==false||strpos($temp,'-')!==false){
            if(strpos($temp,'*')!==false){
                $arr_star=explode("*", $temp);
                for($j=0;$j<count($arr_star);$j++){
                    if(strpos($arr_star[$j],'+')!==false||strpos($arr_star[$j],'-')!==false){
                        if(strpos($arr_star[$j],'+')!==false){
                            $arr_add=explode("+",$arr_star[$j]);
                            for($k=0;$k<count($arr_add);$k++){
                                $temp2=$arr_add[$k];
                                if(strpos($arr_add[$k],'(')!==false){
                                    $temp2=str_replace("(","",$arr_add[$k]);
                                }
                                if(strpos($arr_add[$k],')')!==false){
                                    $temp2=str_replace(")","",$arr_add[$k]);
                                }
                                if(strpos($temp2,'-')!==false){
                                    $arr_jian=explode("-",$temp2);
                                    for($m=0;$m<count($arr_jian);$m++){
                                        if($m==0){
                                            if($k==0){
                                                if(empty($tiaojian)){
                                                    $tiaojian=" 作者 like '%".$arr_jian[$m]."%'";
                                                }else{
                                                    $tiaojian.=" and 作者 like '%".$arr_jian[$m]."%'";
                                                }
                                            }
                                            else if($k==count($arr_add)-1){
                                                $tiaojian.=" or 作者 like '%".$arr_jian[$m]."%')";
                                            }
                                            else{
                                                $tiaojian.=" or 作者 like '%".$arr_jian[$m]."%'";
                                            }
                                        }else{
                                            $tiaojian.=" and 作者 not like '%".$arr_jian[$m]."%'";
                                        }
                                    }
                                }else{
                                    if($k==0){
                                        if(empty($tiaojian)){
                                            $tiaojian="(作者 like '%".$temp2."%'";
                                        }else{
                                            $tiaojian.="(作者 like '%".$temp2."%'";
                                        }
                                    }
                                    else if($k==count($arr_add)-1){
                                        $tiaojian.=" or 作者 like '%".$temp2."%')";
                                    }
                                    else{
                                        $tiaojian.=" or 作者 like '%".$temp2."%'";
                                    }
                                }
                            }
                        }
                        else if(strpos($arr_star[$j],'-')!==false){
                            $arr_jian=explode("-",$arr_star[$j]);
                            for($m=0;$m<count($arr_jian);$m++){
                                if($m==0){
                                    if(empty($tiaojian)){
                                        $tiaojian=" 作者 like '%".$arr_jian[$m]."%'";
                                    }else{
                                        $tiaojian.=" and 作者 like '%".$arr_jian[$m]."%'";
                                    }
                                }else{
                                    $tiaojian.=" and 作者 not like '%".$arr_jian[$m]."%'";
                                }
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="作者 like '%".$arr_star[$j]."%'";
                        }else{
                            $tiaojian.=" and 作者 like '%".$arr_star[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'+')!==false){
                $arr_add=explode("+", $temp);
                for($j=0;$j<count($arr_add);$j++){
                    if(strpos($arr_add[$j],'-')!==false){
                        $arr_jian=explode("-",$arr_add[$j]);
                        for($m=0;$m<count($arr_jian);$m++){
                            if($j==0){
                                if($m==0){
                                    if(empty($tiaojian)){
                                        $tiaojian=" 作者 like '%".$arr_jian[$m]."%'";
                                    }else{
                                        $tiaojian.=" and (作者 like '%".$arr_jian[$m]."%'";
                                    }
                                }
                                else if($m==count($arr_jian)-1){
                                    $tiaojian.=" and 作者 not like '%".$arr_jian[$m]."%')";
                                }
                                else{
                                    $tiaojian.=" and 作者 not like '%".$arr_jian[$m]."%'";
                                }
                            }else{
                                if($m==0){
                                    if(empty($tiaojian)){
                                        $tiaojian=" 作者 like '%".$arr_jian[$m]."%'";
                                    }else{
                                        $tiaojian.=" or (作者 like '%".$arr_jian[$m]."%'";
                                    }
                                }
                                else if($m==count($arr_jian)-1){
                                    $tiaojian.=" and 作者 not like '%".$arr_jian[$m]."%')";
                                }
                                else{
                                    $tiaojian.=" and 作者 not like '%".$arr_jian[$m]."%'";
                                }
                            }
                        }
                    }else{
                        if($j==0){
                            if(empty($tiaojian)){
                                $tiaojian="作者 like '%".$arr_add[$j]."%'";
                            }
                            else{
                                $tiaojian.=" and 作者 like '%".$arr_add[$j]."%'";
                            }
                        }else{
                            if(empty($tiaojian)){
                                $tiaojian="作者 like '%".$arr_add[$j]."%'";
                            }
                            else{
                                $tiaojian.=" or 作者 like '%".$arr_add[$j]."%'";
                            }
                        }
                    }
                }
            }
            else if(strpos($temp,'-')!==false){
                $arr_jian=explode("-",$temp);
                for($m=0;$m<count($arr_jian);$m++){
                    if($m==0){
                        if(empty($tiaojian)){
                            $tiaojian=" 作者 like '%".$arr_jian[$m]."%'";
                        }else{
                            $tiaojian.=" 作者 like '%".$arr_jian[$m]."%'";
                        }
                    }else{
                        $tiaojian.=" and 作者 not like '%".$arr_jian[$m]."%'";
                    }
                }
            }
        }else{
            if(empty($tiaojian)){
                $tiaojian="作者 like '%".$temp."%'";
            }else{
                $tiaojian.=" and 作者 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s3)) ===$s3){
        $temp=str_replace($s3,'',$str);
        
        if(strpos($temp,'*')!==false||strpos($temp,'+')!==false||strpos($temp,'-')!==false){
            if(strpos($temp,'*')!==false){
                $arr_star=explode("*", $temp);
                for($j=0;$j<count($arr_star);$j++){
                    if(strpos($arr_star[$j],'+')!==false||strpos($arr_star[$j],'-')!==false){
                        if(strpos($arr_star[$j],'+')!==false){
                            $arr_add=explode("+",$arr_star[$j]);
                            for($k=0;$k<count($arr_add);$k++){
                                $temp2=$arr_add[$k];
                                if(strpos($arr_add[$k],'(')!==false){
                                    $temp2=str_replace("(","",$arr_add[$k]);
                                }
                                if(strpos($arr_add[$k],')')!==false){
                                    $temp2=str_replace(")","",$arr_add[$k]);
                                }
                                if(strpos($temp2,'-')!==false){
                                    $arr_jian=explode("-",$temp2);
                                    for($m=0;$m<count($arr_jian);$m++){
                                        if($m==0){
                                            if($k==0){
                                                if(empty($tiaojian)){
                                                    $tiaojian=" 创作时代 like '%".$arr_jian[$m]."%'";
                                                }else{
                                                    $tiaojian.=" and 创作时代 like '%".$arr_jian[$m]."%'";
                                                }
                                            }
                                            else if($k==count($arr_add)-1){
                                                $tiaojian.=" or 创作时代 like '%".$arr_jian[$m]."%')";
                                            }
                                            else{
                                                $tiaojian.=" or 创作时代 like '%".$arr_jian[$m]."%'";
                                            }
                                        }else{
                                            $tiaojian.=" and 创作时代 not like '%".$arr_jian[$m]."%'";
                                        }
                                    }
                                }else{
                                    if($k==0){
                                        if(empty($tiaojian)){
                                            $tiaojian="(创作时代 like '%".$temp2."%'";
                                        }else{
                                            $tiaojian.="(创作时代 like '%".$temp2."%'";
                                        }
                                    }
                                    else if($k==count($arr_add)-1){
                                        $tiaojian.=" or 创作时代 like '%".$temp2."%')";
                                    }
                                    else{
                                        $tiaojian.=" or 创作时代 like '%".$temp2."%'";
                                    }
                                }
                            }
                        }
                        else if(strpos($arr_star[$j],'-')!==false){
                            $arr_jian=explode("-",$arr_star[$j]);
                            for($m=0;$m<count($arr_jian);$m++){
                                if($m==0){
                                    if(empty($tiaojian)){
                                        $tiaojian=" 创作时代 like '%".$arr_jian[$m]."%'";
                                    }else{
                                        $tiaojian.=" and 创作时代 like '%".$arr_jian[$m]."%'";
                                    }
                                }else{
                                    $tiaojian.=" and 创作时代 not like '%".$arr_jian[$m]."%'";
                                }
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="创作时代 like '%".$arr_star[$j]."%'";
                        }else{
                            $tiaojian.=" and 创作时代 like '%".$arr_star[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'+')!==false){
                $arr_add=explode("+", $temp);
                for($j=0;$j<count($arr_add);$j++){
                    if(strpos($arr_add[$j],'-')!==false){
                        $arr_jian=explode("-",$arr_add[$j]);
                        for($m=0;$m<count($arr_jian);$m++){
                            if($m==0){
                                if(empty($tiaojian)){
                                    $tiaojian=" 创作时代 like '%".$arr_jian[$m]."%'";
                                }else{
                                    $tiaojian.=" or (创作时代 like '%".$arr_jian[$m]."%'";
                                }
                            }
                            else if($m==count($arr_jian)-1){
                                $tiaojian.=" and 创作时代 not like '%".$arr_jian[$m]."%')";
                            }
                            else{
                                $tiaojian.=" and 创作时代 not like '%".$arr_jian[$m]."%'";
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="创作时代 like '%".$arr_add[$j]."%'";
                        }
                        else{
                            $tiaojian.=" or 创作时代 like '%".$arr_add[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'-')!==false){
                $arr_jian=explode("-",$temp);
                for($m=0;$m<count($arr_jian);$m++){
                    if($m==0){
                        if(empty($tiaojian)){
                            $tiaojian=" 创作时代 like '%".$arr_jian[$m]."%'";
                        }else{
                            $tiaojian.=" 创作时代 like '%".$arr_jian[$m]."%'";
                        }
                    }else{
                        $tiaojian.=" and 创作时代 not like '%".$arr_jian[$m]."%'";
                    }
                }
            }
        }else{
            if(empty($tiaojian)){
                $tiaojian="创作时代 like '%".$temp."%'";
            }else{
                $tiaojian.=" and 创作时代 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s4)) ===$s4){
        $temp=str_replace($s4,'',$str);
        
        if(strpos($temp,'*')!==false||strpos($temp,'+')!==false||strpos($temp,'-')!==false){
            if(strpos($temp,'*')!==false){
                $arr_star=explode("*", $temp);
                for($j=0;$j<count($arr_star);$j++){
                    if(strpos($arr_star[$j],'+')!==false||strpos($arr_star[$j],'-')!==false){
                        if(strpos($arr_star[$j],'+')!==false){
                            $arr_add=explode("+",$arr_star[$j]);
                            for($k=0;$k<count($arr_add);$k++){
                                $temp2=$arr_add[$k];
                                if(strpos($arr_add[$k],'(')!==false){
                                    $temp2=str_replace("(","",$arr_add[$k]);
                                }
                                if(strpos($arr_add[$k],')')!==false){
                                    $temp2=str_replace(")","",$arr_add[$k]);
                                }
                                if(strpos($temp2,'-')!==false){
                                    $arr_jian=explode("-",$temp2);
                                    for($m=0;$m<count($arr_jian);$m++){
                                        if($m==0){
                                            if($k==0){
                                                if(empty($tiaojian)){
                                                    $tiaojian=" 画幅 like '%".$arr_jian[$m]."%'";
                                                }else{
                                                    $tiaojian.=" and 画幅 like '%".$arr_jian[$m]."%'";
                                                }
                                            }
                                            else if($k==count($arr_add)-1){
                                                $tiaojian.=" or 画幅 like '%".$arr_jian[$m]."%')";
                                            }
                                            else{
                                                $tiaojian.=" or 画幅 like '%".$arr_jian[$m]."%'";
                                            }
                                        }else{
                                            $tiaojian.=" and 画幅 not like '%".$arr_jian[$m]."%'";
                                        }
                                    }
                                }else{
                                    if($k==0){
                                        if(empty($tiaojian)){
                                            $tiaojian="(画幅 like '%".$temp2."%'";
                                        }else{
                                            $tiaojian.="(画幅 like '%".$temp2."%'";
                                        }
                                    }
                                    else if($k==count($arr_add)-1){
                                        $tiaojian.=" or 画幅 like '%".$temp2."%')";
                                    }
                                    else{
                                        $tiaojian.=" or 画幅 like '%".$temp2."%'";
                                    }
                                }
                            }
                        }
                        else if(strpos($arr_star[$j],'-')!==false){
                            $arr_jian=explode("-",$arr_star[$j]);
                            for($m=0;$m<count($arr_jian);$m++){
                                if($m==0){
                                    if(empty($tiaojian)){
                                        $tiaojian=" 画幅 like '%".$arr_jian[$m]."%'";
                                    }else{
                                        $tiaojian.=" and 画幅 like '%".$arr_jian[$m]."%'";
                                    }
                                }else{
                                    $tiaojian.=" and 画幅 not like '%".$arr_jian[$m]."%'";
                                }
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="画幅 like '%".$arr_star[$j]."%'";
                        }else{
                            $tiaojian.=" and 画幅 like '%".$arr_star[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'+')!==false){
                $arr_add=explode("+", $temp);
                for($j=0;$j<count($arr_add);$j++){
                    if(strpos($arr_add[$j],'-')!==false){
                        $arr_jian=explode("-",$arr_add[$j]);
                        for($m=0;$m<count($arr_jian);$m++){
                            if($m==0){
                                if(empty($tiaojian)){
                                    $tiaojian=" 画幅 like '%".$arr_jian[$m]."%'";
                                }else{
                                    $tiaojian.=" or (画幅 like '%".$arr_jian[$m]."%'";
                                }
                            }
                            else if($m==count($arr_jian)-1){
                                $tiaojian.=" and 画幅 not like '%".$arr_jian[$m]."%')";
                            }
                            else{
                                $tiaojian.=" and 画幅 not like '%".$arr_jian[$m]."%'";
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="画幅 like '%".$arr_add[$j]."%'";
                        }
                        else{
                            $tiaojian.=" or 画幅 like '%".$arr_add[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'-')!==false){
                $arr_jian=explode("-",$temp);
                for($m=0;$m<count($arr_jian);$m++){
                    if($m==0){
                        if(empty($tiaojian)){
                            $tiaojian=" 画幅 like '%".$arr_jian[$m]."%'";
                        }else{
                            $tiaojian.=" 画幅 like '%".$arr_jian[$m]."%'";
                        }
                    }else{
                        $tiaojian.=" and 画幅 not like '%".$arr_jian[$m]."%'";
                    }
                }
            }
        }else{
            if(empty($tiaojian)){
                $tiaojian="画幅 like '%".$temp."%'";
            }else{
                $tiaojian.=" and 画幅 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s5)) ===$s5){
        $temp=str_replace($s5,'',$str);
        
        if(strpos($temp,'*')!==false||strpos($temp,'+')!==false||strpos($temp,'-')!==false){
            if(strpos($temp,'*')!==false){
                $arr_star=explode("*", $temp);
                for($j=0;$j<count($arr_star);$j++){
                    if(strpos($arr_star[$j],'+')!==false||strpos($arr_star[$j],'-')!==false){
                        if(strpos($arr_star[$j],'+')!==false){
                            $arr_add=explode("+",$arr_star[$j]);
                            for($k=0;$k<count($arr_add);$k++){
                                $temp2=$arr_add[$k];
                                if(strpos($arr_add[$k],'(')!==false){
                                    $temp2=str_replace("(","",$arr_add[$k]);
                                }
                                if(strpos($arr_add[$k],')')!==false){
                                    $temp2=str_replace(")","",$arr_add[$k]);
                                }
                                if(strpos($temp2,'-')!==false){
                                    $arr_jian=explode("-",$temp2);
                                    for($m=0;$m<count($arr_jian);$m++){
                                        if($m==0){
                                            if($k==0){
                                                if(empty($tiaojian)){
                                                    $tiaojian=" 内容 like '%".$arr_jian[$m]."%'";
                                                }else{
                                                    $tiaojian.=" and 内容 like '%".$arr_jian[$m]."%'";
                                                }
                                            }
                                            else if($k==count($arr_add)-1){
                                                $tiaojian.=" or 内容 like '%".$arr_jian[$m]."%')";
                                            }
                                            else{
                                                $tiaojian.=" or 内容 like '%".$arr_jian[$m]."%'";
                                            }
                                        }else{
                                            $tiaojian.=" and 内容 not like '%".$arr_jian[$m]."%'";
                                        }
                                    }
                                }else{
                                    if($k==0){
                                        if(empty($tiaojian)){
                                            $tiaojian="(内容 like '%".$temp2."%'";
                                        }else{
                                            $tiaojian.="(内容 like '%".$temp2."%'";
                                        }
                                    }
                                    else if($k==count($arr_add)-1){
                                        $tiaojian.=" or 内容 like '%".$temp2."%')";
                                    }
                                    else{
                                        $tiaojian.=" or 内容 like '%".$temp2."%'";
                                    }
                                }
                            }
                        }
                        else if(strpos($arr_star[$j],'-')!==false){
                            $arr_jian=explode("-",$arr_star[$j]);
                            for($m=0;$m<count($arr_jian);$m++){
                                if($m==0){
                                    if(empty($tiaojian)){
                                        $tiaojian=" 内容 like '%".$arr_jian[$m]."%'";
                                    }else{
                                        $tiaojian.=" and 内容 like '%".$arr_jian[$m]."%'";
                                    }
                                }else{
                                    $tiaojian.=" and 内容 not like '%".$arr_jian[$m]."%'";
                                }
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="内容 like '%".$arr_star[$j]."%'";
                        }else{
                            $tiaojian.=" and 内容 like '%".$arr_star[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'+')!==false){
                $arr_add=explode("+", $temp);
                for($j=0;$j<count($arr_add);$j++){
                    if(strpos($arr_add[$j],'-')!==false){
                        $arr_jian=explode("-",$arr_add[$j]);
                        for($m=0;$m<count($arr_jian);$m++){
                            if($m==0){
                                if(empty($tiaojian)){
                                    $tiaojian=" 内容 like '%".$arr_jian[$m]."%'";
                                }else{
                                    $tiaojian.=" or (内容 like '%".$arr_jian[$m]."%'";
                                }
                            }
                            else if($m==count($arr_jian)-1){
                                $tiaojian.=" and 内容 not like '%".$arr_jian[$m]."%')";
                            }
                            else{
                                $tiaojian.=" and 内容 not like '%".$arr_jian[$m]."%'";
                            }
                        }
                    }else{
                        if(empty($tiaojian)){
                            $tiaojian="内容 like '%".$arr_add[$j]."%'";
                        }
                        else{
                            $tiaojian.=" or 内容 like '%".$arr_add[$j]."%'";
                        }
                    }
                }
            }
            else if(strpos($temp,'-')!==false){
                $arr_jian=explode("-",$temp);
                for($m=0;$m<count($arr_jian);$m++){
                    if($m==0){
                        if(empty($tiaojian)){
                            $tiaojian=" 内容 like '%".$arr_jian[$m]."%'";
                        }else{
                            $tiaojian.=" 内容 like '%".$arr_jian[$m]."%'";
                        }
                    }else{
                        $tiaojian.=" and 内容 not like '%".$arr_jian[$m]."%'";
                    }
                }
            }
        }else{
            if(empty($tiaojian)){
                $tiaojian="内容 like '%".$temp."%'";
            }else{
                $tiaojian.=" and 内容 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s11)) ===$s11){
        $temp=str_replace($s11, "", $keywords[$i]);
        $temp=str_replace("(","",$temp);
        $temp=str_replace(")","",$temp);
        $temp=str_replace("'","",$temp);
        if(strpos($temp,'+')!==false){
            $arr_add=explode("+",$temp);
            for($m=0;$m<count($arr_add);$m++){
                if($m==0){
                    if(empty($tiaojian)){
                        $tiaojian="(标题 like '%".$arr_add[$m]."%'";
                    }else{
                        $tiaojian.=" and (标题 like '%".$arr_add[$m]."%'";
                    }
                }
                else if($m==count($arr_add)-1){
                    $tiaojian.=" or 标题 like '%".$arr_add[$m]."%')";
                }
                else{
                    $tiaojian.=" or 标题 like '%".$arr_add[$m]."%'";
                }
            }
        }
        else{
            if(empty($tiaojian)){
                $tiaojian="标题 like '%".$temp."%'";
            }else{
                $tiaojian=" and 标题 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s22)) ===$s22){
        $temp=str_replace($s22, "", $keywords[$i]);
        $temp=str_replace("(","",$temp);
        $temp=str_replace(")","",$temp);
        $temp=str_replace("'","",$temp);
        if(strpos($temp,'+')!==false){
            $arr_add=explode("+",$temp);
            for($m=0;$m<count($arr_add);$m++){
                if($m==0){
                    if(empty($tiaojian)){
                        $tiaojian="作者 like '%".$arr_add[$m]."%'";
                    }else{
                        $tiaojian.=" and (作者 like '%".$arr_add[$m]."%'";
                    }
                }
                else if($m==count($arr_add)-1){
                    $tiaojian.=" or 作者 like '%".$arr_add[$m]."%')";
                }
                else{
                    $tiaojian.=" or 作者 like '%".$arr_add[$m]."%'";
                }
            }
        }
        else{
            if(empty($tiaojian)){
                $tiaojian="作者 like '%".$temp."%'";
            }else{
                $tiaojian=" and 作者 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s33)) ===$s33){
        $temp=str_replace($s33, "", $keywords[$i]);
        $temp=str_replace("(","",$temp);
        $temp=str_replace(")","",$temp);
        $temp=str_replace("'","",$temp);
        if(strpos($temp,'+')!==false){
            $arr_add=explode("+",$temp);
            for($m=0;$m<count($arr_add);$m++){
                if($m==0){
                    if(empty($tiaojian)){
                        $tiaojian="(创作时代 like '%".$arr_add[$m]."%'";
                    }else{
                        $tiaojian.=" and (创作时代 like '%".$arr_add[$m]."%'";
                    }
                }
                else if($m==count($arr_add)-1){
                    $tiaojian.=" or 创作时代 like '%".$arr_add[$m]."%')";
                }
                else{
                    $tiaojian.=" or 创作时代 like '%".$arr_add[$m]."%'";
                }
            }
        }
        else{
            if(empty($tiaojian)){
                $tiaojian="创作时代 like '%".$temp."%'";
            }else{
                $tiaojian=" and 创作时代 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s44)) ===$s44){
        $temp=str_replace($s44, "", $keywords[$i]);
        $temp=str_replace("(","",$temp);
        $temp=str_replace(")","",$temp);
        $temp=str_replace("'","",$temp);
        if(strpos($temp,'+')!==false){
            $arr_add=explode("+",$temp);
            for($m=0;$m<count($arr_add);$m++){
                if($m==0){
                    if(empty($tiaojian)){
                        $tiaojian="(画幅 like '%".$arr_add[$m]."%'";
                    }else{
                        $tiaojian.=" and (画幅 like '%".$arr_add[$m]."%'";
                    }
                }
                else if($m==count($arr_add)-1){
                    $tiaojian.=" or 画幅 like '%".$arr_add[$m]."%')";
                }
                else{
                    $tiaojian.=" or 画幅 like '%".$arr_add[$m]."%'";
                }
            }
        }
        else{
            if(empty($tiaojian)){
                $tiaojian="画幅 like '%".$temp."%'";
            }else{
                $tiaojian=" and 画幅 like '%".$temp."%'";
            }
        }
    }
    if(substr($keywords[$i],0,strlen($s55)) ===$s55){
        $temp=str_replace($s55, "", $keywords[$i]);
        $temp=str_replace("(","",$temp);
        $temp=str_replace(")","",$temp);
        $temp=str_replace("'","",$temp);
        if(strpos($temp,'+')!==false){
            $arr_add=explode("+",$temp);
            for($m=0;$m<count($arr_add);$m++){
                if($m==0){
                    if(empty($tiaojian)){
                        $tiaojian="(内容 like '%".$arr_add[$m]."%'";
                    }else{
                        $tiaojian.=" and (内容 like '%".$arr_add[$m]."%'";
                    }
                }
                else if($m==count($arr_add)-1){
                    $tiaojian.=" or 内容 like '%".$arr_add[$m]."%')";
                }
                else{
                    $tiaojian.=" or 内容 like '%".$arr_add[$m]."%'";
                }
            }
        }
        else{
            if(empty($tiaojian)){
                $tiaojian="内容 like '%".$temp."%'";
            }else{
                $tiaojian=" and 内容 like '%".$temp."%'";
            }
        }
    }
}

$sql="select * from 汇总数据 where ".$tiaojian;
//echo $sql;exit();
$result=mysqli_query($con,$sql);
$num =  $result->num_rows;

$returnvalue=$num.'@';
$divhtml = '';
while($row=$result->fetch_array()){
    $divhtml.="<div><div><img src=\"".$row['图片']."\" onclick=todetail(\"".$row['id']."\")></div><p>".$row['标题']."</p><i style=\"display: none;\">".$row['id']."</i></div>";
}
$returnvalue=$returnvalue.$divhtml;
echo $returnvalue;
?>