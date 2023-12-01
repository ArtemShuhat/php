<?php
include "header.php";
?>
<div class="col-sm-4">
    <form method="post" action="countries.php" name="myform">
        <label for='formCountry'> Виберіть країну: </label>
        <select name="formCountry" class="form-select">
            <option value="US">США</option>
            <option value="UK">Великобританія</option>
            <option value="France">Франція</option>
            <option value="Mexico">Мексика</option>
            <option value="Japan">Японія</option>
        </select><br>
        <!-- <label for="price" class="form-label">Price (between 100 and 5000):</label>
        <input type="range" id="price" name="price" min="100" max="5000" class="form-range"
            oninput="outputRange.value = this.value">
        <output id="outputRange" name="outputRange" for="price"></output> -->
        <label for="price"> Choose price:</label><br>
        <input type="range" id="price" name="price" min="100" max="10000" step="50"
            oninput="outputRange.value = this.value">
        <output id="outputRange" name="outputRange" for="price">5000</output>
        <br>
        <label for="transport">
            Choose your transport:</label>
        <select class="transport-select" name="transport">
            <option value="airplane">Airplane</option>
            <option value="bus">Bus</option>
            <option value="train">Train</option>
        </select>
        <br>
        <label for=" stars" class="form-label">Starts (between 1 and 5):</label>
        <input type="number" id="stars" name="stars" class="form-control" min="1" max="5" value="3">
        <br>
        <button name=" formSubmit" class="btn btn-primary">ОК</button>
    </form>

</div>
<div class="row  mt-5">
    <div class="col-sm-4">
        <h3>Column 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
        <h3>Column 2</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
        <h3>Column 3</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>

    <?php
include "footer.php";
?>