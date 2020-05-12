const Product = require('../models/Product');
const Category = require('../models/Category');

const session = require('express-session');
const cookieParser = require('cookie-parser');

exports.getSubcategory = async (req, res) => {
    try {
        redirectTo = req.protocol + '://' + req.get('host') + req.originalUrl;
        userLogged = req.userLogged;
        let categoryNameId = null;
        categoryName = req.params.categoryName;
        subcategoryName = req.params.subcategoryName;

        let user = req.session.user ? req.session.user : null;

        categoryNameId = await Category.findOne({
            where: { name: categoryName},
            attributes: ['id']
        });

        if(categoryNameId == null) {return res.sendStatus(404);}

        const subcatId = await Category.findOne({ 
            where: {
                name: subcategoryName,
                parent_id: categoryNameId.id
            },
            attributes: ['id']
        });

        if(subcatId == null) {return res.sendStatus(404);}

        const product = await Product.findAll({
            where: {
                CategoryId: subcatId.id
            }   
        });


        const data = product.map(item => item.get({plain: true}));
        // console.log('data: ', data);

        res.render('subcategory', {
            title: 'Subcategories',
            data,
            user,
            userLogged,
            redirectTo,
            categoryName,
            subcategoryName
        });
        
    } catch (err) {
        console.log(err);
    }
}