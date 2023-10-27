<?php
include "header.php";
?>
<form method="post" action="countries.php" name="myform">
    <label for='formCountry'> Виберіть країну: </label>
    <select name="formCountry">
        <option value="US">США</option>
        <option value="UK">Великобританія</option>
        <option value="France">Франція</option>
        <option value="Mexico">Мексика</option>
        <option value="Japan">Японія</option>
    </select><br>
    <label for="stars">Starts (between 1 and 5):</label>
    <input type="range" id="stars" name="stars" min="0" max="5"><br>
    <button name="formSubmit">ОК</button>
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