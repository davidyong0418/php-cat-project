<style>
 .paging
 {
 text-align:center;
 }
 .paging a
 {
  color:#7A7A7A;
  font:bold 11px Tahoma,Arial;
  text-decoration:none;
  margin-left:2px;
  background:#f0f0f0;
  border:1px Solid #385060;
  border-color:#fff #385060 #385060 #fff;
 }
 .paging a:hover
 {
   background:#d0d0d0;
   border-color:#385060 #fff #fff #385060;
 }
 .paging .thispage
 {
  font:bold 11px Tahoma,Arial;
  color:#7A7A7A;
  margin:2px 5px;
 }

</style>
<?
$bypassgeturl=array("start");
$geturl="?";
foreach($_REQUEST as $key=>$val)
{
 if(in_array($key,$bypassgeturl)) continue;
 else $geturl.="$key=$val&";
}
$prev=$start-$perpage;
if($prev<0)
$prev=0;
?>

<table  class='paging' width='100%'>
<tr>
<td width='70px' align='left'>
<? if($start==0){?>
<span class='thispage'>&laquo;</span>
<? }else{?>
<a href="<?=$_SERVER[PHP_SELF].$geturl."start=0"?>">&nbsp;&laquo;</a>
<?}?>
<? if($start==0){?>
<span class='thispage'>Prev</span>
<?}else{?>
<a href="<?=$_SERVER[PHP_SELF].$geturl."start=$prev"?>">&nbsp;Prev </a>
<?}?>

</td>
<td>
<?
  for($disp=1,$loop=0;$loop<=$totrec-1;$loop+=$perpage,$disp++)
  {
    if($start==$loop)
    echo "<span class='thispage'>$disp</span>";
    else
    echo "<a href='$_SERVER[PHP_SELF]".$geturl."start=$loop'>&nbsp;$disp </a>";
  }
  $next=$start+$perpage;
  if($next>$totrec-1) $next=$loop-$perpage;
?>
</td>
<td width='70px' align='right' nowrap>
<?if($next>$start){?>
<a href="<?=$_SERVER[PHP_SELF].$geturl."start=".$next?>">&nbsp;Next </a>
<?}else{?>
<span class='thispage'>Next</span>
<?}?>
<?if($loop-$perpage>$start){?>
<a href="<?=$_SERVER[PHP_SELF].$geturl."start=".($loop-$perpage)?>">&nbsp;&raquo; </a></td>
<?}else{?>
<span class='thispage'>&raquo;</span></td>
<?}?>
</tr>
</table>