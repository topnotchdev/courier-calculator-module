
## About Courier Calculator Module

This codebase is a Laravel v12 project that has some namespace modifications to modularise the codebase a little bit. 

The Courier Calculator is one of those modules and is located in `[project_root]/modules/`

## Tests

The main test can be found in `tests/modules/Unit/DeliveryJobTest.php` and basically shows the module can be used to calculate a delivery job.

## API Endpoints

A few endpoints have been defined in `modules/CourierServiceCalculator/routes/api.php` which expose 'create' functionality for DeliveryJob's and to 'calculate' a DeliveryJob

## Improvements

As this was time constrained at 2 hours (took a little over 3 for me) it is very simple and a number shortcuts have been taken. Given more time the following things would be done:

* Implement all remaining endpoints
* Utilise custom request classes to handle validation and request params etc
* Document the API (Swagger / RAML)
* Add more tests
* Security considerations
