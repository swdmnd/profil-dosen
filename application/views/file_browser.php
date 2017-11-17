<?php
    $prefix = $controller.'/'.$method.'/'.$path_in_url;
    if (!empty($dirs)) foreach( $dirs as $dir )
        echo '/'.anchor($prefix.$dir['name'], $dir['name']).'<br>';

    if (!empty($files)) foreach( $files as $file )
        echo anchor($prefix.$file['name'], $file['name']).'<br>';
?>
