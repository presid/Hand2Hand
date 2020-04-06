const express = require('express')
const path = require('path')
const exphbs = require('express-handlebars')
const sequelize = require('./utils/database')
const mainRoute = require('./routes/main')
const signInRoute = require('./routes/signIn')

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

app.use('/', mainRoute)
app.use('/signIn', signInRoute)

async function start() {
  try {
    await sequelize.sync()
    
    app.listen(PORT, () => {
      console.log('Server has been started...')
  })

  }catch (e) {
    console.log(e)
  }
}

start()


