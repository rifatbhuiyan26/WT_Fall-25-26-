<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
</head>
<body>

<h2>PHP Form Validation</h2>

<?php
// Initialize variables
$name = $email = $gender = $blood = "";
$dd = $mm = $yy = "";
$degree = [];

$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = "";

// Clean input function
function test_input($data) {
    return trim($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* ---------- Name Validation ---------- */
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[A-Za-z][A-Za-z.\-\s]*$/", $name)) {
            $nameErr = "Invalid name format";
        } elseif (str_word_count($name) < 2) {
            $nameErr = "Name must contain at least two words";
        }
    }

    /* ---------- Email Validation ---------- */
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }

    /* ---------- Date of Birth Validation ---------- */
    $dd = $_POST["dd"];
    $mm = $_POST["mm"];
    $yy = $_POST["yy"];

    if (empty($dd) || empty($mm) || empty($yy)) {
        $dobErr = "Date of birth is required";
    } elseif ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yy < 1953 || $yy > 1998) {
        $dobErr = "Invalid date range";
    }

    /* ---------- Gender Validation ---------- */
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST["gender"];
    }

    /* ---------- Degree Validation ---------- */
    if (empty($_POST["degree"]) || count($_POST["degree"]) < 2) {
        $degreeErr = "Select at least two degrees";
    } else {
        $degree = $_POST["degree"];
    }

    /* ---------- Blood Group Validation ---------- */
    if (empty($_POST["blood"])) {
        $bloodErr = "Blood group is required";
    } else {
        $blood = $_POST["blood"];
    }
}
?>

<form method="post">

Name: <input type="text" name="name" value="<?php echo $name; ?>">
<span><?php echo $nameErr; ?></span><br><br>

Email: <input type="text" name="email" value="<?php echo $email; ?>">
<span><?php echo $emailErr; ?></span><br><br>

Date of Birth:
<input type="number" name="dd" placeholder="DD" value="<?php echo $dd; ?>">
<input type="number" name="mm" placeholder="MM" value="<?php echo $mm; ?>">
<input type="number" name="yy" placeholder="YYYY" value="<?php echo $yy; ?>">
<span><?php echo $dobErr; ?></span><br><br>

Gender:
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Other">Other
<span><?php echo $genderErr; ?></span><br><br>

Degree:
<input type="checkbox" name="degree[]" value="SSC">SSC
<input type="checkbox" name="degree[]" value="HSC">HSC
<input type="checkbox" name="degree[]" value="BSc">BSc
<input type="checkbox" name="degree[]" value="MSc">MSc
<span><?php echo $degreeErr; ?></span><br><br>

Blood Group:
<select name="blood">
    <option value="">Select</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
</select>
<span><?php echo $bloodErr; ?></span><br><br>

<input type="submit" value="Submit">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    empty($nameErr) && empty($emailErr) && empty($dobErr) &&
    empty($genderErr) && empty($degreeErr) && empty($bloodErr)) {

    echo "<h3>Your Input:</h3>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "DOB: $dd-$mm-$yy <br>";
    echo "Gender: $gender <br>";
    echo "Degree: " . implode(", ", $degree) . "<br>";
    echo "Blood Group: $blood <br>";
}
?>

</body>
</html>