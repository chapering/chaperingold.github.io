<?php
require('util.php');
require('browser_detect.php');
//author: weilei zhag
//init date: Nov 2, 2005
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~`
class 	HTMLPage
{

  function mkdocument ($title, $style_arr, $js_arr, $body)
    {
    global $path_to_navi;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title><?php echo $title; ?></title>

<?php

foreach ($style_arr as $sheet)
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $path_to_navi.$sheet; ?>" />
<?php
}

foreach ($js_arr as $js)
{
?>
<script type="text/javascript" src="<?php echo $js; ?>"></script>
<?php 
}
?>


</head>
<body>

<?php echo $body; ?>


</body>
</html>
<?php
	} // end of mkdocument


  function mkProlangsDocument ($title,  $js_arr, $body)
    {
    global $path_to_navi;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title><?php echo $title; ?></title>

<?php 
    $btype=browser_detection('browser');
    switch($btype){
        case 'ie':
            $style_arr=array('http://prolangs.cs.vt.edu/win.css');
            break;
        case 'moz':
        default:
            $style_arr=array('http://prolangs.cs.vt.edu/main.css');
            break;
        
    }

foreach ($style_arr as $sheet)
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $path_to_navi.$sheet; ?>" />
<?php
}

foreach ($js_arr as $js)
{
?>
<script type="text/javascript" src="<?php echo $js; ?>"></script>
<?php 
}
?>


</head>
<body>

<?php echo $body; ?>


</body>
</html>
<?php
	} // end of mkdocument

}



//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
class ThreeParts
{
  var $top;
  var $left;
  var $content;
  var $onlytwo;
  var $prolangsroot="http://prolangs.cs.vt.edu/"; 
  function ThreeParts($onlytwo=false)
    {
      $this->onlytwo=$onlytwo;
      
    }
  
  function getHTML()
    {
      return $this->top.$this->left.$this->content;
      
    }
  
  function mkTop(&$navi)
    {
      $this->top=<<<END_TOP


<div id="container">


  <div id=banner>

	<span id=banner-img></span>

  </div><!--end of banner-->



  <div class=navcontainer>
	<ul>
END_TOP;
      foreach($navi->linklist as $item => $link)
	{
	  if ($navi->isActive($item))
	  {
	    
	    $oneitem=<<<END_ITEM
	      
	      <li id=active><a  href=$link>$item</a></li> 	  
END_ITEM;
	  
	  }
	  else
	    {
	     $oneitem=<<<END_ITEM
	      
	      <li><a  href=$link>$item</a></li> 	  
END_ITEM;
	    }
	  $this->top.=$oneitem;
	  
	}
      

      $this->top.=<<<END_TOP
      </ul>
  </div> <!--end of navcontainer-->
</div> <!--end of container-->
END_TOP;

    }

  function mkLeft($input)
    {
      if ($this->onlytwo){
        if ($input=='_directory_')
            $leftcontent=$this->getDirectoryList("..");
        else
            $leftcontent=$input;
                
        $this->left=<<<END_LEFT
	
<div id=left>
   <div class=sidebar>
	  
            $leftcontent
   </div>
</div>

	<!--End of Left-->
END_LEFT;
      
      
      }
      
    }
  function getDirectoryList($basedir){
        
        $dh  = opendir($basedir);
        while (false !== ($filename = readdir($dh))) {
            $files[] = $filename;
        }

        sort($files);
        for ($i=2; $i<count($files); $i+=1){
            
            $filename= $files[$i];
            $dir= $basedir."/".$filename;
            if (is_dir($dir)){
                
                $line=<<<END_RET
<h2><a href="$dir/index.php">$filename</a></h2>

END_RET;
            }
            $ret.=$line;


        }
        return $ret;
  }
  
  function mkContent(&$input)
    {
      $this->content=<<<END_CONTENT
	
<div id="center">
  <div class=content>
	
	$input
	 
   </div>
	
</div>
END_CONTENT;
      

    }
  
  
}




?>
