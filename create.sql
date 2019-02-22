create table if not exists Users (
    user_id int auto_increment,
    pseudo varchar(12) unique not null,
    password varchar(255) not null,
    location int,
    PRIMARY KEY (user_id),
    CONSTRAINT fk_user_loc FOREIGN KEY (location) REFERENCES Locations(loc_id)
)

create table if not exists Events (
    event_id int auto_increment,
    creator int not null,
    title varchar(30) not null,
    descritption text,
    date_creation date not null,
    date_event date not null,
    location int,
    PRIMARY KEY (event_id),
    CONSTRAINT fk_event_user FOREIGN KEY (creator) REFERENCES Users(user_id),
    CONSTRAINT fk_event_loc FOREIGN KEY (location) REFERENCES Locations(loc_id)
)

create table if not exists Messages (
    user_id int,
    event_id int,
    date date,
    message text,
    PRIMARY KEY (user_id, event_id, date),
    CONSTRAINT fk_message_user FOREIGN KEY (user_id) REFERENCES Users(user_id),
    CONSTRAINT fk_message_event FOREIGN KEY (event_id) REFERENCES Events(event_id)
)

create table if not exists Guests (
    user_id int,
    event_id int,
    is_going boolean not null,
    PRIMARY KEY (user_id, event_id),
    CONSTRAINT fk_guests_user FOREIGN KEY (user_id) REFERENCES Users(user_id),
    CONSTRAINT fk_guests_event FOREIGN KEY (event_id) REFERENCES Events(event_id)
)

create table if not exists Locations (
    loc_id int auto_increment,
    name varchar(255),
    latitude float not null,
    longitude float not null,
    PRIMARY KEY (loc_id)
)
