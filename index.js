const express = require('express')

const PORT = process.env.PORT || 3000

const app = express()

app.listen(PORT, () => {
    console.log('Server has been started...')
})

var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "yourusername",
  password: "yourpassword"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});