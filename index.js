const express = require('express')
const mysql = require('mysql')
const path = require('path')
const exphbs = require('express-handlebars')
const mainRoutes = require('./routes/main')

const PORT = process.env.PORT || 3000

const app = express()
const hbs = exphbs.create({
  defaultLayout: 'main',
  extname: 'hbs'
})

app.engine('hbs', hbs.engine)
app.set('view engine', 'hbs')
app.set('views', 'views')

app.use(express.static(path.join(__dirname, 'public')))

app.use(mainRoutes)

async function start() {
  try {
    const con = mysql.createConnection({
      host: "localhost",
      user: "nodejs",
      password: "admin"
    });

    con.connect(function(err) {
      if (err) throw err;
      console.log("Connected!");
    });

    app.listen(PORT, () => {
      console.log('Server has been started...')
  })

  }catch (e) {
    console.log(e)
  }
}

start()


