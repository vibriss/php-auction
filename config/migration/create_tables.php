<?php
require_once __DIR__ . '/../../functions/utils.php';

DB::getInstance()->exec('
    CREATE TABLE IF NOT EXISTS users (
        id            int  auto_increment primary key,
        login         text,
        password_hash text
    )'
);

DB::getInstance()->exec('
    CREATE TABLE IF NOT EXISTS lots (
        id          int auto_increment primary key,
        user_id     int,
        name        text,
        description text,
        price       int,
        winner_id   int, 
        start_time  timestamp default current_timestamp,
        end_time    timestamp
    )'
);

DB::getInstance()->exec('
    CREATE TABLE IF NOT EXISTS images (
        id     int  auto_increment primary key,
        lot_id int,
        image  text
    )'
);

DB::getInstance()->exec('
    CREATE TABLE IF NOT EXISTS bids (
        id      int  auto_increment primary key,
        lot_id  int,
        bid     int,
        user_id int,
        time    timestamp default current_timestamp,
    )'
);