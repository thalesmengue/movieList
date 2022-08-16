<?php


include_once("connection.php");

$data = $_POST;


if (!empty($data)) {

    if ($data["type"] === "create") {

        $name = $data["name"];
        $rating = $data["rating"];
        $datewatched = $data["datewatched"];

        $query = "INSERT INTO movies (name, rating, datewatched) VALUES (:name, :rating, :datewatched)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":rating", $rating);
        $stmt->bindParam(":datewatched", $datewatched);

        try {

            $stmt->execute();

        } catch (PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } else if ($data["type"] === "edit") {

        $name = $data["name"];
        $rating = $data["rating"];
        $datewatched = $data["datewatched"];
        $id = $data["id"];

        $query = "UPDATE movies 
                SET name = :name, rating = :rating, datewatched = :datewatched 
                WHERE id = :id";

        print_r($query);
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":rating", $rating);
        $stmt->bindParam(":datewatched", $datewatched);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();

        } catch (PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } else if ($data["type"] === "delete") {

        $id = $data["id"];

        $query = "DELETE FROM movies WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();

        } catch (PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    }

    // Redirect HOME
    header("Location: ../index.php");

    // SELEÇÃO DE DADOS
} else {

    $id;

    if (!empty($_GET)) {
        $id = $_GET["id"];
    }

    // Retorna o dado de um contato
    if (!empty($id)) {

        $query = "SELECT * FROM movies WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $movie = $stmt->fetch();

    } else {

        // Retorna todos os contatos
        $movies = [];

        $query = "SELECT * FROM movies";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $movies = $stmt->fetchAll();

    }

}

// FECHAR CONEXÃO
$conn = null;