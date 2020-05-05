const Product = require('../models/Product');
const Category = require('../models/Category');

exports.getSubcategory = async (req, res) => {
    try {
        let categoryNameId = null;

        categoryNameId = await Category.findOne({
            where: { name: req.params.categoryName},
            attributes: ['id']
        });

        // console.log('cateId: ', categoryNameId);

        if(categoryNameId == null) {return res.sendStatus(404);}

        const subcatId = await Category.findOne({ 
            where: {
                name: req.params.subcategoryName,
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
        console.log('data: ', data);

        res.render('subcategory', {
            title: 'Subcategories',
            data,
        });
        
    } catch (err) {
        console.log(err);
    }
}