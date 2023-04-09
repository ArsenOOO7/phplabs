<?php
require "../config.php";
?>

<form action="survey.php" method="post">

    <fieldset>
        <legend>Select language:</legend>
        <p>
            <input type="radio" name="language" id="php" value="PHP">
            <label for="php">PHP</label>
        </p>
        <p>
            <input type="radio" name="language" id="java" value="Java">
            <label for="java">Java</label>
        </p>
        <p>
            <input type="radio" name="language" id="nodejs" value="NodeJS">
            <label for="nodejs">NodeJS</label>
        </p>
        <p>
            <input type="radio" name="language" id="ruby" value="Ruby">
            <label for="ruby">Ruby</label>
        </p>
    </fieldset>

    <fieldset>
        <legend>Select fruit:</legend>
        <p>
            <input type="checkbox" name="fruit[]" id="avocado" value="Avocado">
            <label for="avocado">Avocado</label>
        </p>
        <p>
            <input type="checkbox" name="fruit[]" id="apple" value="Apple">
            <label for="apple">Apple</label>
        </p>
        <p>
            <input type="checkbox" name="fruit[]" id="blackberry" value="Blackberry">
            <label for="blackberry">Blackberry</label>
        </p>
        <p>
            <input type="checkbox" name="fruit[]" id="cherry" value="Cherry">
            <label for="cherry">Cherry</label>
        </p>
    </fieldset>

    <p> Select day: </p>
    <p>
        <select name="day_s" size=1>
            <option value=0 selected> Sunday </option>
            <option value=1> Monday </option>
            <option value=2> Tuesday </option>
            <option value=3> Wednesday </option>
            <option value=4> Thursday </option>
            <option value=5> Friday </option>
            <option value=6> Saturday </option>
        </select>
    </p>
    <p> Select days: </p>
    <p>
        <select name="day_m[]" size=7 multiple>
            <option value=0 selected> Sunday </option>
            <option value=1> Monday </option>
            <option value=2> Tuesday </option>
            <option value=3> Wednesday </option>
            <option value=4> Thursday </option>
            <option value=5> Friday </option>
            <option value=6> Saturday </option>
        </select>
    </p>

    <input type="submit">

</form>
