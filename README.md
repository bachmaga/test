Test
========================

I didn't use the database, because source of data was from json file and I decided what I haven't necessity in database.
Anyway we can use any a source of data, just need to change an argument in the source manager.
--------------

1) to change the data source we can will create a new service implements request service interface, then we can use it in action of the controller or inject in source manager.
2) to change library for chart we can will create new php file in view folder and index.php (replace chart.php)