CREATE TABLE Users(
    userID INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(12) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(userID)
);

CREATE TABLE Products(
    productID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    picture VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    PRIMARY KEY(productID)
);

CREATE TABLE Comments(
    commentID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    date DATE,
    commentText VARCHAR(255) NOT NULL,
    productID INT NOT NULL,
    PRIMARY KEY(commentID),
    FOREIGN KEY(userID) REFERENCES Users(userID),
    FOREIGN KEY(productID) REFERENCES Products(productID)
);

CREATE TABLE Baskets(
    basketID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    PRIMARY KEY(basketID),
    FOREIGN KEY(userID) REFERENCES Users(userID)
);

CREATE TABLE basketItems(
    itemID INT NOT NULL AUTO_INCREMENT,
    basketID INT NOT NULL,
    productID INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY(itemID),
    FOREIGN KEY(basketID) REFERENCES Baskets(basketID),
    FOREIGN KEY(productID) REFERENCES Products(productID)
);

CREATE TABLE Orders(
    orderID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    orderDate DATE NOT NULL,
    orderStatus VARCHAR(255) NOT NULL,
    PRIMARY KEY(orderID),
    FOREIGN KEY(userID) REFERENCES Users(userID)
);

CREATE TABLE orderItems(
    itemID INT NOT NULL AUTO_INCREMENT,
    orderID INT NOT NULL,
    productID INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY(itemID),
    FOREIGN KEY(orderID) REFERENCES Orders(orderID),
    FOREIGN KEY(productID) REFERENCES Products(productID)
);
