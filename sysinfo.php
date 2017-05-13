<?php
$lavg1 = exec('cut -f1 -d" " /proc/loadavg');
$lavg5 = exec('cut -f2 -d" " /proc/loadavg');
$lavg15 = exec('cut -f3 -d" " /proc/loadavg');
function coloring($lavg)
{
        $v = intval($lavg);
        if ($v > 2.0)
                return "<div style='color:red;'>$lavg </div>";
        if ($v < 1.0)
                return "<div style='color:green;'>$lavg</div>";
        if (($v > 1.0) and ($v < 2.0 ))
                return "<div style='color:yellow;'>$lavg</div>";
};
?>
<!DOCTYPE html>
 <head>
  <meta charset="utf-8">
  <title>SYSTEM INFO</title>
  <style>
  </style>
 </head>
 <body>
  <table>
  <tr><td>LoadAverade 1 minute</td> <td>LoadAverade 5 minute</td> <td>LoadAverade 15 minute</td></tr>
  <tr><td><?php echo coloring($lavg1);?></td> <td><?php echo coloring($lavg5);?></td> <td><?php echo coloring($lavg15); ?></td></tr>
  </table>
 </body>
</html>
