const Product = require('../models/Product');
const Category = require('../models/Category');
const {Op} = require('sequelize');

exports.getCategory = async (req, res) => {
    try {
        let categoryName = req.params.categoryName;
        
        const ids = await Category.findOne({
            where: {
                name: req.params.categoryName
            },
            attributes: ['id']
            
        });

        // console.log(ids.get({plain: true}));

        const category = await Category.findAll({ 
            where: {
                parent_id: ids.id
            }            
        });

        // console.log(req.params);
        const data = await category.map(item => item.get({plain: true}));
        console.log('catdata:', data);
        console.log('catname:', categoryName);

        res.render('category', {
            title: 'Categories',
            data,
            categoryName
        })
    } catch (err) {
        console.log(err);
    }
}