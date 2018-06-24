<?php

class Pager
{
    /** Rows count
     * @var integer
     */
    var $nRows;

    /** Current page
     * @var integer
     */
    var $nPage;

    /** Rows per page
     * @var integer
     */
    var $nPageSize;

    /** Pages per frame
     * @var integer
     */
    var $nFrameSize;

    /** Count of pages
     * @var integer
     */
    var $nPagesCount;

    /** First row
     * @var integer
     */
    var $nFirstRow;

    /** Last row
     * @var integer
     */
    var $nLastRow;

    /** Creates pager
     * @param int $nRows
     * @param int $nPage
     * @param int $nPageSize
     * @param int $nFrameSize
     * @return object Pager
     * @access public
     */
    function Pager($nRows, $nPage = 1, $nPageSize = 20, $nFrameSize = 10)
    {
        $this->nRows       = max(intVal($nRows), 0);
        $this->nPageSize   = max(intVal($nPageSize), 1);
        $this->nFrameSize  = max(intVal($nFrameSize), 1);
        $this->nPagesCount = ceil($this->nRows / $this->nPageSize);
        $this->nPage       = max(1, min($this->nPagesCount, intVal($nPage)));
        $this->nFirstRow   = $this->nPageSize*($this->nPage-1);
        $this->nLastRow    = min($this->nFirstRow + $this->nPageSize, $this->nRows);
    }

    /** Calculates first/last page in a current frame
     * @return array ($nStart, $nEnd)
     * @access private
     */
    function _getPos()
    {
        $nStart = 1;
        if (($this->nPage - $this->nFrameSize/2)>0)
        {
            if (($this->nPage + $this->nFrameSize/2) > $this->nPagesCount)
                $nStart = (($this->nPagesCount - $this->nFrameSize)>0) ? ( $this->nPagesCount - $this->nFrameSize + 1) : 1;
            else
                $nStart = $this->nPage - floor($this->nFrameSize/2);
        }

        $nEnd = (($nStart + $this->nFrameSize - 1) < $this->nPagesCount) ? ($nStart + $this->nFrameSize - 1) : $this->nPagesCount;
        return array($nStart, $nEnd);
    }

    /** Calculates offset
     * @param  int $nPage page num
     * @param  int $nPageSize page size
     * @return int possition of first record = page_size*(page-1);
     */
    function getOffset($nPage, $nPageSize)
    {
        return max(1, intVal($nPageSize))*(max(1, intVal($nPage))-1);
    }


    /** Pager for rewrited urls
     * @todo rewrite
     * @param string $sUrl
     * @return array
     */
    function getInfo($sUrl)
    {
        $sFirstUrl = '';
        $sPrevUrl  = '';
        $sNextUrl  = '';
        $sLastUrl  = '';

        $aUrls = array();

        if (1 != $this->nPage)
        {
            $sFirstUrl = sprintf($sUrl, 1);
            $sPrevUrl  = sprintf($sUrl, $this->nPage-1);
        }

        if ($this->nPagesCount != $this->nPage && $this->nPagesCount!=0)
        {
            $sNextUrl = sprintf($sUrl, $this->nPage+1);
            $sLastUrl = sprintf($sUrl, $this->nPagesCount);
        }

        list($nStart, $nEnd) = $this->_getPos();
        for ($i=$nStart; $i<=$nEnd; ++$i)
        {
            if ($this->nPage == $i)
                $aUrls[''] = $i;
            else
            {
                //$oUrl->setParam($this->sUrlKey, $i);
                $aUrls[sprintf($sUrl, $i)] = $i;
            }
        }

        return array(
            'firstUrl'   => $sFirstUrl,
            'prevUrl'    => $sPrevUrl,
            'nextUrl'    => $sNextUrl,
            'lastUrl'    => $sLastUrl,
            'totalPages' => $this->nPagesCount,
            'totalRows'  => $this->nRows,
            'current'    => $this->nPage,
            'fromRow'    => $this->nFirstRow+1,
            'toRow'      => $this->nLastRow,
            'urls'       => $aUrls,
        );
    }

}