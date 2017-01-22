CREATE TABLE logs (
    `download` NUMERIC(12, 4),
    `timestamp` VARCHAR(26) CHARACTER SET utf8,
    `ping` NUMERIC(5, 3),
    `upload` NUMERIC(12, 5),
    `server_latency` NUMERIC(5, 3),
    `server_name` VARCHAR(14) CHARACTER SET utf8,
    `server_url` VARCHAR(52) CHARACTER SET utf8,
    `server_country` VARCHAR(13) CHARACTER SET utf8,
    `server_lon` NUMERIC(6, 4),
    `server_cc` VARCHAR(2) CHARACTER SET utf8,
    `server_host` VARCHAR(29) CHARACTER SET utf8,
    `server_sponsor` VARCHAR(11) CHARACTER SET utf8,
    `server_url2` VARCHAR(53) CHARACTER SET utf8,
    `server_lat` NUMERIC(6, 4),
    `server_id` INT,
    `server_d` NUMERIC(12, 10)
);
INSERT INTO logs VALUES (10881629.8368,'2017-01-22T19:45:26.594864',72.783,1974768.25134,72.783,'Minnetonka, MN','http://speedtest.usinternet.com/speedtest/upload.php','United States',-93.5031,'US','speedtest.usinternet.com:8080','US Internet','http://speedtest.usiwireless.com/speedtest/upload.php',44.9133,2917,37.1431964267);
