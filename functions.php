<?php

function mainPagingAjaxMasood($total_recs,$from,$url,$size) {
$total_result	= $total_recs;
	$perpage		= $size;
	$total_page		= ceil($total_result/$perpage);
	$start			= 1;
	$end			= $static_no = 10;
	$half			= ($static_no / 2);
	$curent_page	= ($from / $perpage) + $start;
	if ($static_no > $total_page ) $static_no = $total_page;
	if ($from && $curent_page >= $half) {
		$start	= (($from / $perpage) + $start) - ($half);
		$end	= ($from / $perpage) + $static_no - ($half -1);
		$p_loop = ($from / $perpage);

	}
	if (($start + $static_no) > $total_page && $total_page >= $static_no) {
		$start	= $total_page - $static_no + 1;
		$end	= $total_page;
		$p_loop = $total_page - $static_no;
	}
	$pre   = 0;
	$next  = 0;
	$start = ($start < 1) ? 1 : $start;
	$pre   = $from-$size;
	$next  = $from+$size;
   ?>
	<table><tr>
		<?php
		if($from>4)
		{?>
			<td><a href="<?php echo $url?>&start=<?php echo $pre?>" class='redlink'>&nbsp;&nbsp;<B> << Previous&nbsp;</B></a> </td>
		<?php
			}

			for ($i=$start; $i<=$end; $i++){
				$p_no = (($i - 1) * $perpage);
				if ($from!=$p_no){?>
				<td width='20px' >
					<TABLE width="100%" border="0" cellspacing="0" cellpadding="0" class='page_Border' >
						<TR>
						   <TD align="center"><a href="<?php echo $url?>&start=<?php echo $p_no?>" class='redlink'><?php echo $i?></a></TD>
						</TR>
					</TABLE>
				</td>
				<?php
				}else{
				?>
					<td width='20px' >
					<TABLE width="100%" border="0" cellspacing="0" cellpadding="0" class='pageBorder' >
						<TR>
						   <TD align="center" class='blackLink'><span class="blackLink"><?php echo $i?></span></TD>
						</TR>
					</TABLE>
				</td>
				<?php
				}
			}
		if($from <($total_result-5))
		{?>
			<td><a href="<?php echo $url?>&start=<?php echo $next?>" class='redlink'>&nbsp;&nbsp;<B>Next >>&nbsp;</B></a> </td>
		<?php
			}
			echo "</tr></table>";
}

?>