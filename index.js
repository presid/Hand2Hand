const express = require('express');
const path = require('path');
const exphbs = require('express-handlebars');
const db = require('./utils/database');
const homeRoute = require('./routes/home');
const signInRoute = require('./routes/signIn');

// const Product = require('./models/Product');
// const User = require('./models/User');
// const Category = require('./models/Category');
// const SubCategory = require('./models/Subcategory');



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
app.use('/signIn', signInRoute);

async function start() {
  try {
    // await db.sync({force: true});
    
    app.listen(PORT, () => {
      console.log('Server has been started...');
  })

  }catch (e) {
    console.log(e);
  }
}

start();

