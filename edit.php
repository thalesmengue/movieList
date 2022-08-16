<?php
include_once("config/process.php");
include_once("templates/header.php");
?>

    <div>
        <div class="navbar-text">
            <h2>my movie list</h2>
        </div>
    </div>
    <form method="post" action="config/process.php">
        <div class="edit-container container-border">
            <h1 id="center-title">edit movie</h1>
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $movie["id"] ?>"
            <label for="name"><b>name</b></label>
            <input type="text" placeholder="movie name" name="name" id="name" value="<?= $movie["name"] ?>" required>

            <label for="rating"><b>rating</b></label>
            <input type="number" placeholder="movie rating" name="rating" id="rating" min="1" max="10"
                   value="<?= $movie["rating"] ?>" required>

            <label for="datewatched"><b>when i watched</b></label>
            <input type="date" placeholder="when i watched the movie" name="datewatched" id="datewatched"
                   value="<?= $movie["datewatched"] ?>" required>
            <button type="submit" class="registerbtn">atualize</button>
        </div>
    </form>

<?php
include_once("templates/footer.php");
?>