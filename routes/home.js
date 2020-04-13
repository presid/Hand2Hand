const {Router} = require('express');
const router = Router();
const db = require('../utils/database');
const products = require('../models/Product');
const users = require('../models/User');

router.get('/', async (req, res, next) => {
    try {
        const prod = await products.findAll({raw: true});

        // const user = await users.findAll({raw: true});

        res.render('index', {
            prod
            // user
        });
    } catch (e) {
        console.log(e);
    }
    
});



module.exports = router;