<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

//var_dump($hotels);

//stampo le info degli hotel (per ogni hotel stampo il suo nome, descrizione, se ha parcheggio, il voto e la distanza dal centro)
/* foreach($hotels as $hotel){
        echo $hotel["name"] . "<br>" . $hotel["description"] . "<br>" . ($hotel["parking"] == 'true' ? "yes" : "no") . "<br>" . $hotel["vote"] . "/5" . "<br>" . $hotel["distance_to_center"] . "<br>" . "<br>";
    } */

//recupero il dato col filtro scelto dall'utente
$userParkingChoice = $_GET["parking_filter"];
//var_dump($userParkingChoice);

//mi serve un nuovo array da mostrare coi risultati filtrati
$filtered_hotels = [];

//devo controllare se l'utente ha scelto qualcosa
//se l'utente ha scelto, controllo: se l'utente ha scelto l'opzione con "parking", allora vuole l'hotel col parcheggio (true), altrimenti false
//per ogni hotel se hasParking corrisponde con il valore della key parking di hotel, allora aggiungi l'hotel all'array filtered_hotels
//alla fine dell'if, riassegno filtered_hotels a hotel così il render in pagina si adatta 
if (!empty($userParkingChoice)) {
    $hasParking = $userParkingChoice === 'parking' ? true : false;
    foreach ($hotels as $hotel) {
        if ($hasParking === $hotel["parking"]) {
            $filtered_hotels[] = $hotel;
        }
    };
    $hotels = $filtered_hotels;
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-Hotel</title>

    <!-- bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <header>
        <h1 class="text-center m-3">Hotel</h1>
    </header>


    <main>
        <div class="container">

            <!-- parking filter -->
            <form action="" method="get" class="my-5">
                <select class="form-select" id="parking_filter" name="parking_filter">
                    <option selected value="">Select parking filter</option>
                    <option value="parking">Parking</option>
                    <option value="no-parking">No-parking</option>
                </select>
                <button type="submit" class="btn btn-primary w-100">Filtra</button>
            </form>

            <!-- table -->
            <table class="table table-hover">
                <thead>
                    <tr class="table-info">
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to center</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($hotels as $hotel) : ?>
                        <tr>
                            <td scope="row" class="table-warning fw-bold"><?php echo $hotel["name"]; ?></td>
                            <td><?php echo $hotel["description"]; ?></td>
                            <td><?php echo $hotel["parking"] ? "there's parking" : "no parking"; ?></td>
                            <td><?php echo $hotel["vote"] . "/5" ?></td>
                            <td><?php echo $hotel["distance_to_center"] . "km"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>

    </main>

    <!-- script bs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>