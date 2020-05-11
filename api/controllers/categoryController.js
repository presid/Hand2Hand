const Product = require('../models/Product');
const Category = require('../models/Category');
const User = require('../models/User');
const {Op} = require('sequelize');

const session = require('express-session');
const cookieParser = require('cookie-parser');


exports.getCategory = async (req, res) => {
    try {
        redirectTo = req.protocol + '://' + req.get('host') + req.originalUrl;

        userLogged = req.userLogged;
        let categoryName = req.params.categoryName;

        let user = req.session.user ? req.session.user : null;
        
        const ids = await Category.findOne({
            where: {
                name: req.params.categoryName
            },
            attributes: ['id']
            
        });

        if (ids == null) {res.sendStatus(404);}

        const category = await Category.findAll({ 
            where: {
                parent_id: ids.id
            }            
        });

        const data = await category.map(item => item.get({plain: true}));
        console.log('catdata:', data);
        console.log('catname:', categoryName);

        res.render('category', {
            title: 'Categories',
            data,
            categoryName,
            user,
            userLogged,
            redirectTo
        })
    } catch (err) {
        console.log(err);
    }
}