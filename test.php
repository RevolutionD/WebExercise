<!DOCTYPE html>
<html>
<head>
  <title>PHP Function Call Example</title>
</head>
<body>
  <form>
    <label for="input">Enter input:</label>
    <input type="text" name="input" id="input" onchange="processInput()">
    <div id="result"></div>
  </form>
  <script>
    function processInput() {
      var input = document.getElementById("input").value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("result").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "test.php?input=" + input, true);
      xhttp.send();
    }
  </script>
  <?php
  function processInput($input) {
    // Process the input and return the result
    $result = strtoupper($input); // Convert the input to uppercase
    return $result;
  }

  // Check if the input parameter exists in the URL
  if (isset($_GET['input'])) {
    // Call the processInput function and return the result
    $input = $_GET['input'];
    $result = processInput($input);
    echo "<script>document.getElementById('result').innerHTML='$result'</script>";
  }
  ?>
</body>
</html>
