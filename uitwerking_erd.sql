CREATE TABLE users(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) UNIQUE,
	created_at DATETIME,
	updated_at DATETIME,
);

CREATE TABLE favourites(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	created_at DATETIME,
	updated_at DATETIME,
	FOREIGN KEY (user_id) REFERENCES user(id),
	FOREIGN KEY (book_id) REFERENCES book(id)
);

CREATE TABLE books(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255),
	publishing_year VARCHAR(255),
	genre VARCHAR(255),
	created_at DATETIME,
	updated_at DATETIME,
	FOREIGN KEY (author_id) REFERENCES author(id)
);

CREATE TABLE authors(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(255),
	last_name VARCHAR(255),
	created_at DATETIME,
	updated_at DATETIME
);