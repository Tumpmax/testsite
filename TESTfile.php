<?php
//index.php
$error = '';
$name = '';
$placeholder = '';


function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string - htmlspecialchars($string);
    return $string;
}

if(isset($_POST['Submit!']))
{
  if(empty($_POST["name"]))
  {
      $error .= '<p><label class="text-danger">Please Enter your name</label></p>';
  }
  else
  {
      $name = clean_text($_POST["name"]);
      if(!preg_match("/^[a-zA-Z ])*$/",$name))
      {
          $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
      }
  }
if($error == '')
{
    $file_open = fopen("contact_data.csv", "a");
    $no_rows = count(file("contact_data.csv"));
    if($no_rows > 1)
    {
        $no_rows = ($no_rows - 1) + 1;
    }
    $form_data = array(
          'name' => $name,

        );
    fputcsv($file_open, $form_data);
    $error = '<label class="text-success">Thank you for contacting us</label>';
    $name = '';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Test Page!</title>
    <style>
       h1 {
            color:blue;
            text-align:center;
          }
      body {
            background-color:tan;

          }
      table {
            margin:auto;
            border: 2px solid black;
            width:auto;
            }
            th, td {
                border: 1px solid black;
                text-align: center;
            }

          }
    </style>
    </head>
    <body>
      <img src="C:\Users\euo88\source\testsite-master\testsite-master/Logo_100.jpg" width="300">
      <br>
      <a href="C:\Users\euo88\source\\testsite-master\testsite-master/contact_us.htm">Contact</a>
      <h1>Elevation Cleaning Services</h1>
      <table>
        <tr>
          <th>Cleaning</th>
          <th>Pricing</th>
        </tr>
          <td>Residential</td>
          <td>$30/hr</td>
        <tr>
          <td>Commercial</td>
          <td>$60/hr</td>
        </tr>
      </table>
      <h1>Please submit your Information</h1>
      <form method="post" style=text-align: center
        action="<?php echo $PHP_SELF;?>">
      <?php echo $error;?>">
        <input type="text" placeholder="Full Name" name="name"
        value = <?php echo $name; ?>
        <button>Submit!</button>
        </form>
    </body>
  </html>
