const {Router} = require('express')
const mysql = require('mysql')
const router = Router()
const mainModel = require('../models/main')

router.get('/', (req, res) => {

    const con = mysql.createConnection({
        host: "localhost",
        user: "nodejs",
        password: "admin",
        database: 'realdeal'
      });
  
      con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
      });

    con.query('SELECT * FROM Product', (err, rows) => {
        if(err) throw err

        console.log('Data received from Db:');
        console.log(rows);
    })

    res.render('index', {
        title: 'Main page'
    })
})

router.get('/signIn', (req, res) => {
    res.render('signIn', {
        title: 'Sign in'
    })
})

module.exports = router