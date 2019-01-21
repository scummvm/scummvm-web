<!doctype html>
<html>
    <head>
        <title>ScummVM</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="/css/cloud-style.css"/>
    </head>
    <body>
        <div class="container">
            <div class='header'>
                <center><img src="/images/big-logo.png"/></center>
            </div>
            <div class="content">
                <p>Now please enter this code in ScummVM:</p>
                <?php
                function crc16($data)
                {
                    //"CRC16_CCITT_FALSE"
                    $crc = 0xFFFF;
                    for ($i = 0; $i < strlen($data); ++$i) {
                        $x = (($crc >> 8) ^ ord($data[$i])) & 0xFF;
                        $x ^= $x >> 4;
                        $crc = (($crc << 8) ^ ($x << 12) ^ ($x << 5) ^ $x) & 0xFFFF;
                    }
                    return $crc;
                }

                if (isset($_GET["code"])) {
                    $hashchars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?!";

                    //remove "bad" characters from the given code:
                    $code = preg_replace("/[^_\-\/\\a-z0-9]/i", "", $_GET["code"]);

                    //append code's crc16 to the code
                    $crc = crc16($code);
                    $code .= $hashchars[($crc & 0x003F)];
                    $code .= $hashchars[($crc & 0x0FC0) >> 6];
                    $code .= $hashchars[($crc & 0xF000) >> 12];

                    //break the code into pieces of 6 chars
                    //and calculate the checksum character for each piece
                    $len = strlen($code);
                    $new_code = "";
                    for ($i = 0; $i < $len; $i+=6) {
                        $bits = 0x2A;
                        for ($j = 0; $j < 6 && $i + $j < $len; ++$j) {
                            $byte = ord($code[$i + $j]);
                            $bits = $bits ^ $byte;
                            $new_code .= $code[$i + $j];
                        }
                        $new_code .= $hashchars[$bits % 64]." ";
                    }

                    //show the "new code" - groups with checksums
                    echo "<b class='code'>".$new_code."</b>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
