const Product = require('../models/Product');
// const Category = require('../models/Category');

const session = require('express-session');
const cookieParser = require('cookie-parser');

exports.getProduct = async (req, res, next) => {
    try {
        redirectTo = req.protocol + '://' + req.get('host') + req.originalUrl;
        userLogged = req.userLogged;
        let product = null;
        let user = req.session.user ? req.session.user : null;

        product = await Product.findOne({
            where: {id: req.params.productId}
        });

        console.log('product: ', product);
        if(product == null) {return res.sendStatus(404);}
        
        res.render('product', {
            title: 'product',
            product,
            user,
            userLogged,
            redirectTo
        });
    } catch (err) {
        console.log(err);
        
    }
    
};