<?php

class Car {
    private $car_id;
    private $plate_no;
    private $model;
    private $year;
    private $status_id; 
    private $image;
    private $date;
    private $miles;
    private $color;
    private $price_per_day;
///////////////////
    private $office_id;
    private $office_name;
    private $status_name;

    public function __construct($car_id, $plate_no, $model, $year, $status__id, $image, $date, $miles, $color, $price_per_day) {
        $this->car_id = $car_id;
        $this->plate_no = $plate_no;
        $this->model = $model;
        $this->year = $year;
        $this->status_id = $status__id;
        $this->image = $image;
        $this->date = $date;
        $this->miles = $miles;
        $this->color = $color;
        $this->price_per_day = $price_per_day;
    }

    // Getter methods
    public function getCarId() {
        return $this->car_id;
    }

    public function getPlateNo() {
        return $this->plate_no;
    }

    public function getModel() {
        return $this->model;
    }

    public function getYear() {
        return $this->year;
    }

    public function getStatus_id() {
        return $this->status_id;
    }

    public function getImagePath() {
        return $this->image;
    }

    public function getDateEnteringSystem() {
        return $this->date;
    }

    public function getMiles() {
        return $this->miles;
    }

    public function getColor() {
        return $this->color;
    }

    public function getPricePerDay() {
        return $this->price_per_day;
    }

    // Setter methods
    public function setPlateNo($plate_no) {
        $this->plate_no = $plate_no;
    }

    public function getOfficeId() {
        return $this->office_id;
    }

    public function getOfficeName() {
        return $this->office_name;
    }

    public function getStatusName() {
        return $this->status_name;
    }
    public function setOfficeId($office_id) {
        $this->office_id = $office_id;
    }

    public function setOfficeName($office_name) {
        $this->office_name = $office_name;
    }

    public function setStatusName($status_name) {
        $this->status_name = $status_name;
    }
}
class Office {
    private $office_id;
    private $city;
    private $country;
    private $name;

    public function __construct($office_id, $city, $country, $name) {
        $this->office_id = $office_id;
        $this->city = $city;
        $this->country = $country;
        $this->name = $name;
    }

    // Getter methods
    public function getOfficeId() {
        return $this->office_id;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getName() {
        return $this->name;
    }

    // Setter methods
    public function setOfficeId($office_id) {
        $this->office_id = $office_id;
    }
    public function setCity($city) {
        $this->city = $city;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setName($name) {
        $this->name = $name;
    }
}
class Customer {
    private $customer_id;
    private $first_name;
    private $last_name;
    private $phone_num;
    private $password;
    private $wallet;

    public function __construct($customer_id, $first_name, $last_name, $phone_num, $password, $wallet) {
        $this->customer_id = $customer_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_num = $phone_num;
        $this->password = $password;
        $this->wallet = $wallet;
    }

    // Getter methods
    public function getCustomerId() {
        return $this->customer_id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getPhoneNum() {
        return $this->phone_num;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getWallet() {
        return $this->wallet;
    }

    // Setter methods
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    // Add other setter methods as needed
}

class Status_id {
    private $status_id;
    private $name;

    public function __construct($status_id, $name) {
        $this->status_id = $status_id;
        $this->name = $name;
    }

    // Getter methods
    public function getStatus_id() {
        return $this->status_id;
    }

    public function getName() {
        return $this->name;
    }

    // Setter methods
    public function setName($name) {
        $this->name = $name;
    }

    // Add other setter methods as needed
}


?>
