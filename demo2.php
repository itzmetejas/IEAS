<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Number Input Restriction</title>
</head>
<body>

<label for="numberInput">Enter a number between 1 and 2:</label>
<input type="number" id="numberInput" min="1" max="2">

<script>
document.getElementById("numberInput").addEventListener("input", function() {
    var min = parseInt(this.getAttribute("min"));
    var max = parseInt(this.getAttribute("max"));
    var value = parseInt(this.value);

    // If the entered value is less than the min, set it to min
    if (value < min || isNaN(value)) {
        this.value = min;
    }
    // If the entered value is greater than the max, set it to max
    else if (value > max) {
        this.value = max;
    }
});
</script>

</body>
</html>
