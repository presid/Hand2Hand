const Product = require('../models/Product');
const Category = require('../models/Category');

exports.getSubcategory = async (req, res) => {
    try {

        console.log('categName: ', req.params.CategoryName);

        if(req.params.CategoryName != 'Laptops') {res.sendStatus(404);}

        const subcatId = await Category.findOne({ 
            where: {
                name: req.params.subcategoryName
            },
            attributes: ['id']
        });

        const product = await Product.findAll({
            where: {
                CategoryId: subcatId.id
            }   
        });


        const data = product.map(item => item.get({plain: true}));
        console.log('data: ', data);

        res.render('subcategory', {
            title: 'Subcategories',
            data,
        });
        
    } catch (err) {
        console.log(err);
    }
}