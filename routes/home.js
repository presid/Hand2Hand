const {Router} = require('express');
const router = Router();
const Sequelize = require('sequelize');
const db = require('../utils/database');

const User = require('../models/User');
const Product = require('../models/Product');
const Category = require('../models/Category');
const Options = require('../models/Options');


router.get('/', async (req, res, next) => {
    try {
        await Product.findAll({
            include:[
                {model: User, required: false},
                {model: Category, required: false}
            ], raw: true})
            .then(prods => {
                // res.json(prods);
                res.render('index', {
                    title: 'main page',
                    product_name: prods[0].product_name,
                    image: prods[0].image,
                    price: prods[0].price
                });
                console.log(prods);
            });

        // console.log(prods);
        // const user = await users.findAll({raw: true});

        // res.render('index', {
        //     title: 'main page',
        //     product_name: prod[0].product_name,
        //     image: prod[0].image,
        //     price: prod[0].price
        //     // user
        // });
    } catch (e) {
        console.log(e);
    }
    
});

router.post('/', async (req, res) => {
    try {
        let user1 = await User.create({
            user_name: 'John',
            user_lastname: 'Wick',
            email: 'jowi@mail.com',
            state: 'LA',
            city: 'NY', 
            phone: '998811',
            reg_date: '2020-04-14 00:00:00.000',
            image: '/images/users_prof_pic/johnwick.jpg'
        });

        let category1 = await Category.create({
            name: 'Computers',
            parent_id: 0
        });

        let options = await Options.create({
            name: 'RAM'
        });

        let product1 = await Product.create({
            product_name: 'Asus zenbook',
            price: 2536,
            description: 'new asus',
            image: '/images/computers/asus.jpg',
            date: '2020-04-14 00:00:00.000',
            UserId: 1,
            CategoryId: 1
        });     
       

        res.sendStatus(200);

    } catch (err) {
        console.log(err);
    };
});

router.get('/users', async (req, res, next) => {
    const user = await User.findAll({include:[{model: Product, required: false}], raw: true});
    console.log(user);
    res.json(user);
});




module.exports = router;