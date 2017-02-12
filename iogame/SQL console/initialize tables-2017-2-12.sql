# 游戏条目表
create table games_item (
  game_id INT NOT NULL AUTO_INCREMENT,
  game_name VARCHAR(25) NOT NULL ,    #游戏名称
  game_link VARCHAR(40) NOT NULL,     #游戏链接
  game_description TEXT,               #游戏简介
  collected_count INT DEFAULT 0,      #游戏被收藏数
  liked_count INT DEFAULT 0,          #游戏被点赞数
  create_date DATE,                    #游戏条目创建日期
  PRIMARY KEY (game_id),
  FOREIGN KEY (game_id) REFERENCES games_collect(game_id),
  FOREIGN KEY (game_id) REFERENCES games_like(game_id)


);


#游戏收藏表,记录游戏详细被哪个用户收藏
create table games_collect(
  game_id INT NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY(game_id,user_id)
);

#游戏点赞表，记录游戏详细被哪个用户收藏
create table games_like(
  game_id INT NOT NULL ,
  user_id INT NOT NULL,
  PRIMARY KEY(game_id,user_id)
);

#用户表
create table users(
  user_id INT NOT NULL AUTO_INCREMENT,
  user_name VARCHAR(20) NOT NULL ,
  user_password VARCHAR(40) NOT NULL ,
  create_date DATE,
  PRIMARY KEY (user_id),
  FOREIGN KEY (user_id) REFERENCES games_collect(user_id),
  FOREIGN KEY (user_id) REFERENCES games_like(user_id)
);

#管理员表
create table admin(
  admin_id INT NOT NULL AUTO_INCREMENT,
  user_name VARCHAR(20) NOT NULL ,
  user_password VARCHAR(40) NOT NULL ,
  create_date DATE,
  PRIMARY KEY (admin_id)
);

#评论表
CREATE TABLE comment(
  comment_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  game_id INT NOT NULL,
  user_id INT NOT NULL,
  content TEXT,
  create_time DATETIME NOT NULL,
  PRIMARY KEY (comment_id),
  FOREIGN KEY (game_id) REFERENCES games_item(game_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
)