const express = require('express');
const path = require('path');
const exphbs = require('express-handlebars');
const db = require('./utils/database');
const homeRoute = require('./api/routes/homeRoute');
const categoryRoute = require('./api/routes/categoryRoute');
const subCategoryRoute = require('./api/routes/subcategoryRoute');


const PORT = process.env.PORT || 3000;

const app = express();
const hbs = exphbs.create({
  defaultLayout: 'main',
  extname: 'hbs'
});

app.engine('hbs', hbs.engine);
app.set('view engine', 'hbs');
app.set('views', 'views');

app.use(express.static(path.join(__dirname, 'public')));

app.use('/', homeRoute);
app.use('/', categoryRoute);
app.use('/', subCategoryRoute);

async function start() {
  try {
    // await db.sync({force: true});
    // await db.sync();
    
    app.listen(PORT, () => {
      console.log('Server has been started...');
  })

  }catch (e) {
    console.log(e);
  }
}

start();

