<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function human_filesize($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " " . @$sz[$factor] . "B";
}

function rrmdir($dir) {
    $slash="/";
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $dir = str_replace("/", "\\", $dir);
        $slash = "\\";
    }
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir.$slash.$object))
                    rrmdir($dir.$slash.$object);
                else
                    unlink($dir.$slash.$object);
            }
        }
        rmdir($dir);
    }
}
function sanitize_path($path){
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      $path = str_replace("/", "\\", $path);
  }
  return $path;
}

function datetostr($date){
    if($date=="0000-00-00") return $date;
    $list =
        array(
            'JANUARI',
            'FEBRUARI',
            'MARET',
            'APRIL',
            'MEI',
            'JUNI',
            'JULI',
            'AGUSTUS',
            'SEPTEMBER',
            'OKTOBER',
            'NOVEMBER',
            'DESEMBER'
             );
    $tokens = explode('-', $date);
    $tokens[1] = ucfirst(strtolower($list[intval($tokens[1])-1]));
    return $tokens[2].' '.$tokens[1].' '.$tokens[0];
}

function strtodate($str){
    if(!$str) return null;
    $list =
        array(
            'JANUARI'=>'1',
            'FEBRUARI'=>'2',
            'MARET'=>'3',
            'APRIL'=>'4',
            'MEI'=>'5',
            'JUNI'=>'6',
            'JULI'=>'7',
            'AGUSTUS'=>'8',
            'SEPTEMBER'=>'9',
            'OKTOBER'=>'10',
            'NOVEMBER'=>'11',
            'DESEMBER'=>'12'
             );
    $tokens = explode(' ', $str);
    $tokens[1] = $list[strtoupper($tokens[1])];
    return $tokens[2].'-'.$tokens[1].'-'.$tokens[0];
}
/*
function tcpdf_init()
{
    $tcpdf_config = '../assets/plugins/tcpdf/config/tcpdf_config.php';
    $tcpdf_file = '../assets/plugins/tcpdf/tcpdf.php';
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $tcpdf_config = str_replace("/", "\\", $tcpdf_config);
        $tcpdf_file = str_replace("/", "\\", $tcpdf_file);
    }
    require_once(APPPATH.$tcpdf_config);
    require_once(APPPATH.$tcpdf_file);
}
*/
$fpdf = '../assets/plugins/fpdf/fpdf.php';
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $fpdf = str_replace("/", "\\", $fpdf);
}
require_once(APPPATH.$fpdf);


class PDF_HTML_Table extends FPDF
{
protected $B;
protected $I;
protected $U;
protected $HREF;

function __construct($orientation='P', $unit='mm', $format='A4')
{
    //Call parent constructor
    parent::__construct($orientation,$unit,$format);
    //Initialization
    $this->B=0;
    $this->I=0;
    $this->U=0;
    $this->HREF='';
}

function WriteHTML2($html)
{
    //HTML parser
    $html=str_replace("\n",' ',$html);
    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            //Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            //Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                //Extract attributes
                $a2=explode(' ',$e);
                $tag=strtoupper(array_shift($a2));
                $attr=array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])]=$a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    //Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF=$attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
    if($tag=='P')
        $this->Ln(10);
}

function CloseTag($tag)
{
    //Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
    if($tag=='P')
        $this->Ln(10);
}

function SetStyle($tag, $enable)
{
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style='';
    foreach(array('B','I','U') as $s)
        if($this->$s>0)
            $style.=$s;
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    //Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

function WriteTable($data, $w)
{
    $this->SetLineWidth(.3);
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    foreach($data as $row)
    {
        $nb=0;
        for($i=0;$i<count($row);$i++)
            $nb=max($nb,$this->NbLines($w[$i],trim($row[$i])));
        $h=5*$nb;
        $this->CheckPageBreak($h);
        for($i=0;$i<count($row);$i++)
        {
            $x=$this->GetX();
            $y=$this->GetY();
            $this->Rect($x,$y,$w[$i],$h);
            $this->MultiCell($w[$i],5,trim($row[$i]),0,'C');
            //Put the position to the right of the cell
            $this->SetXY($x+$w[$i],$y);
        }
        $this->Ln($h);

    }
}

function NbLines($w, $txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function ReplaceHTML($html)
{
    $html = str_replace( '<li>', "\n<br> - " , $html );
    $html = str_replace( '<LI>', "\n - " , $html );
    $html = str_replace( '</ul>', "\n\n" , $html );
    $html = str_replace( '<strong>', "<b>" , $html );
    $html = str_replace( '</strong>', "</b>" , $html );
    $html = str_replace( '&#160;', "\n" , $html );
    $html = str_replace( '&nbsp;', " " , $html );
    $html = str_replace( '&quot;', "\"" , $html );
    $html = str_replace( '&#39;', "'" , $html );
    return $html;
}

function ParseTable($Table)
{
    $_var='';
    $htmlText = $Table;
    $parser = new HtmlParser ($htmlText);
    while ($parser->parse())
    {
        if(strtolower($parser->iNodeName)=='table')
        {
            if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                $_var .='/::';
            else
                $_var .='::';
        }

        if(strtolower($parser->iNodeName)=='tr')
        {
            if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                $_var .='!-:'; //opening row
            else
                $_var .=':-!'; //closing row
        }
        if(strtolower($parser->iNodeName)=='td' && $parser->iNodeType == NODE_TYPE_ENDELEMENT)
        {
            $_var .='#,#';
        }
        if ($parser->iNodeName=='Text' && isset($parser->iNodeValue))
        {
            $_var .= $parser->iNodeValue;
        }
    }
    $elems = explode(':-!',str_replace('/','',str_replace('::','',str_replace('!-:','',$_var)))); //opening row
    foreach($elems as $key=>$value)
    {
        if(trim($value)!='')
        {
            $elems2 = explode('#,#',$value);
            array_pop($elems2);
            $data[] = $elems2;
        }
    }
    return $data;
}

function WriteHTML($html)
{
    $html = $this->ReplaceHTML($html);
    //Search for a table
    $start = strpos(strtolower($html),'<table');
    $end = strpos(strtolower($html),'</table');
    if($start!==false && $end!==false)
    {
        $this->WriteHTML2(substr($html,0,$start).'<BR>');

        $tableVar = substr($html,$start,$end-$start);
        $tableData = $this->ParseTable($tableVar);
        for($i=1;$i<=count($tableData[0]);$i++)
        {
            if($this->CurOrientation=='L')
                $w[] = abs(120/(count($tableData[0])-1))+24;
            else
                $w[] = abs(120/(count($tableData[0])-1))+5;
        }
        $this->WriteTable($tableData,$w);

        $this->WriteHTML2(substr($html,$end+8,strlen($html)-1).'<BR>');
    }
    else
    {
        $this->WriteHTML2($html);
    }
}

}
