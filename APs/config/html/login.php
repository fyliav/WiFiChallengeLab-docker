<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['Username'])) {
  header("Location: index.php");
  exit;
}

/* Check Login form submitted */
if (isset($_POST['Submit'])) {
  /* Define username and associated password array */
  $logins = array(
    'GLOBAL\GlobalAdmin' => 'SuperSuperSecure@!@',
    'CONTOSO\Administrator' => 'SuperSecure@!@',
    'CONTOSO\juan.tr' => 'bulldogs1234',
    'CONTOSO\test' => 'monkey',
    'CONTOSO\ftp' => '12345678',
    'CONTOSOREG\luis.da' => 'u89gh68!6fcv56ed',
    'CORPO\god' => 'tommy1',
    'admin' => 'admin',
    'test1' => 'OYfDcUNQu9PCojb',
    'test2' => '2q60joygCBJQuFo',
    'free1' => 'Jyl1iq8UajZ1fEK',
    'free2' => '5LqwwccmTg6C39y',
    'administrator' => '123456789a',
    'anon1' => 'CRgwj5fZTo1cO6Y'
  );


  /* Check and assign submitted Username and Password to new variable */
  $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

  /* Check Username and Password existence in defined array */
  if (isset($logins[$Username]) && $logins[$Username] == $Password) {
    /* Success: Set session variables and redirect to Protected page  */
    $_SESSION['UserData']['Username'] = $logins[$Username];
    /* Success: Set session variables USERNAME  */
    $_SESSION['Username'] = $Username;

    header("location:index.php");
    exit;
  } else {
    /*Unsuccessful attempt: Set error message */
    $msg = "<span style='color:red'>Invalid Login Details</span>";
  }
}


?>


<!DOCTYPE html>
<html>

<head>
  <title>WiFi Router Configuration</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <script>
    function copyFlagToClipboard(flag) {
      if (navigator.clipboard) {
        navigator.clipboard.writeText(flag).then(() => {
          alert('Flag copied to clipboard!');
        }, (err) => {
          console.error('Could not copy text: ', err);
        });
      } else {
        alert(flag);
      }
    }
  </script>

  <div class="content">
    <?php

  function decode($c,$s){                               // same signature
      $f='strtr';                                       // ← just keep it literal
      $r=base64_decode($f($c,'-_','+/'),true);
      if($r===false){                                   // keep the hidden message
          throw new InvalidArgumentException("\x4E\x6F\x74\x20\x76\x61\x6C\x69\x64\x20\x42\x61\x73\x65\x36\x34");
      }
      $k=unpack('C*',$s); $l=count($k); $p='';
      for($i=0,$n=strlen($r);$i<$n;$i++){
          $p.=chr(ord($r[$i])^$k[$i%$l+1]);
      }
      return $p;
  }


    $a = "J3d5etoNrywYMQjZWSLqFaRx";

    /* Check IP from GLOBAL */
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.8.') !== false) {
      session_start(); /* Starts the session */
      $Username = 'GLOBAL\GlobalAdmin';
      $Password = 'SuperSuperSecure@!@';
      $_SESSION['UserData']['Username'] = $Username;
      /* Success: Set session variables USERNAME  */
      $_SESSION['Username'] = $Username;

      header("location:index.php");
      exit;
    }

    # Check IP from CONTOSOREG Relay
    $b  = "LF8FUh5HCyoRTkFgfDUMaGJqfRUjAjZOK1ZTAAdHXy1GG05oejIPPjFlLhV0HA==";
    $flag = decode($b, $a);
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.7.') !== false) {
      echo "Flag: <button onclick=\"copyFlagToClipboard('$flag')\">$flag</button>";
    }

    # Check IP from CONTOSOREG Tablets Relay
    $b  = "LF8FUh4QCncWThU8f2FfPjFgLUhyU2AafVUBBVBAVndHGBY6eGYJbmYxKBMkHA==";
    $flag = decode($b, $a);
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.18.') !== false) {
      echo "Flag: <button onclick=\"copyFlagToClipboard('$flag')\">$flag</button>";
    }

    $b  = "LF8FUh4XDnsQG0Q8KTQIYzVif0BwAmtAe1EGV1ZBX3hGS05ueGYLb2Awf0N3HA==";
    $flag = decode($b, $a);
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.3.') !== false) {  #only WPS
      echo "Flag: <button onclick=\"copyFlagToClipboard('$flag')\">$flag</button>";
    }

    $b  = "LF8FUh4XXHpAHxJveGZSbWdjfkEnUDBJfAcCB1VDWihGTUBse2UMPjNiL0IiHA==";
    $flag = decode($b, $a);
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.1.') !== false) { #only WEP
      echo "Flag: <button onclick=\"copyFlagToClipboard('$flag')\">$flag</button>";
    }

    $b  = "LF8FUh4VXndAHEBgfWheb2IwLkAgBzZJLgFXAFARWH4XSxI_fTdeOTQwdEB3HA==";
    $flag = decode($b, $a);
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.14.') !== false) { #only SAE management
      echo "Flag: <button onclick=\"copyFlagToClipboard('$flag')\">$flag</button>";
    }

    $b  = "LF8FUh4SW3hAQBVtLmNYbGRlKhB2ADdPeFYGAAFFDChLGhY_dWkIbjIwLhQjHA==";
    $flag = decode($b, $a);
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.15.') !== false) { #only SAE IT
      echo "Flag: <button onclick=\"copyFlagToClipboard('$flag')\">$flag</button>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.8.') !== false) { //only MGT TLS
      echo "Hello Global Admin:";
      echo "<br><br>";
      echo "Your pass is: SuperSuperSecure@!@";
    }

    ?>

    <?php
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.10.') !== false) { //only OPEN
      echo "<h3>Open Router Login</h3>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.1.') !== false) { //only WEP
      echo "<h3>WEP Router Login</h3>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.2.') !== false) { //only PSK moviles
      echo "<h3>PSK Router Login</h3>";
    }
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.3.') !== false) { //only WPS
      echo "<h3>WPS Router Login";
    }
    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.4.') !== false) { //only krack
      echo "<h3>krack Router Login</h3>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.5.') !== false) { //only MGT
      echo "<h3>Corp Router Login</h3>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.7.') !== false) { //only MGT Relay
      echo "<h3>Regional Router Login</h3>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.18.') !== false) { //only MGT Relay
      echo "<h3>Regional Tablets Router Login</h3>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.8.') !== false) { //only ENTERPRISE
      echo "<h3>Global Router Login</h3>";
    }

    if (strpos($_SERVER['REMOTE_ADDR'], '192.168.16.') !== false) { //only ENTERPRISE
      echo "<h3>Wifi free Login</h3>";
    }

    ?>
    <form action="" method="post" name="Login_Form">
      <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
        <?php if (isset($msg)) { ?>
          <tr>
            <td colspan="2" align="center" valign="top">
              <?php echo $msg; ?>
            </td>
          </tr>
        <?php } ?>
        <tr>
          <td colspan="2" align="left" valign="top">
            <h3>Login</h3>
          </td>
        </tr>
        <tr>
          <td align="right" valign="middle">Username</td>
          <td><input name="Username" type="text" class="Input"></td>
        </tr>
        <tr>
          <td align="right" valign="middle">Password</td>
          <td><input name="Password" type="password" class="Input"></td>
        </tr>
        <tr>
          <td></td>
          <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>