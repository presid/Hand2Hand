const Product = require('../models/Product');
const Category = require('../models/Category');

exports.getSubcategory = async (req, res) => {
    try {
        const subcategory = await Category.findAll({ 
            where: {
                name: req.params.subcategoryName
            },
            // include: [
            //     {model: Product, required: false}
            // ]
        });

        // const product = await Product.findAll({raw: true,
        //     where: {
        //         id: category.CategoryId
        //     }   
        // })
        const data = subcategory.map(item => item.get({plain: true}));
        console.log(data);

        res.render('subcategory', {
            title: 'Subcategories',
            data,
        });
        
    } catch (err) {
        console.log(err);
    }
}