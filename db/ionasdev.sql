CREATE TABLE POSTS(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title nvarchar(255) NOT NULL,
  lang INTEGER NOT NULL DEFAULT 0,
  postedon datetime NOT NULL,
  edited datetime,
  tags nvarchar(255),
  body text,
  pub boolean NOT NULL DEFAULT 0
);
CREATE TABLE COMMENTS(
  parentpost INTEGER NOT NULL,
  time DATETIME NOT NULL,
  name nvarchar(16) NOT NULL,
  email nvarchar(32),
  comment nvarchar(512) NOT NULL,
  hash nvarchar(16) NOT NULL
);
