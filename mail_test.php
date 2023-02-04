<?php
// Multiple recipients
$to = 'gidolia3@gmail.com'; // note the comma

// Subject
$subject = 'Windson Group Login Detail';

// Message
$message = '
<html>
<head>
  <title>Windson Group</title>
</head>
<body>
  <p>Welcome To Windson Group</p>
  <table>
    <tr>
      <th>Your Login ID</th><th>Day</th>
    </tr>
    <tr>
      <td>Your Login Password</td><td>10th</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';



// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
?>