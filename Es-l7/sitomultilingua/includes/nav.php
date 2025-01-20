<ul class="nav nav-pills">
    <li class="nav-item">
        <a href="index.php" class="nav-link active" aria-current="page"><?=$strings['nav']['home']?></a>
    </li>
    <li class="nav-item">
        <a href="contatti.php" class="nav-link"><?=$strings['nav']['contatti']?></a>
    </li>
</ul>

<form id="langForm">
    <select name="lang">
        <option <?=selectField('it')?> value="it">Italiano</option>
        <option <?=selectField('en')?> value="en">English</option>
    </select>
</form>

