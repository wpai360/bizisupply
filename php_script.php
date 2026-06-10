// Form
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<input type="text" name="postcode" value="<?php echo $_GET['postcode']; ?>" maxlength="5"/><br />
<input type="text" name="radius" value="<?php echo $_GET['radius']; ?>" maxlength="5"/><br />
<input type="submit" name="Search" value="Search" />
</form>

// PHP-Code
// This script is based on kilometer. If you use miles simply convert the radius to kilometer (radius=radius*1.609344)
// 'Name of database-table: 'au'. Please change if you use other tablename.
<?php
if(isset($_GET['Search']))
{
    $postcode = $_GET['postcode'];
    $radius = $_GET['radius'];

    $conn = mysqli_connect('127.0.0.1', 'root', '') or die('db connect error: ' . mysqli_error());
   mysqli_select_db($conn, 'hawki') or die('could not select database');

    $sqlstring = "SELECT * FROM au WHERE postcode = '".$postcode."'";
    $result = mysqli_query($conn,$sqlstring);


    $row = mysqli_fetch_assoc($result);

    $lng = $row["longitude"] / 180 * M_PI;
    $lat = $row["latitude"] / 180 * M_PI;

    mysqli_free_result($result);

    $sqlstring2 = "SELECT DISTINCT au.postcode,au.locality,(6367.41*SQRT(2*(1-cos(RADIANS(au.latitude))*cos(".$lat.")*(sin(RADIANS(au.longitude))*sin(".$lng.")+cos(RADIANS(au.longitude))*cos(".$lng."))-sin(RADIANS(au.latitude))* sin(".$lat.")))) AS Distance FROM au AS au WHERE (6367.41*SQRT(2*(1-cos(RADIANS(au.latitude))*cos(".$lat.")*(sin(RADIANS(au.longitude))*sin(".$lng.")+cos(RADIANS(au.longitude))*cos(".$lng."))-sin(RADIANS(au.latitude))*sin(".$lat."))) <= '".$radius."') ORDER BY Distance";

    $result = mysqli_query($conn,$sqlstring2) or die('query failed: ' . mysqli_error($conn));

    $str = "<table width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
    $str .= "<tr>";
    $str .= "<th>postcode</th>";
    $str .= "<th>town</th>";
    $str .= "<th>distance</th>";
    $str .= "</tr>";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $str .= "<tr><td>".$row["postcode"]."</td><td>".$row["locality"]."</td><td>".round($row['Distance'])."km</td></tr>";
    }

    $str .= "</table>";

    mysqli_free_result($result);
    mysqli_close($conn);
    echo $str;
}
?>