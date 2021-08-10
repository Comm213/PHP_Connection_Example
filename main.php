<?php

include('connection.php');
$idcom = connection('final');
$name = $lastname = $age = $phone = $mail = $address = $ville = "";
$ename = $elastname = $eage = $ephone = $email = $eaddress = $eville =true;
$errorname = $errorlastname = $errorage = $errorphone = $errormail = $erroraddress = $errorville = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["name"])) {
        $ename =false;
        $errorname = "Required";
    }else{
        $name =trim($_POST["name"]);

if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $ename =false;
            $errorname = "Invalid name";
        }
    }
if(empty($_POST["lastname"])) {
        $elastname =false;
        $errorlastname = "Required";
    }else{
        $lastname =trim($_POST["lastname"]);

if(!preg_match("/^[a-zA-Z ]+$/", $lastname)) {
            $elastname =false;
            $errorlastname = "Invalid Last Name";
        }
    }
if(empty($_POST["age"])) {
        $eage =false;
        $errorage = " Required ";
    }else{
        $age =trim($_POST["age"]);
if(!preg_match("/^[1-9][0-9]+$/", $age)) {
            $eage =false;
            $errorage = "Invalid age";
        }
    }
if(empty($_POST["phone"])) {
        $ephone =false;
        $errorphone = "Required";
    }else{
        $phone =trim($_POST["phone"]);
if(!preg_match("/^[1-9][0-9]+$/", $phone)) {
            $ephone =false;
            $errorphone = "Invalid phone number";
        }
    }
if(empty($_POST["mail"])) {
        $email =false;
        $errormail = "Required";
    }else{
        $mail =trim($_POST["mail"]);
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $email =false;
            $errormail = "Invalid mail";
        }
    }
if(empty($_POST["address"])) {
        $eaddress =false;
        $erroraddress = "Required";
    }else{
        $address =trim($_POST["address"]);
if(!preg_match("/^[a-zA-Z]+$/", $address)) {
            $eaddress =false;
            $erroraddress = "Invalid address";
        }
    }

if(isset($_POST['sss'])) {


if($ename && $elastname && $email && $eage)// if all are true
{
            $sql = "select * from employee where mail='" . $mail . "'";
            $re =mysqli_query($idcom, $sql);

if(mysqli_num_rows($re) > 0) {
echo"<script language=\"JavaScript\">";
echo"alert('The mail exist')";
echo"</script>";
            }else{
                $ville = $_POST['ville'];
                $address = $_POST['address'];

                $qu = "INSERT INTO  final.employee(name,lastname,age,phone,address,ville,mail)values('$name','$lastname','$age','$phone','$address','$ville','$mail')";
                $resu =mysqli_query($idcom, $qu);

if(!$resu) {
echo"<h2> Insertion Error \n n?",mysqli_connect_errno() . "</h2>";
                }
            }
        }
        $file =fopen("login-form.txt", "a");

fwrite($file, "Name: ");
fwrite($file, $name . "\n");
fwrite($file, "Last Name: ");
fwrite($file, $lastname . "\n");
fwrite($file, "Phone: ");
fwrite($file, $phone . "\n");
fwrite($file, "Age: ");
fwrite($file, $age . "\n");
fwrite($file, "Address: ");
fwrite($file, $address . "\n");
fwrite($file, "Mail: ");
fwrite($file, $mail . "\n");
fwrite($file, "Ville: ");
fwrite($file, $ville . "\n");
    }
}
?>

<!DOCTYPEhtmlPUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<htmlxmlns="http://www.w3.org/1999/xhtml"xml:lang="fr">

<head>
    <metahttp-equiv="Content-Type"content="text/html"charset="x-iso-8859-11">
</head>
<title>ALL</title>

<body>
<formaction="<?php echo$_SERVER['PHP_SELF'];?>"method="post">

    <h3style="background-color: chartreuse; box-shadow: gray; text-align: center; border-radius: 15px 15px 15px 15px;">
        Welcome To Me</h3>

    <fieldset>
        <legend><b> Your Informations</legend>
        <tablestyle="margin-left:450px">
            <tr>
                <td><b>Name:</b></td>
                <td><inputtype="text"name="name"id="name"placeholder="enter your name"size="30"maxlength="30"
value="<?php echo$name;?>"
style="border-radius: 10px 10px 10px 10px"/><?php echo$errorname;?></td>
            </tr>
            <tr>
                <td><b>Last Name:</b></td>
                <td><inputtype="text"name="lastname"id="lastname"placeholder="enter last name "size="30"
maxlength="30"value="<?php echo$lastname;?>"
style="border-radius:10px 10px 10px 10px"/><?php echo$errorlastname;?></td>
            </tr>
            <tr>
                <td><b>Phone Number:</b></td>
                <td><inputtype="text"name="phone"id="phone"placeholder="your phone number"size="30"maxlength="12"
value="<?php echo$phone;?>"
style="border-radius:10px 10px 10px"/><?php echo$errorphone;?></td>
            </tr>
            <tr>
                <td><b>Age:</b></td>
                <td><inputtype="text"name="age"id="age"placeholder="your age"size="30"maxlength="2"
value="<?php echo$age;?>"
style="border-radius:10px 10px 10px"/><?php echo$errorage;?></td>
            </tr>
            <tr>
                <td><b>Address:</b></td>
                <td><inputtype="text"name="address"id="address"placeholder="your address"size="30"maxlength="30"
value="<?php echo$address;?>"
style="border-radius: 10px 10px 10px"/><?php echo$erroraddress;?></td>
            </tr>
            <tr>
                <td><b>Mail:</b></td>
                <td><inputtype="text"name="mail"id="mail"placeholder="your email"size="30"maxlength="30"
value="<?php echo$mail;?>"
style="border-radius: 10px 10px 10px 10px"/><?php echo$errormail;?></td>
            </tr>
            <tr>
                <td><b>Ville:</b></td>
                <td><selectname="ville"size="1">
<?php
$que = "select * from ville order by ville";
                        $res =mysqli_query($idcom, $que);
while($row =mysqli_fetch_assoc($res)) {
?>
<optionvalue=<?php echo"$row[ville]"?>>
<?php echo"$row[ville]";
                            }?>
</select></td>
            </tr>
            <tr>
                <td><inputtype="submit"value=" submit "name="sss"style="border-radius:10px 10px 10px 10px;"></td>
                <td><inputtype="button"value=" Clear "name="cl"style="border-radius:10px 10px 10px 10px;"
onclick="returnclearinput()"></td>
            </tr>

        </table>


        <scripttype="text/javascript">

functionclearinput() {
                document.getElementById("name").value =null;
                document.getElementById("lastname").value =null;
                document.getElementById("mail").value =null;
                document.getElementById("age").value =null;
                document.getElementById("address").value =null;
                document.getElementById("phone").value =null;

            }
        </script>
    </fieldset>
</form>


</body>

</html>