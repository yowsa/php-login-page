CREATE TABLE accounts (
	id char(13) NOT NULL PRIMARY KEY,
	email varchar(255) NOT NULL,
	password char(60) NOT NULL,
	name varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
	);
ALTER TABLE accounts ADD KEY(email);