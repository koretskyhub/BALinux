<?
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
  * {
        font-family: 'Courier New';
    }
  h1 {
        text-align: center;
     }
  </style>
 </head>
 <body>
<H1 class ="h";>Сокет клиента</H1>
<?php echo $_SERVER['REMOTE_ADDR'];
echo "<br>";?>
<hr>
<H1>Сокет прокси-NGINX</H1>
<?php echo $_SERVER['HTTP_X_FORWARDED_FOR'];
//echo ":";
//echo $_SERVER['REMOTE_PORT'];
//echo "<br>";
//echo $_SERVER['NGINX_VERSION'];
?>
  <hr>
  <H1>Load Average</H1>
  <table>
  <tr><td>LA for 1 minute</td><td>LA for 5 minute's</td><td>LA for 15 minute's</td></tr>
  <tr><td><?php echo coloring($lavg1);?></td><td><?php echo coloring($lavg5);?></td><td><?php echo coloring($lavg15); ?></td></tr>
  </table>
  <br>
  <hr>
  <H1>Загрузка Дисков</H1>
  <pre><?php system('iostat -dx'); ?></pre>
  <hr>
  <H1>Загрузка Сети</H1>
  <pre><?php system('cat /proc/net/dev')  ?></pre>
  <hr>
  <H1>Top Talkers</H1>
  <pre><?php system('tcpdump -l -c10 -i any');  ?></pre>
  <hr>
  <H1>Сетевые соединения</H1>
  <pre><?php system('netstat -tlpn');  ?></pre>
  <hr>
  <H1>Загрузка CPU</H1>
  <pre><?php system('mpstat'); ?></pre>
  <hr>
  <H1>Информация о дисках</H1>
  <pre><?php echo system('df -h'); ?></pre>
</body>
</html>
