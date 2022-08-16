<?php
include_once('config/process.php');
include_once('templates/header.php');
include_once('config/edit.php');
?>

    <div class="navbar-text">
        <h2>my movie list</h2>
    </div>
    <form method="post" action="config/process.php">
        <div class="container container-border">
            <h1 id="center-title">register</h1>
            <input type="hidden" name="type" value="create">
            <label for="name"><b>name</b></label>
            <input type="text" placeholder="movie name" name="name" id="name" required>

            <label for="rating"><b>rating</b></label>
            <input type="number" placeholder="movie rating" name="rating" id="rating" min="1" max="10" vrequired>

            <label for="datewatched"><b>when i watched</b></label>
            <input type="date" placeholder="when i watched the movie" name="datewatched" id="datewatched" required>
            <button type="submit" class="registerbtn">save</button>
        </div>
    </form>
    </div>
    <div class="padding-movies inline-movies">
        <?php foreach ($movies as $movie): ?>
            <div class="movie-container">
                <div class="inline-text">
                    <h3>Name:</h3>
                    <p class="p-color"><?= $movie["name"] ?></p>
                </div>
                <div class="inline-text">
                    <h3>Rating:</h3>
                    <p class="p-color"><?= $movie["rating"] ?></p>
                </div>
                <div class="inline-text">
                    <h3>Date:</h3>
                    <p class="p-color"><?= $movie["datewatched"] ?></p>
                </div>
                <div>
                    <a href="edit.php?id=<?= $movie["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                    <form class="delete-form" action="config/process.php" method="post">
                        <input type="hidden" name="type" value="delete">
                        <input type="hidden" name="id" value="<?= $movie["id"] ?>">
                        <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php
include_once('templates/footer.php');
?>