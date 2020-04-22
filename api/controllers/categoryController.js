const Product = require('../models/Product');
const Category = require('../models/Category');
const {Op} = require('sequelize');

exports.getCategory = async (req, res) => {
    try {
        const category = await Category.findAll({ 
            where: {
                // name: req.params.categoryName,
                parent_id: 1
            },
            // include: [
            //     {model: Category, as: 'subCategory', required: false}
            // ]
        });

        // const subcategory = await Category.findAll({
        //     where: {
        //         parent_id: id
        //     }
        // });

        console.log(req.params);
        const data = await category.map(item => item.get({plain: true}));
        // const data2 = subcategory.map(item => item.get({plain: true}));
       console.log(data);

        res.render('category', {
            title: 'Categories',
            data,
            // data2
        })
    } catch (err) {
        console.log(err);
    }
}