CREATE DATABASE CARRENTAL;
GO

create table if not exists cars
(
    car_id               int auto_increment
        primary key,
    car_name             varchar(50)              not null,
    car_nameplate        varchar(50)              not null,
    car_img              varchar(50) default 'NA' null,
    ac_price             float                    not null,
    non_ac_price         float                    not null,
    ac_price_per_day     float                    not null,
    non_ac_price_per_day float                    not null,
    car_availability     varchar(10)              not null,
    constraint car_nameplate
        unique (car_nameplate)
)
    charset = utf8mb3
    auto_increment = 15;

create table if not exists clients
(
    client_username varchar(50)                             not null,
    client_name     varchar(50)                             not null,
    client_phone    varchar(15)                             not null,
    client_email    varchar(25)                             not null,
    client_address  varchar(50) collate utf8mb3_estonian_ci not null,
    client_password varchar(20)                             not null,
    primary key (client_username)
)
    charset = utf8mb3;

create table if not exists clientcars
(
    car_id          int         not null,
    client_username varchar(50) not null,
    primary key (car_id),
    constraint clientcars_ibfk_1
        foreign key (client_username) references clients (client_username),
    constraint clientcars_ibfk_2
        foreign key (car_id) references cars (car_id)
)
    charset = utf8mb3;

create index client_username
    on clientcars (client_username);

create table if not exists customers
(
    customer_username varchar(50) not null,
    customer_name     varchar(50) not null,
    customer_phone    varchar(15) not null,
    customer_email    varchar(25) not null,
    customer_address  varchar(50) not null,
    customer_password varchar(20) not null,
    primary key (customer_username)
)
    charset = utf8mb3;

create table if not exists driver
(
    driver_id           int auto_increment
        primary key,
    driver_name         varchar(50) not null,
    dl_number           varchar(50) not null,
    driver_phone        varchar(15) not null,
    driver_address      varchar(50) not null,
    driver_gender       varchar(10) not null,
    client_username     varchar(50) not null,
    driver_availability varchar(10) not null,
    constraint dl_number
        unique (dl_number),
    constraint driver_ibfk_1
        foreign key (client_username) references clients (client_username)
)
    charset = utf8mb3
    auto_increment = 9;

create index client_username
    on driver (client_username);

create table if not exists rentedcars
(
    id                int auto_increment
        primary key,
    customer_username varchar(50)                not null,
    car_id            int                        not null,
    driver_id         int                        not null,
    booking_date      date                       not null,
    rent_start_date   date                       not null,
    rent_end_date     date                       not null,
    car_return_date   date                       null,
    fare              double                     not null,
    charge_type       varchar(25) default 'days' not null,
    distance          double                     null,
    no_of_days        int                        null,
    total_amount      double                     null,
    return_status     varchar(10)                not null,
    constraint rentedcars_ibfk_1
        foreign key (customer_username) references customers (customer_username),
    constraint rentedcars_ibfk_2
        foreign key (car_id) references cars (car_id),
    constraint rentedcars_ibfk_3
        foreign key (driver_id) references driver (driver_id)
)
    charset = utf8mb3
    auto_increment = 574681260;

create index car_id
    on rentedcars (car_id);

create index customer_username
    on rentedcars (customer_username);

create index driver_id
    on rentedcars (driver_id);
    //Test
