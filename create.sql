<<<<<<< HEAD
create table if not exists locations (
=======
create table if not exists Locations (
>>>>>>> 18161577e68433d1295ebb7e05070f04c8f9728d
    loc_id int auto_increment,
    name varchar(255),
    latitude float not null,
    longitude float not null,
    PRIMARY KEY (loc_id)
);

<<<<<<< HEAD
create table if not exists users (
=======
create table if not exists Users (
>>>>>>> 18161577e68433d1295ebb7e05070f04c8f9728d
    user_id int auto_increment,
    pseudo varchar(12) unique not null,
    password varchar(255) not null,
    location int,
    PRIMARY KEY (user_id),
    CONSTRAINT fk_user_loc FOREIGN KEY (location) REFERENCES Locations(loc_id)
);

<<<<<<< HEAD
create table if not exists events (
=======
create table if not exists Events (
>>>>>>> 18161577e68433d1295ebb7e05070f04c8f9728d
    event_id int auto_increment,
    creator int not null,
    title varchar(30) not null,
    description text,
    date_creation date not null,
    date_event date not null,
    location int,
    PRIMARY KEY (event_id),
    CONSTRAINT fk_event_user FOREIGN KEY (creator) REFERENCES Users(user_id),
    CONSTRAINT fk_event_loc FOREIGN KEY (location) REFERENCES Locations(loc_id)
);

<<<<<<< HEAD
create table if not exists messages (
=======
create table if not exists Messages (
>>>>>>> 18161577e68433d1295ebb7e05070f04c8f9728d
    user_id int,
    event_id int,
    date date,
    message text,
    PRIMARY KEY (user_id, event_id, date),
    CONSTRAINT fk_message_user FOREIGN KEY (user_id) REFERENCES Users(user_id),
    CONSTRAINT fk_message_event FOREIGN KEY (event_id) REFERENCES Events(event_id)
);

<<<<<<< HEAD
create table if not exists guests (
=======
create table if not exists Guests (
>>>>>>> 18161577e68433d1295ebb7e05070f04c8f9728d
    user_id int,
    event_id int,
    is_going boolean not null,
    PRIMARY KEY (user_id, event_id),
    CONSTRAINT fk_guests_user FOREIGN KEY (user_id) REFERENCES Users(user_id),
    CONSTRAINT fk_guests_event FOREIGN KEY (event_id) REFERENCES Events(event_id)
);