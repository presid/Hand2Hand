const Product = require('../models/Product');
const Category = require('../models/Category');

exports.getCategory = async (req, res) => {
    try {
        const category = await Category.findOne({  
            where: {
                name: req.params.categoryName
            },
            include: [
                {model: Product, required: false}
            ]
        });

        // const product = await Product.findAll({raw: true,
        //     where: {
        //         id: category.CategoryId
        //     }   
        // })
        const data = category.get({plain: true});
        console.log(data);

        res.render('category', {
            title: 'Categories',
            data,
        })
    } catch (err) {
        console.log(err);
    }
}