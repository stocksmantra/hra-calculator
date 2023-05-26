<!DOCTYPE html>
<html lang="en">
<head>
    <title>HRA Calculator in PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url('https://www.hdfc.com/content/dam/housingdevelopmentfinancecorp/blogImage/property_and_real_estate/reduction-gst-rate-housing/Reduction%20in%20GST%20rate%20on%20housing.jpeg');	
}
  .text{
    margin-left:12em;
    margin-top:2em;
    color:#f44336;
  }
  .form-signin {
    border-radius:7px;
  max-width: 425px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color:	#F8F8FF ;
  border: 1px solid rgba(0,0,0,0.1);}
  .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 7px;
		@include box-sizing(border-box);}
     .font{
        font-size:20px;
     }
     .button{
        background-color: #f44336; /* Green */
  border: none;
  color: white;
  padding: 8px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius:3px ;
     }   
</style>
<body>
    <h1 class="text">HRA Calculator</h1>
    <form action="" method="post" class="form-signin">
        <!-- Basic Salary -->
        <div>
            <label for="basic_salary" class="font">Basic Salary:<span class="dot" style="color:red;float:none">*</span></label>
            <input type="number" class="form-control" name="basic_salary" id="basic_salary" required>
        </div>
        <!-- HRA Percentage -->
        <div>
            <label for="hra_percentage" class="font">HRA Percentage:<span style="color:red;float:none">*</span></label>
            <input type="number" class="form-control" name="hra_percentage" id="hra_percentage" required>
        </div>
        <!-- DA Percentage -->
        <div>
            <label for="da_percentage" class="font">DA Percentage:<span style="color:red;float:none">*</span></label>
            <input type="number" class="form-control" name="da_percentage" id="da_percentage" required>
        </div><br>
        <!-- Submit Button -->
        <div>
            <input type="submit" class="button" value="Calculate HRA">
        </div>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $basic_salary = $_POST["basic_salary"];
    $hra_percentage = $_POST["hra_percentage"];
    $da_percentage = $_POST["da_percentage"];

    $hra = $basic_salary * ($hra_percentage / 100);
    $da = $basic_salary * ($da_percentage / 100);
    $gross_salary = $basic_salary + $hra + $da;

    echo "<h4>HRA: " . $hra . "<br></h4>";
    echo "<h4>DA: " . $da . "<br></h4>";
    echo "<h4>Gross Salary: " . $gross_salary;
}
?>
    </form>

</body>
</html>
