<?php
$fna = $_POST['fna'];
$lna = $_POST['lna'];
$mjr = $_POST['mjr'];
$eml = $_POST['eml'];

$con = mysqli_connect("129.108.156.112", "ctis", "CTIS19691963", "tlc");
$qry = "INSERT INTO members (fna, lna, eml, mjr, pos) VALUES ('$fna', '$lna', '$eml', '$mjr', 'Member')";
if (mysqli_query($con, $qry) === TRUE) {
    echo '<!DOCTYPE HTML>
            <html lang="en-US">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="refresh" content="1;url=http://ctis.utep.edu/utc/tlc/">
                    <script type="text/javascript">
                        window.location.href = "http://ctis.utep.edu/utc/tlc/"
                    </script>
                    <title>Page Redirection</title>
                </head>
                <body>
                    If you are not redirected automatically, follow the <a href="http://ctis.utep.edu/utc/tlc/">link to example</a>
                </body>
            </html>';

}
?>
