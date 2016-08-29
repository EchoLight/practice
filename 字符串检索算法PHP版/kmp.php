<?php
$str='ababa';
$m=strlen($str);
$str1='babababababac';
$n=strlen($str1);
$pi=prefix($str,$m);
$finally=matcher($pi,$n,$m,$str,$str1);

//匹配 跳转
function matcher($pi,$n,$m,$p,$t){
        $q=0;
        for($i=0;$i<$n;$i++){
                while($q>0&&$p[$q]!=$t[$i]){
                       $q=$pi[$q-1];
                }
                if($p[$q]==$t[$i]&&$q!=$m){
                        $q++;
                }
                if($q==$m){
                        $q=$pi[$q-1];
                        echo $i;
                }
                
        }
}
//求出与真后缀匹配的最大前缀
function prefix($p,$m){
        $k=0;
        $pi=array();
        $pi[0]=0;


        for($q=1;$q<$m;$q++){
                
                while($k>0&&$p[$k]!=$p[$q]){
                       $k=0; 
                } 
                if($p[$k]==$p[$q]){
                        $k=$k+1;
                }
                
                $pi[$q]=$k;
        }
        return $pi;
}
?>
