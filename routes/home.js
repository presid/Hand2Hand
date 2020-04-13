const {Router} = require('express');
const router = Router();
const db = require('../utils/database');

const User = require('../models/User');
const Product = require('../models/Product');
const Category = require('../models/Category');
const SubCategory = require('../models/Subcategory');


router.get('/', async (req, res, next) => {
    try {
        const prod = await Product.findAll({include:[{model: User, required: false}, {model: Category, required: false}, {model: SubCategory, required: false}], raw: true});

        console.log(prod);
        // const user = await users.findAll({raw: true});

        res.render('index', {
            prod
            // user
        });
    } catch (e) {
        console.log(e);
    }
    
});

router.get('/users', async (req, res, next) => {
    const user = await User.findAll({include:[{model: Product, required: false}], raw: true});
    console.log(user);
    res.json(user);
});




module.exports = router;